<?php

/**
 * This is the model class for table "film".
 *
 * The followings are the available columns in table 'film':
 * @property integer $film_id
 * @property string $tytul
 * @property string $premiera
 * @property string $gatunek
 * @property string $rezyser
 * @property integer $czas_trwania
 *
 * The followings are the available model relations:
 * @property Reklama[] $reklamas
 * @property Seans[] $seans
 */
class Film extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'film';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tytul, premiera, gatunek, rezyser, czas_trwania', 'required'),
			array('czas_trwania', 'numerical', 'integerOnly'=>true),
			array('tytul, gatunek, rezyser', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('film_id, tytul, premiera, gatunek, rezyser, czas_trwania', 'safe', 'on'=>'search'),
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
			'reklamas' => array(self::HAS_MANY, 'Reklama', 'film_id'),
			'seans' => array(self::HAS_MANY, 'Seans', 'film_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'film_id' => 'Film ID',
			'tytul' => 'Tytuł',
			'premiera' => 'Premiera',
			'gatunek' => 'Gatunek',
			'rezyser' => 'Reżyser',
			'czas_trwania' => 'Czas trwania',
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

		$criteria->compare('film_id',$this->film_id);
		$criteria->compare('tytul',$this->tytul,true);
		$criteria->compare('premiera',$this->premiera,true);
		$criteria->compare('gatunek',$this->gatunek,true);
		$criteria->compare('rezyser',$this->rezyser,true);
		$criteria->compare('czas_trwania',$this->czas_trwania);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getFilmId($title) {
            $film_id=Yii::app()->db->createCommand()
                    ->select('film_id')
                    ->from('film')
                    ->where('tytul=:tytul', array(':tytul'=>$title))
                    ->queryRow();
            return $film_id['film_id'];
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Film the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
