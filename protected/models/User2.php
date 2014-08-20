<?php

/**
 * This is the model class for table "user2".
 *
 * The followings are the available columns in table 'user2':
 * @property integer $USER_ID
 * @property string $USER_NAME
 * @property string $EMAIL_ADDRESS
 * @property integer $UT_ID
 * @property string $PASSWORD
 * @property string $NAME
 * @property string $LAST_LOGIN
 *
 * The followings are the available model relations:
 * @property LoginHist[] $loginHists
 * @property Order[] $orders
 * @property Order[] $orders1
 * @property UserType $uT
 */
class User2 extends CActiveRecord
{
    private $_identity;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user2';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('USER_ID, UT_ID', 'required'),
			array('USER_ID, UT_ID', 'numerical', 'integerOnly'=>true),
			array('USER_NAME, EMAIL_ADDRESS, NAME', 'length', 'max'=>45),
			array('PASSWORD', 'length', 'max'=>64),
			array('LAST_LOGIN', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('USER_ID, USER_NAME, EMAIL_ADDRESS, UT_ID, PASSWORD, NAME, LAST_LOGIN', 'safe', 'on'=>'search'),
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
			'loginHists' => array(self::HAS_MANY, 'LoginHist', 'USER_USER_ID'),
			'orders' => array(self::HAS_MANY, 'Order', 'M_USER_ID'),
			'orders1' => array(self::HAS_MANY, 'Order', 'MM_USER_ID'),
			'uT' => array(self::BELONGS_TO, 'UserType', 'UT_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'USER_ID' => 'User',
			'USER_NAME' => 'User Name',
			'EMAIL_ADDRESS' => 'Email Address',
			'UT_ID' => 'Ut',
			'PASSWORD' => 'Password',
			'NAME' => 'Name',
			'LAST_LOGIN' => 'Last Login',
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

		$criteria->compare('USER_ID',$this->USER_ID);
		$criteria->compare('USER_NAME',$this->USER_NAME,true);
		$criteria->compare('EMAIL_ADDRESS',$this->EMAIL_ADDRESS,true);
		$criteria->compare('UT_ID',$this->UT_ID);
		$criteria->compare('PASSWORD',$this->PASSWORD,true);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('LAST_LOGIN',$this->LAST_LOGIN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User2 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public  function login()
        {
            if($this->_identity==null)
            {
                $this->_identity = new UserIdentity($this->USER_NAME,  $this->PASSWORD);
                $this->_identity->authenticate();
            }
            if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
            {
                Yii::app()->user->login($this->_identity);
                return true;
            }
            else
                return false;
        }
       
        public function setUserID()
        {
            $record = User2::model()->findAllByAttributes(array('UT_ID'=>  $this->UT_ID),array('order'=>'USER_ID'));
            $this->PASSWORD = CPasswordHelper::hashPassword($this->PASSWORD);
            if(empty($record))
            {
                $num = $this->UT_ID;
                $id = sprintf("%04s",1);
                $this->USER_ID = $num . $id;
                return;
            }
            $last = end($record);
            $this->USER_ID = $last->USER_ID+1;
        }
        public function getAllUT()
        {
            $record = UserType::model()->findAll(array('order'=>'UT_ID'));
            $list = CHtml::listData($record, 'UT_ID', 'UT_NAME');
            return $list;
        }
}
