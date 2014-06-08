<?php

/**
 * This is the model class for table "ships".
 *
 * The followings are the available columns in table 'ships':
 * @property integer $id
 * @property integer $cruise_id
 * @property string $name
 * @property string $code
 * @property string $url
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Cabins[] $cabins
 * @property Itineraries[] $itineraries
 * @property CruiseLines $cruise
 */
class Ship extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ships';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cruise_id, name, code, url', 'required'),
			array('cruise_id', 'numerical', 'integerOnly'=>true),
			array('name, url', 'length', 'max'=>100),
			array('code', 'length', 'max'=>45),
			array('modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cruise_id, name, code, url, modified', 'safe', 'on'=>'search'),
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
			'cabins' => array(self::HAS_MANY, 'Cabin', 'ship_id'),
			'itineraries' => array(self::HAS_MANY, 'Itineraries', 'ship_id'),
			'cruise' => array(self::BELONGS_TO, 'CruiseLine', 'cruise_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cruise_id' => 'Cruise',
			'name' => 'Name',
			'code' => 'Code',
			'url' => 'Url',
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
		$criteria->compare('cruise_id',$this->cruise_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('modified',$this->modified,true);

		// only show ships that have their corresponding cruise line active
		$criteria->with = array('cruise');
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
	 * @return Ship the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
