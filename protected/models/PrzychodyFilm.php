<?php

/**
 * This is the model class for table "przychody_film".
 *
 * The followings are the available columns in table 'przychody_film':
 * @property string $tytul
 * @property string $przychod
 * @property string $od
 * @property string $do
 */
class PrzychodyFilm extends CActiveRecord
{
        public $sprzedane_bilety;
        public $od;
        public $do;
        
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'przychody_film';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tytul', 'length', 'max'=>40),
			array('przychod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tytul, przychod', 'safe', 'on'=>'search'),
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
			'przychod' => 'Przychod',
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

                //$criteria->addCondition();
                
		$criteria->compare('tytul',$this->tytul,true);
		$criteria->compare('przychod',$this->przychod,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getReportData() 
        {           
            $sql = 'SELECT f.tytul, count(*) AS sprzedane_bilety, sum(b.cena) AS przychod FROM bilet b, seans s, film f WHERE b.seans_id=s.seans_id and s.film_id=f.film_id and s.data>=:pod and s.data<=:pdo GROUP BY f.tytul ORDER BY f.tytul';
            
            $command = Yii::app()->db->createCommand($sql);
            $command->bindParam(":pod",$this->od,PDO::PARAM_STR);
            $command->bindParam(":pdo",$this->do,PDO::PARAM_STR);
            $rawData=$command->queryAll();     // Get raw data 

            $command= Yii::app()->db->createCommand('SELECT COUNT(*) FROM (' . $sql . ') as count_alias');
            $command->bindParam(":pod",$this->od,PDO::PARAM_STR);
            $command->bindParam(":pdo",$this->do,PDO::PARAM_STR);
            $count=$command->queryScalar();
            
            $model=new CArrayDataProvider($rawData, array(   //using with querAll...
                        'keyField' => 'tytul', 
                        'totalItemCount' => $count,
                        'sort' => array(
                            'attributes' => array(
                                'tytul','sprzedane_bilety', 'przychod'
                            ),
                            'defaultOrder' => array(
                                'tytul' => CSort::SORT_ASC, //default sort value
                            ),
                        ),
                        'pagination' => array(
                            'pageSize' => 10,
                        ),
                    ));

            return $model;
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PrzychodyFilm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
