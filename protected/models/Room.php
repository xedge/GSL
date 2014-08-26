<?php

/**
 * This is the model class for table "room".
 *
 * The followings are the available columns in table 'room':
 * @property integer $ROOM_ID
 * @property string $ROOM_NUMBER
 * @property string $ROOM_AREA_GROSS
 * @property string $ROOM_AREA_NETT
 * @property integer $FLOOR_ID
 * @property integer $WING_ID
 * @property string $STATUS
 * @property integer $RT_ID
 * @property integer $OWNER_idBUYER
 *
 * The followings are the available model relations:
 * @property Order[] $orders
 * @property Buyer $oWNERIdBUYER
 * @property Floor $fLOOR
 * @property RoomType $rT
 * @property Wing $wING
 */
class Room extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'room';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FLOOR_ID, RT_ID', 'required'),
			array('FLOOR_ID, WING_ID, RT_ID, OWNER_idBUYER', 'numerical', 'integerOnly'=>true),
			array('ROOM_NUMBER, ROOM_AREA_GROSS, ROOM_AREA_NETT, STATUS', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ROOM_ID, ROOM_NUMBER, ROOM_AREA_GROSS, ROOM_AREA_NETT, FLOOR_ID, WING_ID, STATUS, RT_ID, OWNER_idBUYER', 'safe', 'on'=>'search'),
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
			'orders' => array(self::HAS_MANY, 'Order', 'ROOM_ROOM_ID'),
			'oWNERIdBUYER' => array(self::BELONGS_TO, 'Buyer', 'OWNER_idBUYER'),
			'fLOOR' => array(self::BELONGS_TO, 'Floor', 'FLOOR_ID'),
			'rT' => array(self::BELONGS_TO, 'RoomType', 'RT_ID'),
			'wING' => array(self::BELONGS_TO, 'Wing', 'WING_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ROOM_ID' => 'Room',
			'ROOM_NUMBER' => 'Room Number',
			'ROOM_AREA_GROSS' => 'Room Area Gross',
			'ROOM_AREA_NETT' => 'Room Area Nett',
			'FLOOR_ID' => 'Floor',
			'WING_ID' => 'Wing',
			'STATUS' => 'Status',
			'RT_ID' => 'Rt',
			'OWNER_idBUYER' => 'Owner Id Buyer',
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

		$criteria->compare('ROOM_ID',$this->ROOM_ID);
		$criteria->compare('ROOM_NUMBER',$this->ROOM_NUMBER,true);
		$criteria->compare('ROOM_AREA_GROSS',$this->ROOM_AREA_GROSS,true);
		$criteria->compare('ROOM_AREA_NETT',$this->ROOM_AREA_NETT,true);
		$criteria->compare('FLOOR_ID',$this->FLOOR_ID);
		$criteria->compare('WING_ID',$this->WING_ID);
		$criteria->compare('STATUS',$this->STATUS,true);
		$criteria->compare('RT_ID',$this->RT_ID);
		$criteria->compare('OWNER_idBUYER',$this->OWNER_idBUYER);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Room the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
