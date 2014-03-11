<?php
/*
 * UserIdentity represents the data needed to identify a user.
 * It contains the authentication method that checks if the provided
 * data can identify the user.
 */
class UserIdentity extends CUserIdentity {
    
    private $_id;
    private $_name;

    /**
    * Authenticates a user using the User data model.
    * @return boolean whether authentication succeeds.
    */
    public function authenticate() {
        
        $user = User::model()->findByAttributes(array('username'=>$this->username));
        
        if ($user === null) {
            // the username does not exist.
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        else if ($user->password !== $user->encrypt($this->password)) {
            // the username exists but the password is not valid.
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }
        else {
            // no error.. we can now proceed to sign-in the user because
            // the credentials are valid.
            $this->errorCode = self::ERROR_NONE;

            // set some session variables for
            // the signed-in user.
            $this->_id = $user->id;
            $this->_name = $user->name;
            $this->setState('email', $user->email);
            $this->setState('role_id', $user->role_id);
            $this->setState('role', strtolower($user->role->name));

            // update the user's last login time.
            $user->last_login_time = new CDbExpression('CURRENT_TIMESTAMP');
            $user->save(false);
        }
        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

    public function getName() {
        return $this->_name;
    }
}