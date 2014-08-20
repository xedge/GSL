<?php

/**
 * This is the model class for table "login_hist".
 *
 * The followings are the available columns in table 'login_hist':
 * @property integer $LH_ID
 * @property string $DATE
 * @property integer $USER_USER_ID
 *
 * The followings are the available model relations:
 * @property User2 $uSERUSER
 */
class LoginHist extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'login_hist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DATE', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('LH_ID, DATE, USER_USER_ID', 'safe', 'on'=>'search'),
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
			'uSERUSER' => array(self::BELONGS_TO, 'User2', 'USER_USER_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'LH_ID' => 'Lh',
			'DATE' => 'Date',
			'USER_USER_ID' => 'User User',
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

		$criteria->compare('LH_ID',$this->LH_ID);
		$criteria->compare('DATE',$this->DATE,true);
		$criteria->compare('USER_USER_ID',$this->USER_USER_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LoginHist the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
