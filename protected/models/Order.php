<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property string $ORDER_ID
 * @property double $PRICE
 * @property double $DISCOUNT
 * @property integer $PT_ID
 * @property double $BOOKING_FEE
 * @property integer $BF_PT_ID
 * @property string $BF_CHECK_BANK
 * @property string $BF_CHECK_NO
 * @property string $BF_CC_NO
 * @property string $BF_DATE
 * @property double $ADVANCE_PAYMENT_FEE
 * @property integer $ADVANCE_PAYMENT_TIMES
 * @property double $ADVANCE_PAYMENT_1
 * @property string $AP1_DATE
 * @property double $ADVANCE_PAYMENT
 * @property string $AP_DATE_BEGIN
 * @property string $AP_DATE_END
 * @property integer $RM_PT_ID
 * @property double $RM_PERCENT
 * @property integer $RM_INSTALLMENT_TIMES
 * @property double $RM_COST
 * @property string $RM_PAYMENT_DATE
 * @property string $RM_INSTALLMENT_DATE_BEGIN
 * @property string $RM_INSTALLMENT_DATE_ENG
 * @property string $DATE_ORDER
 * @property integer $M_USER_ID
 * @property integer $MM_USER_ID
 * @property string $ORDER_STATUS
 * @property string $APPROVED_DATE
 * @property integer $BUYER_idBUYER
 * @property integer $ROOM_ROOM_ID
 *
 * The followings are the available model relations:
 * @property PaymentType $rMPT
 * @property Buyer $bUYERIdBUYER
 * @property PaymentType $pT
 * @property PaymentType $bFPT
 * @property Room $rOOMROOM
 * @property User2 $mUSER
 * @property User2 $mMUSER
 */
class Order extends CActiveRecord
{
    private $tunai = '1';
    private $tunaibertahap = '2';
    private $angsuran = '3';
    private $kpa = '4';
    private $cek = '5';
    private $creadit = '6';
    private $bank = '7';
    private $id = '/SPS/PTPP-GSL/';
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ORDER_ID, PT_ID, BF_PT_ID, M_USER_ID, BUYER_idBUYER, ROOM_ROOM_ID', 'required'),
			array('PT_ID, BF_PT_ID, ADVANCE_PAYMENT_TIMES, RM_PT_ID, RM_INSTALLMENT_TIMES, M_USER_ID, MM_USER_ID, BUYER_idBUYER, ROOM_ROOM_ID', 'numerical', 'integerOnly'=>true),
			array('PRICE, DISCOUNT, BOOKING_FEE, ADVANCE_PAYMENT_FEE, ADVANCE_PAYMENT_1, ADVANCE_PAYMENT, RM_PERCENT, RM_COST', 'numerical'),
			array('ORDER_ID, BF_CHECK_BANK, BF_CHECK_NO, BF_CC_NO, ORDER_STATUS', 'length', 'max'=>45),
			array('BF_DATE, AP1_DATE, AP_DATE_BEGIN, AP_DATE_END, RM_PAYMENT_DATE, RM_INSTALLMENT_DATE_BEGIN, RM_INSTALLMENT_DATE_ENG, DATE_ORDER, APPROVED_DATE', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ORDER_ID, PRICE, DISCOUNT, PT_ID, BOOKING_FEE, BF_PT_ID, BF_CHECK_BANK, BF_CHECK_NO, BF_CC_NO, BF_DATE, ADVANCE_PAYMENT_FEE, ADVANCE_PAYMENT_TIMES, ADVANCE_PAYMENT_1, AP1_DATE, ADVANCE_PAYMENT, AP_DATE_BEGIN, AP_DATE_END, RM_PT_ID, RM_PERCENT, RM_INSTALLMENT_TIMES, RM_COST, RM_PAYMENT_DATE, RM_INSTALLMENT_DATE_BEGIN, RM_INSTALLMENT_DATE_ENG, DATE_ORDER, M_USER_ID, MM_USER_ID, ORDER_STATUS, APPROVED_DATE, BUYER_idBUYER, ROOM_ROOM_ID', 'safe', 'on'=>'search'),
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
                        'rMPT' => array(self::BELONGS_TO, 'PaymentType', 'RM_PT_ID'),
			'bUYERIdBUYER' => array(self::BELONGS_TO, 'Buyer', 'BUYER_idBUYER'),
			'pT' => array(self::BELONGS_TO, 'PaymentType', 'PT_ID'),
			'bFPT' => array(self::BELONGS_TO, 'PaymentType', 'BF_PT_ID'),
			'rOOMROOM' => array(self::BELONGS_TO, 'Room', 'ROOM_ROOM_ID'),
			'mUSER' => array(self::BELONGS_TO, 'User2', 'M_USER_ID'),
			'mMUSER' => array(self::BELONGS_TO, 'User2', 'MM_USER_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ORDER_ID' => 'Order',
			'PRICE' => 'Price',
			'DISCOUNT' => 'Discount',
			'PT_ID' => 'Pt',
			'BOOKING_FEE' => 'Booking Fee',
			'BF_PT_ID' => 'Bf Pt',
			'BF_CHECK_BANK' => 'Bf Check Bank',
			'BF_CHECK_NO' => 'Bf Check No',
			'BF_CC_NO' => 'Bf Cc No',
			'BF_DATE' => 'Bf Date',
			'ADVANCE_PAYMENT_FEE' => 'Advance Payment Fee',
			'ADVANCE_PAYMENT_TIMES' => 'Advance Payment Times',
			'ADVANCE_PAYMENT_1' => 'Advance Payment 1',
			'AP1_DATE' => 'Ap1 Date',
			'ADVANCE_PAYMENT' => 'Advance Payment',
			'AP_DATE_BEGIN' => 'Ap Date Begin',
			'AP_DATE_END' => 'Ap Date End',
			'RM_PT_ID' => 'Rm Pt',
			'RM_PERCENT' => 'Rm Percent',
			'RM_INSTALLMENT_TIMES' => 'Rm Installment Times',
			'RM_COST' => 'Rm Cost',
			'RM_PAYMENT_DATE' => 'Rm Payment Date',
			'RM_INSTALLMENT_DATE_BEGIN' => 'Rm Installment Date Begin',
			'RM_INSTALLMENT_DATE_ENG' => 'Rm Installment Date Eng',
			'DATE_ORDER' => 'Date Order',
			'M_USER_ID' => 'M User',
			'MM_USER_ID' => 'Mm User',
			'ORDER_STATUS' => 'Order Status',
			'APPROVED_DATE' => 'Approved Date',
			'BUYER_idBUYER' => 'Buyer Id Buyer',
			'ROOM_ROOM_ID' => 'Room Room',
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

		$criteria->compare('ORDER_ID',$this->ORDER_ID,true);
		$criteria->compare('PRICE',$this->PRICE);
		$criteria->compare('DISCOUNT',$this->DISCOUNT);
		$criteria->compare('PT_ID',$this->PT_ID);
		$criteria->compare('BOOKING_FEE',$this->BOOKING_FEE);
		$criteria->compare('BF_PT_ID',$this->BF_PT_ID);
		$criteria->compare('BF_CHECK_BANK',$this->BF_CHECK_BANK,true);
		$criteria->compare('BF_CHECK_NO',$this->BF_CHECK_NO,true);
		$criteria->compare('BF_CC_NO',$this->BF_CC_NO,true);
		$criteria->compare('BF_DATE',$this->BF_DATE,true);
		$criteria->compare('ADVANCE_PAYMENT_FEE',$this->ADVANCE_PAYMENT_FEE);
		$criteria->compare('ADVANCE_PAYMENT_TIMES',$this->ADVANCE_PAYMENT_TIMES);
		$criteria->compare('ADVANCE_PAYMENT_1',$this->ADVANCE_PAYMENT_1);
		$criteria->compare('AP1_DATE',$this->AP1_DATE,true);
		$criteria->compare('ADVANCE_PAYMENT',$this->ADVANCE_PAYMENT);
		$criteria->compare('AP_DATE_BEGIN',$this->AP_DATE_BEGIN,true);
		$criteria->compare('AP_DATE_END',$this->AP_DATE_END,true);
		$criteria->compare('RM_PT_ID',$this->RM_PT_ID);
		$criteria->compare('RM_PERCENT',$this->RM_PERCENT);
		$criteria->compare('RM_INSTALLMENT_TIMES',$this->RM_INSTALLMENT_TIMES);
		$criteria->compare('RM_COST',$this->RM_COST);
		$criteria->compare('RM_PAYMENT_DATE',$this->RM_PAYMENT_DATE,true);
		$criteria->compare('RM_INSTALLMENT_DATE_BEGIN',$this->RM_INSTALLMENT_DATE_BEGIN,true);
		$criteria->compare('RM_INSTALLMENT_DATE_ENG',$this->RM_INSTALLMENT_DATE_ENG,true);
		$criteria->compare('DATE_ORDER',$this->DATE_ORDER,true);
		$criteria->compare('M_USER_ID',$this->M_USER_ID);
		$criteria->compare('MM_USER_ID',$this->MM_USER_ID);
		$criteria->compare('ORDER_STATUS',$this->ORDER_STATUS,true);
		$criteria->compare('APPROVED_DATE',$this->APPROVED_DATE,true);
		$criteria->compare('BUYER_idBUYER',$this->BUYER_idBUYER);
		$criteria->compare('ROOM_ROOM_ID',$this->ROOM_ROOM_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
         public function getAllTower()
        {
            $record = Tower::model()->findAll(array('order'=>'TOWER_ID'));
            $list = CHtml::listData($record, 'TOWER_ID', 'TOWER_NAME');
            return $list;
        }
        
        public function getAllFloor()
        {
            $record = Floor::model()->findAll(array('order'=>'FLOOR_ID'));
            $list = CHtml::listData($record, 'FLOOR_ID', 'FLOOR_NUMBER');
            return $list;
        }
        
        public function getAllBuyer()
        {
            $record = Buyer::model()->findAll(array('order'=>'idBUYER'));
            $list = CHtml::listData($record, 'idBUYER', 'NO_ID');
            return $list;
        }
        
        public function getAllPayment()
        {
            $record = PaymentType::model()->findAll(array('order'=>'PT_ID'));
            $list = CHtml::listData($record, 'PT_ID', 'PT_NAME');
            return $list;
        }
        
        public function getPayment()
        {
            $criteria = new CDbCriteria;
            $criteria->compare('PT_ID', $this->tunai,FALSE,'OR');
            $criteria->compare('PT_ID', $this->angsuran,FALSE,'OR');
            $criteria->compare('PT_ID', $this->kpa,FALSE,'OR');
            $record = PaymentType::model()->findAll($criteria);
            $list = CHtml::listData($record, 'PT_ID', 'PT_NAME');
            return $list;
        }
        
        public function getBFPayment()
        {
            $criteria = new CDbCriteria;
            $criteria->compare('PT_ID', $this->tunai,FALSE,'OR');
            $criteria->compare('PT_ID', $this->cek,FALSE,'OR');
            $criteria->compare('PT_ID', $this->creadit,FALSE,'OR');
            $record = PaymentType::model()->findAll($criteria);
            $list = CHtml::listData($record, 'PT_ID', 'PT_NAME');
            return $list;
        }
        
        public  function getRMPayment()
        {
            $criteria = new CDbCriteria;
            $criteria->compare('PT_ID', $this->tunai,FALSE,'OR');
            $criteria->compare('PT_ID', $this->bank,FALSE,'OR');
            $criteria->compare('PT_ID', $this->angsuran,FALSE,'OR');
            $record = PaymentType::model()->findAll($criteria);
            $list = CHtml::listData($record, 'PT_ID', 'PT_NAME');
            return $list;
        }


        public function setID()
        {
            $record = Order::model()->findAll();
            if(empty($record))
            {
                $this->ORDER_ID = 1 . $this->id . date('Y');
                return;
            }
            $last = end($record);
            $lastid = explode('/', $last->ORDER_ID);
            $this->ORDER_ID = $lastid[0]+1 . $this->id . date('Y');
            return;
        }
        
        public function notifyNewOrder()
        {
            $mail=new YiiMailer();
                $mail->setFrom('dummypengguna@gmail.com','Dummy Dum');
                $criteria = new CDbCriteria;
                $criteria->select ='EMAIL_ADDRESS';
                $criteria->compare('UT_ID', '1',FALSE,'OR');
                $criteria->compare('UT_ID', '2',FALSE,'OR');
                $criteria->compare('UT_ID', '3',FALSE,'OR');
                $record = User2::model()->findAll($criteria);
                foreach ($record as $email)
                {
                    $mail->setTo($email->EMAIL_ADDRESS);
                    $mail->setSubject('New Order');
                    $mail->setBody('Simple message');
                    $mail->send();
                }
        }
        
        public function notifyApproval()
        {
            $mail=new YiiMailer();
            $mail->setFrom('dummypengguna@gmail.com','Dummy Dum');
            $criteria = new CDbCriteria;
            $criteria->select ='EMAIL_ADDRESS';
            $criteria->compare('UT_ID', '1',FALSE,'OR');
            $criteria->compare('UT_ID', '3',FALSE,'OR');
            $record = User2::model()->findAll($criteria);
            foreach ($record as $email)
            {
                $mail->setTo($email->EMAIL_ADDRESS);
                $mail->setSubject('New Order');
                $mail->setBody('Simple message');
                $mail->send();
            }
        }
        
        public function approve()
        {
            $this->ORDER_STATUS = 'Approved';
            $this->MM_USER_ID = Yii::app()->user->id;
            $this->APPROVED_DATE = date("Y-m-d");
            $this->save();
        }
        
        public function cancel()
        {
            $this->ORDER_STATUS = NULL;
            $this->MM_USER_ID = NULL;
            $this->APPROVED_DATE = NULL;
            $this->save();
        }
        
}
