<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $ORDER_ID
 * @property double $PRICE
 * @property double $DISCOUNT
 * @property double $DEAL_PRICE
 * @property integer $PT_ID
 * @property double $BOOKING_FEE
 * @property integer $BF_PT_ID
 * @property string $BF_DATE
 * @property double $REMAINING_BF
 * @property string $RM_DATE
 * @property double $ADVANCE_PAYMENT_1
 * @property string $AP1_DATE
 * @property double $ADVANCE_PAYMENT
 * @property double $PT_PERCENT
 * @property string $INSTALLMENT_1
 * @property string $INSTALLMENT_2
 * @property double $INSTALLMENT_PRICE
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
 * @property Buyer $bUYERIdBUYER
 * @property PaymentType $pT
 * @property PaymentType $bFPT
 * @property Room $rOOMROOM
 * @property User2 $mUSER
 * @property User2 $mMUSER
 */
class Order extends CActiveRecord
{
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
			array('ORDER_ID, PT_ID, BF_PT_ID, M_USER_ID, MM_USER_ID, BUYER_idBUYER, ROOM_ROOM_ID', 'numerical', 'integerOnly'=>true),
			array('PRICE, DISCOUNT, DEAL_PRICE, BOOKING_FEE, REMAINING_BF, ADVANCE_PAYMENT_1, ADVANCE_PAYMENT, PT_PERCENT, INSTALLMENT_PRICE', 'numerical'),
			array('INSTALLMENT_1, INSTALLMENT_2, ORDER_STATUS', 'length', 'max'=>45),
			array('BF_DATE, RM_DATE, AP1_DATE, RM_PAYMENT_DATE, RM_INSTALLMENT_DATE_BEGIN, RM_INSTALLMENT_DATE_ENG, DATE_ORDER, APPROVED_DATE', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ORDER_ID, PRICE, DISCOUNT, DEAL_PRICE, PT_ID, BOOKING_FEE, BF_PT_ID, BF_DATE, REMAINING_BF, RM_DATE, ADVANCE_PAYMENT_1, AP1_DATE, ADVANCE_PAYMENT, PT_PERCENT, INSTALLMENT_1, INSTALLMENT_2, INSTALLMENT_PRICE, RM_PAYMENT_DATE, RM_INSTALLMENT_DATE_BEGIN, RM_INSTALLMENT_DATE_ENG, DATE_ORDER, M_USER_ID, MM_USER_ID, ORDER_STATUS, APPROVED_DATE, BUYER_idBUYER, ROOM_ROOM_ID', 'safe', 'on'=>'search'),
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
			'DEAL_PRICE' => 'Deal Price',
			'PT_ID' => 'Pt',
			'BOOKING_FEE' => 'Booking Fee',
			'BF_PT_ID' => 'Bf Pt',
			'BF_DATE' => 'Bf Date',
			'REMAINING_BF' => 'Remaining Bf',
			'RM_DATE' => 'Rm Date',
			'ADVANCE_PAYMENT_1' => 'Advance Payment 1',
			'AP1_DATE' => 'Ap1 Date',
			'ADVANCE_PAYMENT' => 'Advance Payment',
			'PT_PERCENT' => 'Pt Percent',
			'INSTALLMENT_1' => 'Installment 1',
			'INSTALLMENT_2' => 'Installment 2',
			'INSTALLMENT_PRICE' => 'Installment Price',
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

		$criteria->compare('ORDER_ID',$this->ORDER_ID);
		$criteria->compare('PRICE',$this->PRICE);
		$criteria->compare('DISCOUNT',$this->DISCOUNT);
		$criteria->compare('DEAL_PRICE',$this->DEAL_PRICE);
		$criteria->compare('PT_ID',$this->PT_ID);
		$criteria->compare('BOOKING_FEE',$this->BOOKING_FEE);
		$criteria->compare('BF_PT_ID',$this->BF_PT_ID);
		$criteria->compare('BF_DATE',$this->BF_DATE,true);
		$criteria->compare('REMAINING_BF',$this->REMAINING_BF);
		$criteria->compare('RM_DATE',$this->RM_DATE,true);
		$criteria->compare('ADVANCE_PAYMENT_1',$this->ADVANCE_PAYMENT_1);
		$criteria->compare('AP1_DATE',$this->AP1_DATE,true);
		$criteria->compare('ADVANCE_PAYMENT',$this->ADVANCE_PAYMENT);
		$criteria->compare('PT_PERCENT',$this->PT_PERCENT);
		$criteria->compare('INSTALLMENT_1',$this->INSTALLMENT_1,true);
		$criteria->compare('INSTALLMENT_2',$this->INSTALLMENT_2,true);
		$criteria->compare('INSTALLMENT_PRICE',$this->INSTALLMENT_PRICE);
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
}
