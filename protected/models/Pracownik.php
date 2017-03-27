<?php

/**
 * This is the model class for table "pracownik".
 *
 * The followings are the available columns in table 'pracownik':
 * @property integer $pracownik_id
 * @property string $imie
 * @property string $nazwisko
 *
 * The followings are the available model relations:
 * @property Transakcja[] $transakcjas
 * @property Kadra[] $kadras
 */
class Pracownik extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pracownik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('imie, nazwisko', 'required'),
			array('imie, nazwisko', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pracownik_id, imie, nazwisko', 'safe', 'on'=>'search'),
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
			'transakcjas' => array(self::HAS_MANY, 'Transakcja', 'pracownik_id'),
			'kadras' => array(self::HAS_MANY, 'Kadra', 'pracownik_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pracownik_id' => 'Pracownik',
			'imie' => 'Imie',
			'nazwisko' => 'Nazwisko',
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

		$criteria->compare('pracownik_id',$this->pracownik_id);
		$criteria->compare('imie',$this->imie,true);
		$criteria->compare('nazwisko',$this->nazwisko,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getPracownikId($nazwisko) 
        {
            $pracownik_id=Yii::app()->db->createCommand()
                    ->select('pracownik_id')
                    ->from('pracownik')
                    ->where('nazwisko=:pnazwisko', array(':pnazwisko'=>$nazwisko))
                    ->queryRow();
            return $pracownik_id['pracownik_id'];
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pracownik the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
