<?php

/**
 * This is the model class for table "sala".
 *
 * The followings are the available columns in table 'sala':
 * @property integer $sala_id
 * @property integer $pietro
 * @property integer $liczba_siedzen
 * @property integer $rzedy
 * @property integer $kolumny
 *
 * The followings are the available model relations:
 * @property Seans[] $seans
 */
class Sala extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sala';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sala_id, pietro, liczba_siedzen, rzedy, kolumny', 'required'),
			array('sala_id, pietro, liczba_siedzen, rzedy, kolumny', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sala_id, pietro, liczba_siedzen, rzedy, kolumny', 'safe', 'on'=>'search'),
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
			'seans' => array(self::HAS_MANY, 'Seans', 'sala_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sala_id' => 'Sala',
			'pietro' => 'Pietro',
			'liczba_siedzen' => 'Liczba Siedzen',
			'rzedy' => 'Rzedy',
			'kolumny' => 'Kolumny',
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

		$criteria->compare('sala_id',$this->sala_id);
		$criteria->compare('pietro',$this->pietro);
		$criteria->compare('liczba_siedzen',$this->liczba_siedzen);
		$criteria->compare('rzedy',$this->rzedy);
		$criteria->compare('kolumny',$this->kolumny);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sala the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
