<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class CMSLoginForm extends CFormModel
{
    public $username;
    public $password;
    public $rememberMe;

    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
            return array(
                    // username and password are required
                    array('username, password', 'required'),
                    // rememberMe needs to be a boolean
                    // array('rememberMe', 'boolean'),
                    // password needs to be authenticated
                    array('password', 'authenticate'),
            );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
            return array(
                    'rememberMe'=>'Remember me next time',
            );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute,$params)
    {
            if(!$this->hasErrors())
            {
                    $this->_identity=new UserIdentity($this->username,$this->password);
                    if(!$this->_identity->authenticate())
                            $this->addError('password','Foutiewe e-posadres of wagwoord.');
            }
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login()
    {
            if($this->_identity===null)
            {
                    $this->_identity=new UserIdentity($this->username,$this->password);
                    $this->_identity->authenticate();
            }
            if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
            {                
                    $duration=300; // 300 seconds before your logged in session expires. TODO: This seems to be a known issue in Yii and does not work consistently.
                    Yii::app()->user->login($this->_identity,$duration);
                    return true;
            }
            else{
                    return false;
            }
    }
}
