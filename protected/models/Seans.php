<?php

/**
 * This is the model class for table "seans".
 *
 * The followings are the available columns in table 'seans':
 * @property integer $seans_id
 * @property integer $sala_id
 * @property integer $film_id
 * @property string $godzina
 * @property string $data
 * @property boolean $column_3d
 *
 * The followings are the available model relations:
 * @property Kadra[] $kadras
 * @property Sala $sala
 * @property Film $film
 * @property Bilet[] $bilets
 */
class Seans extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'seans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sala_id, film_id, godzina, data, column_3d', 'required'),
			array('sala_id, film_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('seans_id, sala_id, film_id, godzina, data, column_3d', 'safe', 'on'=>'search'),
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
			'kadras' => array(self::HAS_MANY, 'Kadra', 'seans_id'),
			'sala' => array(self::BELONGS_TO, 'Sala', 'sala_id'),
			'film' => array(self::BELONGS_TO, 'Film', 'film_id'),
			'bilets' => array(self::HAS_MANY, 'Bilet', 'seans_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'seans_id' => 'Seans',
			'sala_id' => 'Sala',
			'film_id' => 'Film',
			'godzina' => 'Godzina',
			'data' => 'Data',
			'column_3d' => 'Column 3d',
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

		$criteria->compare('seans_id',$this->seans_id);
		$criteria->compare('sala_id',$this->sala_id);
		$criteria->compare('film_id',$this->film_id);
		$criteria->compare('godzina',$this->godzina,true);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('column_3d',$this->column_3d);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getAllForDropDownList()
        {
            $seanse=$this::model()->findAll(array('order' => 'data DESC'));
            $filmy=Film::model()->findAll();
            $listaFilmow = CHtml::listData($filmy,'film_id', 'tytul');
            
            $list = array();
            foreach ($seanse as $value) {
                $list[$value['seans_id']] = $value['data']." | ".$value['godzina']." | Sala ".$value['sala_id']." | ".$listaFilmow[$value['film_id']]." ".($value['column_3d']?"3D":"");
            }    

            return $list;
        }
        
        public function getSeansId($sala_id, $tytul, $godzina, $data)
        {
//sala_id	film_id	godzina	data	column_3d
            $film_id = Film::model()->getFilmId($tytul);
            
            $seans_id=Yii::app()->db->createCommand()
                    ->select('seans_id')
                    ->from('seans')
                    ->where('sala_id=:psala_id AND film_id=:pfilm_id AND godzina=:pgodzina AND data=:pdata', 
                            array(':psala_id'=>$sala_id, ':pfilm_id'=>$film_id, ':pgodzina'=>$godzina, ':pdata'=>$data))
                    ->queryRow();  

            return $seans_id['seans_id'];
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Seans the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
