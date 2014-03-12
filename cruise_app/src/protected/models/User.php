<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $email
 * @property string $description
 * @property integer $role_id
 * @property integer $status
 * @property string $last_login
 * @property string $created
 * @property string $modified
 * @property integer $create_user_id
 * @property integer $modify_user_id
 *
 * The followings are the available model relations:
 * @property UserPublications[] $publications
 * @property Roles $role
 * @property User $createUser
 * @property User[] $users
 * @property User $modifyUser
 * @property User[] $users1
 * @property Roles[] $roles
 */
class User extends CActiveRecord
{
    public $repeatpassword;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, name, email', 'required'),
			array('role_id, status, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('username, password', 'length', 'max'=>50),
			array('name', 'length', 'max'=>50),
			array('email', 'length', 'max'=>254),
			array('description', 'length', 'max'=>200),
			array('last_login_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, name, email, description, role_id, status, last_login_time, create_time, update_time, create_user_id, update_user_id', 'safe', 'on'=>'search'),
            array('repeatpassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match",'on'=>'create')
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
			'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
			'createUser' => array(self::BELONGS_TO, 'User', 'create_user_id'),
			'users' => array(self::HAS_MANY, 'User', 'create_user_id'),
			'modifyUser' => array(self::BELONGS_TO, 'User', 'modify_user_id'),
			'users1' => array(self::HAS_MANY, 'User', 'modify_user_id'),
			'roles' => array(self::MANY_MANY, 'Role', 'users_roles(user_id, role_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
            'repeatpassword' => 'Confirm Password',
			'name' => 'Name',
			'email' => 'Email',
			'description' => 'Description',
			'role_id' => 'Role',
			'status' => 'Status',
			'last_login_time' => 'Last Login',
			'create_time' => 'Created',
			'update_time' => 'Modified',
			'create_user_id' => 'Create User',
			'update_user_id' => 'Modify User',
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
		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


    /*
     * Method to encrypt string
     */
    public function encrypt($string) {
        return md5($string);
    }
    
    /**
     * @return an array of status types.
     */
    public function getStatusOptions() {
        return array(
            0=>'Disabled',
            1=>'Active',
            2=>'Blocked',
        );
    }
    
    
    /*
     * Retrieves the user information based on the email address
     * 
     * @param string email
     * 
     * @return object user
     */
    public function getUserByEmail($email) {
        return User::model()->findByAttributes(array("email" => $email));
    }


}
