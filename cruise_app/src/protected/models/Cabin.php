<?php

/**
 * This is the model class for table "cabins".
 *
 * The followings are the available columns in table 'cabins':
 * @property integer $id
 * @property integer $ship_id
 * @property string $code
 * @property string $description
 * @property integer $passengers
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Ships $ship
 * @property Pricing[] $pricings
 */
class Cabin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cabins';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ship_id, code, description, passengers', 'required'),
			array('ship_id, passengers', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>45),
			array('description', 'length', 'max'=>2000),
			array('modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ship_id, code, description, passengers, modified', 'safe', 'on'=>'search'),
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
			'pricings' => array(self::HAS_MANY, 'Pricing', 'cabin_id'),
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
			'code' => 'Code',
			'description' => 'Description',
			'passengers' => 'Passengers',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('ship_id',$this->ship_id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('passengers',$this->passengers);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cabin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
