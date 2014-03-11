<?php

/**
 * This is the model class for table "roles_roles".
 *
 * The followings are the available columns in table 'roles_roles':
 * @property integer $parent_role_id
 * @property integer $child_role_id
 *
 * The followings are the available model relations:
 * @property Roles $childRole
 * @property Roles $parentRole
 */
class RoleRoles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RoleRoles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'roles_roles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_role_id, child_role_id', 'required'),
			array('parent_role_id, child_role_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('parent_role_id, child_role_id', 'safe', 'on'=>'search'),
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
			'childRole' => array(self::BELONGS_TO, 'Roles', 'child_role_id'),
			'parentRole' => array(self::BELONGS_TO, 'Roles', 'parent_role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'parent_role_id' => 'Parent Role',
			'child_role_id' => 'Child Role',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('parent_role_id',$this->parent_role_id);
		$criteria->compare('child_role_id',$this->child_role_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}