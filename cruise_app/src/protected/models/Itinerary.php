<?php

/**
 * This is the model class for table "itineraries".
 *
 * The followings are the available columns in table 'itineraries':
 * @property integer $id
 * @property integer $ship_id
 * @property integer $route_id
 * @property string $it_code
 * @property string $start_date
 * @property string $end_date
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Ships $ship
 * @property Routes $route
 * @property Pricing[] $pricings
 */
class Itinerary extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'itineraries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ship_id, route_id, it_code, start_date, end_date', 'required'),
			array('ship_id, route_id', 'numerical', 'integerOnly'=>true),
			array('it_code', 'length', 'max'=>45),
			array('modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ship_id, route_id, it_code, start_date, end_date, modified', 'safe', 'on'=>'search'),
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
			'ship' => array(self::BELONGS_TO, 'Ship', 'ship_id'),
			'route' => array(self::BELONGS_TO, 'Route', 'route_id'),
			'pricings' => array(self::HAS_MANY, 'Pricing', 'itinerary_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ship_id' => 'Ship',
			'route_id' => 'Itinerary Route',
			'it_code' => 'Itinerary ID',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'modified' => 'Modified',
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
		// @todo Please modify the following it_code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('ship_id',$this->ship_id);
		$criteria->compare('route_id',$this->route_id);
		$criteria->compare('it_code',$this->it_code, true);
		$criteria->compare('start_date', '>' . $this->start_date,true);
		$criteria->compare('end_date', '<' . $this->end_date,true);
		$criteria->compare('modified',$this->modified,true);

        $criteria->with = array('ship.cruise');
        $criteria->compare('cruise.active',1);
        $criteria->together = true;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Itinerary the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
