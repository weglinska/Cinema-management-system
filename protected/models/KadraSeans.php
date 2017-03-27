<?php

/**
 * This is the model class for table "kadra_seans".
 *
 * The followings are the available columns in table 'kadra_seans':
 * @property string $data
 * @property string $godzina
 * @property integer $sala_id
 * @property string $tytul
 * @property boolean $column_3d
 * @property string $sprzatacz
 * @property string $kontroler
 * @property string $operator
 */
class KadraSeans extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kadra_seans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data, godzina, sala_id, tytul, column_3d, sprzatacz, kontroler, operator', 'required'),
			array('sala_id', 'numerical', 'integerOnly'=>true),
			array('tytul, sprzatacz, kontroler, operator', 'length', 'max'=>40),
			array('data, godzina, column_3d', 'safe'),
                        //array('sprzatacz', 'compare', 'compareAttribute'=>'kontroler', 'operator'=>'!='),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('data, godzina, sala_id, tytul, column_3d, sprzatacz, kontroler, operator', 'safe', 'on'=>'search'),
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
			'data' => 'Data',
			'godzina' => 'Godzina',
			'sala_id' => 'Sala',
			'tytul' => 'Tytuł',
			'column_3d' => '3d',
			'sprzatacz' => 'Sprzątacz',
			'kontroler' => 'Kontroler',
			'operator' => 'Operator',
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

		$criteria->compare('data',$this->data,true);
		$criteria->compare('godzina',$this->godzina,true);
		$criteria->compare('sala_id',$this->sala_id);
		$criteria->compare('tytul',$this->tytul,true);
		$criteria->compare('column_3d',$this->column_3d);
		$criteria->compare('sprzatacz',$this->sprzatacz,true);
		$criteria->compare('kontroler',$this->kontroler,true);
		$criteria->compare('operator',$this->operator,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        public function saveKadraSeans()
        {
                $connection=Yii::app()->db; // Get connection to database.
                $transaction=$connection->beginTransaction();
                try
                {                   
                    $film_id=$this->tytul;
                    
                    $connection->createCommand()
                        ->insert('seans', array(
                        'sala_id'=>$this->sala_id,
                        'film_id'=>$this->tytul,
                        'godzina'=>$this->godzina,
                        'data'=>$this->data,
                        'column_3d'=> $this->column_3d,
                    ));
                    
                    $seans_id=$connection->createCommand()
                    ->select('seans_id')
                    ->from('seans')
                    ->where(array('and', 'sala_id=:sala_id', 'film_id=:film_id', 'godzina=:godzina', 'data=:data', 'column_3d=:column_3d'), 
                            array(':sala_id'=>$this->sala_id, ':film_id'=>$film_id, ':godzina'=>$this->godzina, ':data'=>$this->data, ':column_3d'=>$this->column_3d))
                    ->queryRow();
            /*
                    $sprzatacz_id=$connection->createCommand()
                        ->select('pracownik_id')
                        ->from('pracownik')
                        ->where('nazwisko=:nazwisko', array(':nazwisko'=>$this->sprzatacz))
                        ->queryRow();

                    $kontroler_id=$connection->createCommand()
                        ->select('pracownik_id')
                        ->from('pracownik')
                        ->where('nazwisko=:nazwisko', array(':nazwisko'=>$this->kontroler))
                        ->queryRow();

                    $operator_id=$connection->createCommand()
                        ->select('pracownik_id')
                        ->from('pracownik')
                        ->where('nazwisko=:nazwisko', array(':nazwisko'=>$this->operator))
                        ->queryRow();*/
                
                    $command = $connection->createCommand();
                    $command->insert('kadra', array(
                        'seans_id'=>$seans_id['seans_id'],
                        'nazwa_stanowiska'=>"Sprzątacz",
                        'pracownik_id'=>$this->sprzatacz,
                    ));

                    $command->insert('kadra', array(
                        'seans_id'=>$seans_id['seans_id'],
                        'nazwa_stanowiska'=>"Kontroler biletów",
                        'pracownik_id'=>$this->kontroler,
                    ));

                    $command->insert('kadra', array(
                        'seans_id'=>$seans_id['seans_id'],
                        'nazwa_stanowiska'=>"Operator sprzętu",
                        'pracownik_id'=>$this->operator,
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
        
        public function updateKadraSeans($data, $godzina, $sala_id, $tytul, $column_3d)
        {
                $connection=Yii::app()->db; // Get connection to database.
                $transaction=$connection->beginTransaction();
                try
                {   
                    $command = $connection->createCommand();
                    
                    $seans_id=$this->getSeansId($sala_id, $tytul, $godzina, $data, $column_3d);
                    
                    $command->update('seans', 
                        array('sala_id'=>$this->sala_id, 'film_id'=>$this->tytul, 'godzina'=>$this->godzina,
                              'data'=>$this->data, 'column_3d'=> $this->column_3d),
                        'seans_id=:seans_id', 
                        array(':seans_id'=>$seans_id));
                                  
                    $command->update('kadra', 
                        array('pracownik_id'=> $this->sprzatacz),
                        'seans_id=:seans_id AND nazwa_stanowiska=:nazwa_stanowiska', 
                        array(':seans_id'=>$seans_id, ':nazwa_stanowiska'=>'Sprzątacz'));
                    
                    $command->update('kadra', 
                        array('pracownik_id'=> $this->kontroler),
                        'seans_id=:seans_id AND nazwa_stanowiska=:nazwa_stanowiska', 
                        array(':seans_id'=>$seans_id, ':nazwa_stanowiska'=>'Kontroler biletów'));
                    
                    $command->update('kadra', 
                        array('pracownik_id'=> $this->operator),
                        'seans_id=:seans_id AND nazwa_stanowiska=:nazwa_stanowiska', 
                        array(':seans_id'=>$seans_id, ':nazwa_stanowiska'=>'Operator sprzętu'));
                    
                    $transaction->commit();
                    return true;
                }
                catch(Exception $e) // jeśli zapytanie nie powiedzie się, wołany jest wyjątek
                {
                    $transaction->rollBack();
                }
                
                return false;
        }
        
        public function deleteKadraSeans($data, $godzina, $sala_id, $tytul, $column_3d)
        {
                $connection=Yii::app()->db; // Get connection to database.
                $transaction=$connection->beginTransaction();
                try
                {
                    $command = $connection->createCommand();
                    
                    $seans_id=$this->getSeansId($sala_id, $tytul, $godzina, $data, $column_3d);
                    $command->delete('kadra', 'seans_id=:seans_id', array(':seans_id'=>$seans_id));
                    $command->delete('seans', 'seans_id=:seans_id', array(':seans_id'=>$seans_id));
                    
                    $transaction->commit();
                    return true;
                }
                catch(Exception $e) // jeśli zapytanie nie powiedzie się, wołany jest wyjątek
                {
                    $transaction->rollBack();
                }
                
                return false;
        }
        
        public function getSeansId($sala_id, $tytul, $godzina, $data, $column_3d) 
        {
            $film_id = $tytul;
            if(!is_numeric($tytul))
                $film_id= Film::model()->getFilmId($tytul);
            
            $seans_id=Yii::app()->db->createCommand()
                    ->select('seans_id')
                    ->from('seans')
                    ->where(array('and', 'sala_id=:sala_id', 'film_id=:film_id', 'godzina=:godzina', 'data=:data', 'column_3d=:column_3d'), 
                            array(':sala_id'=>$sala_id, ':film_id'=>$film_id, ':godzina'=>$godzina, ':data'=>$data, ':column_3d'=>empty($column_3d)?'false':'true'))
                    ->queryRow();

            return $seans_id['seans_id'];
        }
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KadraSeans the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
