<?php

/**
 * This is the model class for table "pricing".
 *
 * The followings are the available columns in table 'pricing':
 * @property string $id
 * @property integer $itinerary_id
 * @property integer $cabin_id
 * @property double $cabin_fare
 * @property double $port_charge
 * @property double $service_fee
 * @property double $insurance
 * @property integer $special
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Cabins $cabin
 * @property Itineraries $itinerary
 */
class Pricing extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pricing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('itinerary_id, cabin_id, cabin_fare, port_charge, service_fee, insurance, special, code', 'required'),
			array('itinerary_id, cabin_id, special', 'numerical', 'integerOnly'=>true),
			array('cabin_fare, port_charge, service_fee, insurance', 'numerical'),
			array('modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, itinerary_id, cabin_id, cabin_fare, port_charge, service_fee, insurance, special, modified', 'safe', 'on'=>'search'),
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
			'cabin' => array(self::BELONGS_TO, 'Cabin', 'cabin_id'),
			'itinerary' => array(self::BELONGS_TO, 'Itinerary', 'itinerary_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'itinerary_id' => 'Itinerary',
			'cabin_id' => 'Cabin',
			'cabin_fare' => 'Cabin Fare',
			'port_charge' => 'Port Charge',
			'service_fee' => 'Service Fee',
			'insurance' => 'Insurance',
			'special' => 'Special',
			'code' => 'Code',
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
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('itinerary_id',$this->itinerary_id);
		$criteria->compare('cabin_id',$this->cabin_id);
		$criteria->compare('cabin_fare',$this->cabin_fare);
		$criteria->compare('port_charge',$this->port_charge);
		$criteria->compare('service_fee',$this->service_fee);
		$criteria->compare('insurance',$this->insurance);
		$criteria->compare('special',$this->special);
		$criteria->compare('modified',$this->modified,true);

        $criteria->with = array('cabin.ship.cruise');
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
	 * @return Pricing the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
