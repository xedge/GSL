<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
     private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
            /*
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
             * */
                $record=  User2::model()->findByAttributes(array('USER_NAME'=>$this->username));
                if($record===null)
                    $this->errorCode=self::ERROR_USERNAME_INVALID;
                else if($record->UT_ID=='0')
                {
                    if($record->PASSWORD!==$this->password)
                    $this->errorCode=self::ERROR_PASSWORD_INVALID;
                    else
                {
                        $this->setUser($record);
                    
                }
                }
                else if(!CPasswordHelper::verifyPassword($this->password, $record->PASSWORD))
                {
                    $this->errorCode=self::ERROR_PASSWORD_INVALID;
                }
                else
                {
                    $this->setUser($record);
                }
		return !$this->errorCode;
	}
        public function getId()
        {
            return $this->_id;
        }
        
        private function setUser($record)
        {
            $this->_id=$record->USER_ID;
            $this->setState('id', $record->USER_ID);
            $this->errorCode=self::ERROR_NONE;
            $this->setState('roles', $record->getRelated('uT')->UT_NAME);
            $this->setLH();
            $record->LAST_LOGIN = date("Y-m-d H:i:s");
            $record->save();
        }


        public function setLH()
        {
            $lh = new LoginHist;
            $lh->DATE = date("Y-m-d H:i:s");
            $lh->USER_USER_ID = $this->_id;
            $lh->save();
        }
}