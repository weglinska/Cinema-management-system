<?php

/**
 * This is the model class for table "bilet_sprzedawca".
 *
 * The followings are the available columns in table 'bilet_sprzedawca':
 * @property integer $bilet_id
 * @property boolean $znizka
 * @property string $cena
 * @property string $tytul
 * @property string $data
 * @property string $godzina
 * @property integer $numer_sali
 * @property integer $rzad
 * @property integer $miejsce
 * @property string $sprzedawca
 * @property integer $seans_id
 */
class BiletSprzedawca extends CActiveRecord
{
        public $seans_id;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bilet_sprzedawca';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('znizka, seans_id, rzad, miejsce, sprzedawca', 'required'),
			array('bilet_id, numer_sali, rzad, miejsce, seans_id', 'numerical', 'integerOnly'=>true),
			array('cena', 'length', 'max'=>5),
			array('tytul, sprzedawca', 'length', 'max'=>40),
			array('znizka, data, godzina', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('bilet_id, znizka, cena, tytul, data, godzina, numer_sali, rzad, miejsce, sprzedawca', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'bilet_id' => 'Bilet',
			'znizka' => 'Zniżka',
			'cena' => 'Cena',
			'tytul' => 'Tytuł',
			'data' => 'Data',
			'godzina' => 'Godzina',
			'numer_sali' => 'Numer Sali',
			'rzad' => 'Rząd',
			'miejsce' => 'Miejsce',
			'sprzedawca' => 'Sprzedawca',
                        'seans_id' => 'Seans',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('bilet_id',$this->bilet_id);
		$criteria->compare('znizka',$this->znizka);
		$criteria->compare('cena',$this->cena,true);
		$criteria->compare('tytul',$this->tytul,true);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('godzina',$this->godzina,true);
		$criteria->compare('numer_sali',$this->numer_sali);
		$criteria->compare('rzad',$this->rzad);
		$criteria->compare('miejsce',$this->miejsce);
		$criteria->compare('sprzedawca',$this->sprzedawca,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function saveBiletSprzedawca()
        {
                $connection=Yii::app()->db; // Get connection to database.
                $transaction=$connection->beginTransaction();
                try
                {                   
                    $connection->createCommand()                // Add transaction
                        ->insert('transakcja', array(
                        'pracownik_id'=>$this->sprzedawca,
                    ));
                    
                    $pracownik_id=$this->sprzedawca;
                    $command = $connection->createCommand('SELECT MAX(transakcja_id) FROM transakcja WHERE pracownik_id = :ppracownik_id');
                    $command->bindParam(":ppracownik_id",$pracownik_id,PDO::PARAM_INT);
                    $transakcja_id=$command->queryScalar();     // Get transaction id 
                    
                    $this->cena = empty($this->znizka)?20:13;     // Set price by discound
                    $connection->createCommand()
                        ->insert('bilet', array(
                        'cena'=>$this->cena,
                        'znizka'=>empty($this->znizka)?'false':'true',
                        'rzad'=>$this->rzad,
                        'miejsce'=>$this->miejsce,
                        'seans_id'=>$this->seans_id,//$seans_id['seans_id'],
                        'transakcja_id'=>$transakcja_id,
                    ));
                    
                    $transaction->commit();
                    return true;
                }
                catch(Exception $e) // jeśli zapytanie nie powiedzie się, wołany jest wyjątek
                {
                    $transaction->rollBack();
                }
                
                return false;
        }
        
        public function updateBiletSprzedawca($bilet_id)
        {
            $connection=Yii::app()->db; // Get connection to database.
            $transaction=$connection->beginTransaction();
            try
            {                
                $transakcja_id = $this->getTransactionId($bilet_id);
                $this->cena = empty($this->znizka) ? 20 : 13;
                
                $connection->createCommand()->update('bilet', 
                        array('cena'=>$this->cena, 'znizka'=>empty($this->znizka)?'false':'true', 'rzad'=>$this->rzad, 'miejsce'=>$this->miejsce, 'seans_id'=>$this->seans_id),
                        'bilet_id=:pbilet_id', 
                        array(':pbilet_id'=>$bilet_id));
                
                $connection->createCommand()->update('transakcja', 
                        array('pracownik_id'=>$this->sprzedawca),
                        'transakcja_id=:param', 
                        array(':param'=>$transakcja_id));
        
                $transaction->commit();
                return true;
            }
            catch(Exception $e) // jeśli zapytanie nie powiedzie się, wołany jest wyjątek
            {
                $transaction->rollBack();
                var_dump($e->getMessage());
            }
            
            return false;
        }
        
        public function deleteBiletSprzedawca($bilet_id)
        {
                $connection=Yii::app()->db; // Get connection to database.
                $transaction=$connection->beginTransaction();
                try
                {
                    $command = $connection->createCommand();
                    
                    $transakcja_id= Yii::app()->db->createCommand()
                    ->select('transakcja_id')
                    ->from('bilet')
                    ->where(array('bilet_id=:pbilet_id'), 
                            array(':pbilet_id'=>$bilet_id))
                    ->queryRow();
                    
                    $liczbaBiletow= Yii::app()->db->createCommand()
                    ->select('count(*)')
                    ->from('bilet')
                    ->where(array('transakcja_id=:ptransakcja_id'), 
                            array(':ptransakcja_id'=>$transakcja_id['transakcja_id']))
                    ->queryRow();
                    
                    $command->delete('bilet', 'bilet_id=:pbilet_id', array(':pbilet_id'=>$bilet_id));
                    if($liczbaBiletow < 2)
                    {
                        $command->delete('transakcja', 'transakcja_id=:ptransakcja_id', array(':ptransakcja_id'=>$transakcja_id['transakcja_id']));
                    }
          
                    $transaction->commit();
                    return true;
                }
                catch(Exception $e) // jeśli zapytanie nie powiedzie się, wołany jest wyjątek
                {
                    $transaction->rollBack();
                }
                
                return false;
        }
        
        public function getTransactionId($bilet_id)
        {
            $command = Yii::app()->db->createCommand('SELECT transakcja_id FROM bilet WHERE bilet_id = :pbilet_id');
            $command->bindParam(":pbilet_id",$bilet_id,PDO::PARAM_INT);
            $transakcja_id=$command->queryScalar();     // Get transaction id 

            return $transakcja_id;
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BiletSprzedawca the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
