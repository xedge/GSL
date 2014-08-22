<?php

/**
 * This is the model class for table "buyer".
 *
 * The followings are the available columns in table 'buyer':
 * @property integer $idBUYER
 * @property string $NO_ID
 * @property string $BUY_NAME
 * @property string $ADDRESS_BY_ID
 * @property string $ADDRESS
 * @property string $PHONE_NUM
 * @property string $HP_NUM
 * @property string $FAX_NUM
 *
 * The followings are the available model relations:
 * @property Order[] $orders
 * @property Room[] $rooms
 */
class Buyer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'buyer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NO_ID, BUY_NAME, ADDRESS_BY_ID, ADDRESS, PHONE_NUM, HP_NUM, FAX_NUM', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idBUYER, NO_ID, BUY_NAME, ADDRESS_BY_ID, ADDRESS, PHONE_NUM, HP_NUM, FAX_NUM', 'safe', 'on'=>'search'),
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
			'orders' => array(self::HAS_MANY, 'Order', 'BUYER_idBUYER'),
			'rooms' => array(self::HAS_MANY, 'Room', 'OWNER_idBUYER'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idBUYER' => 'Id Buyer',
			'NO_ID' => 'No',
			'BUY_NAME' => 'Buy Name',
			'ADDRESS_BY_ID' => 'Address By',
			'ADDRESS' => 'Address',
			'PHONE_NUM' => 'Phone Num',
			'HP_NUM' => 'Hp Num',
			'FAX_NUM' => 'Fax Num',
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

		$criteria->compare('idBUYER',$this->idBUYER);
		$criteria->compare('NO_ID',$this->NO_ID,true);
		$criteria->compare('BUY_NAME',$this->BUY_NAME,true);
		$criteria->compare('ADDRESS_BY_ID',$this->ADDRESS_BY_ID,true);
		$criteria->compare('ADDRESS',$this->ADDRESS,true);
		$criteria->compare('PHONE_NUM',$this->PHONE_NUM,true);
		$criteria->compare('HP_NUM',$this->HP_NUM,true);
		$criteria->compare('FAX_NUM',$this->FAX_NUM,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Buyer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
