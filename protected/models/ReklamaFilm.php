<?php

/**
 * This is the model class for table "reklama_film".
 *
 * The followings are the available columns in table 'reklama_film':
 * @property string $tytul
 * @property string $reklamowany_produkt
 * @property string $wydawca
 */
class ReklamaFilm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reklama_film';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('tytul, reklamowany_produkt, wydawca', 'required'),
			array('tytul, reklamowany_produkt, wydawca', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tytul, reklamowany_produkt, wydawca', 'safe', 'on'=>'search'),
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
			'tytul' => 'Tytul',
			'reklamowany_produkt' => 'Reklamowany produkt',
			'wydawca' => 'Wydawca',
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

		$criteria->compare('tytul',$this->tytul,true);
		$criteria->compare('reklamowany_produkt',$this->reklamowany_produkt,true);
		$criteria->compare('wydawca',$this->wydawca,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function saveReklamaFilm()
        {
                $connection=Yii::app()->db; // Get connection to database.
                $transaction=$connection->beginTransaction();
                try
                {                   
                    //$film_id=$this->tytul;
                    
                    $connection->createCommand()
                        ->insert('reklama', array(
                        'reklamowany_produkt'=>$this->reklamowany_produkt,
                        'wydawca'=>$this->wydawca,
                        'film_id'=>$this->tytul,
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
        
        public function updateReklamaFilm($tytul, $reklamowany_produkt, $wydawca)
        {
            $connection=Yii::app()->db; // Get connection to database.
            $transaction=$connection->beginTransaction();
            try
            { 
                $film_id=$tytul;
                
                if(!is_numeric($tytul)){
                    $film_id=Film::model()->getFilmId($tytul);
                }
                
                $film_id_new=$this->tytul;
                if(!is_numeric($this->tytul)){
                    $film_id_new=Film::model()->getFilmId($this->tytul);
                }

                $connection->createCommand()->update('reklama', 
                        array('reklamowany_produkt'=> $this->reklamowany_produkt, 'wydawca'=> $this->wydawca, 'film_id'=> $film_id_new),
                        'reklamowany_produkt=:param1 AND wydawca=:param2 AND film_id=:param3', 
                        array(':param1'=>$reklamowany_produkt, ':param2'=>$wydawca, ':param3'=>$film_id));
        
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
        
        public function deleteReklamaFilm($tytul, $reklamowany_produkt, $wydawca)
        {
            $connection=Yii::app()->db; // Get connection to database.
            
            $film_id=Film::model()->getFilmId($tytul);
            
            $connection->createCommand()->delete('reklama', 
                    'film_id=:film_id AND reklamowany_produkt=:reklamowany_produkt AND wydawca=:wydawca',
                    array(':film_id'=>$film_id, ':reklamowany_produkt'=>$reklamowany_produkt, ':wydawca'=>$wydawca));
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReklamaFilm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
