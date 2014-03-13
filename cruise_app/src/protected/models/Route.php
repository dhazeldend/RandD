<?php

/**
 * This is the model class for table "routes".
 *
 * The followings are the available columns in table 'routes':
 * @property integer $id
 * @property integer $start_port_id
 * @property integer $end_port_id
 * @property integer $duration
 * @property string $port_of_call
 * @property string $area
 * @property string $url
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Itineraries[] $itineraries
 */
class Route extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'routes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('start_port_id, end_port_id, duration, port_of_call, area, url', 'required'),
			array('start_port_id, end_port_id, duration', 'numerical', 'integerOnly'=>true),
			array('port_of_call', 'length', 'max'=>500),
			array('area', 'length', 'max'=>100),
			array('url', 'length', 'max'=>200),
			array('modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, start_port_id, end_port_id, duration, port_of_call, area, url, modified', 'safe', 'on'=>'search'),
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
			'itineraries' => array(self::HAS_MANY, 'Itineraries', 'route_id'),
			'start_port' => array(self::BELONGS_TO, 'Port', 'start_port_id'),
			'end_port' => array(self::BELONGS_TO, 'Port', 'end_port_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'start_port_id' => 'Start Port',
			'end_port_id' => 'End Port',
			'duration' => 'Duration',
			'port_of_call' => 'Port Of Call',
			'area' => 'Area',
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
		$criteria->compare('start_port_id',$this->start_port_id);
		$criteria->compare('end_port_id',$this->end_port_id);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('port_of_call',$this->port_of_call,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Route the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
