<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $CUST_ID
 * @property string $CUST_NAME
 * @property string $PHONE_NUM
 * @property integer $CUSTOMER_TYPE_CT_ID
 * @property integer $EXHIBITION_DETAIL_ED_ID
 *
 * The followings are the available model relations:
 * @property CustomerType $cUSTOMERTYPECT
 * @property ExhibitionDetail $eXHIBITIONDETAILED
 */
class Customer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CUSTOMER_TYPE_CT_ID, EXHIBITION_DETAIL_ED_ID', 'required'),
			array('CUSTOMER_TYPE_CT_ID, EXHIBITION_DETAIL_ED_ID', 'numerical', 'integerOnly'=>true),
			array('CUST_NAME, PHONE_NUM', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CUST_ID, CUST_NAME, PHONE_NUM, CUSTOMER_TYPE_CT_ID, EXHIBITION_DETAIL_ED_ID', 'safe', 'on'=>'search'),
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
			'cUSTOMERTYPECT' => array(self::BELONGS_TO, 'CustomerType', 'CUSTOMER_TYPE_CT_ID'),
			'eXHIBITIONDETAILED' => array(self::BELONGS_TO, 'ExhibitionDetail', 'EXHIBITION_DETAIL_ED_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CUST_ID' => 'Cust',
			'CUST_NAME' => 'Cust Name',
			'PHONE_NUM' => 'Phone Num',
			'CUSTOMER_TYPE_CT_ID' => 'Customer Type Ct',
			'EXHIBITION_DETAIL_ED_ID' => 'Exhibition Detail Ed',
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

		$criteria->compare('CUST_ID',$this->CUST_ID);
		$criteria->compare('CUST_NAME',$this->CUST_NAME,true);
		$criteria->compare('PHONE_NUM',$this->PHONE_NUM,true);
		$criteria->compare('CUSTOMER_TYPE_CT_ID',$this->CUSTOMER_TYPE_CT_ID);
		$criteria->compare('EXHIBITION_DETAIL_ED_ID',$this->EXHIBITION_DETAIL_ED_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function getAllExhibition()
        {
            $record = Exhibition::model()->findAll();
            $list = CHtml::listData($record, 'EX_ID', 'EX_NAME');
            return $list;
        }
        
        public  function getAllType()
        {
            $record = CustomerType::model()->findAll();
            $list = CHtml::listData($record, 'CT_ID', 'CT_NAME');
            return $list;
        }
}
