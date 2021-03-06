<?php

/**
 * This is the model class for table "user_type".
 *
 * The followings are the available columns in table 'user_type':
 * @property integer $UT_ID
 * @property string $UT_NAME
 * @property string $UT_STATUS
 *
 * The followings are the available model relations:
 * @property User2[] $user2s
 */
class UserType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UT_ID', 'required'),
			array('UT_ID', 'numerical', 'integerOnly'=>true),
			array('UT_NAME, UT_STATUS', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('UT_ID, UT_NAME, UT_STATUS', 'safe', 'on'=>'search'),
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
			'user2s' => array(self::HAS_MANY, 'User2', 'UT_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'UT_ID' => 'Ut',
			'UT_NAME' => 'Ut Name',
			'UT_STATUS' => 'Ut Status',
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

		$criteria->compare('UT_ID',$this->UT_ID);
		$criteria->compare('UT_NAME',$this->UT_NAME,true);
		$criteria->compare('UT_STATUS',$this->UT_STATUS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
