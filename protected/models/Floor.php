<?php

/**
 * This is the model class for table "floor".
 *
 * The followings are the available columns in table 'floor':
 * @property integer $FLOOR_ID
 * @property string $FLOOR_NUMBER
 * @property integer $TOWER_ID
 * @property integer $FLOOR_TYPE_ID
 *
 * The followings are the available model relations:
 * @property FloorType $fLOORTYPE
 * @property Tower $tOWER
 * @property Room[] $rooms
 */
class Floor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'floor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TOWER_ID, FLOOR_TYPE_ID', 'required'),
			array('TOWER_ID, FLOOR_TYPE_ID', 'numerical', 'integerOnly'=>true),
			array('FLOOR_NUMBER', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('FLOOR_ID, FLOOR_NUMBER, TOWER_ID, FLOOR_TYPE_ID', 'safe', 'on'=>'search'),
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
			'fLOORTYPE' => array(self::BELONGS_TO, 'FloorType', 'FLOOR_TYPE_ID'),
			'tOWER' => array(self::BELONGS_TO, 'Tower', 'TOWER_ID'),
			'rooms' => array(self::HAS_MANY, 'Room', 'FLOOR_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'FLOOR_ID' => 'Floor',
			'FLOOR_NUMBER' => 'Floor Number',
			'TOWER_ID' => 'Tower',
			'FLOOR_TYPE_ID' => 'Floor Type',
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

		$criteria->compare('FLOOR_ID',$this->FLOOR_ID);
		$criteria->compare('FLOOR_NUMBER',$this->FLOOR_NUMBER,true);
		$criteria->compare('TOWER_ID',$this->TOWER_ID);
		$criteria->compare('FLOOR_TYPE_ID',$this->FLOOR_TYPE_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Floor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
