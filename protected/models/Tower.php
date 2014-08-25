<?php

/**
 * This is the model class for table "tower".
 *
 * The followings are the available columns in table 'tower':
 * @property integer $TOWER_ID
 * @property string $TOWER_NAME
 * @property integer $TOWER_TYPE_TT_ID
 *
 * The followings are the available model relations:
 * @property Floor[] $floors
 * @property TowerType $tOWERTYPETT
 * @property Wing[] $wings
 */
class Tower extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tower';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TOWER_TYPE_TT_ID', 'required'),
			array('TOWER_TYPE_TT_ID', 'numerical', 'integerOnly'=>true),
			array('TOWER_NAME', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TOWER_ID, TOWER_NAME, TOWER_TYPE_TT_ID', 'safe', 'on'=>'search'),
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
			'floors' => array(self::HAS_MANY, 'Floor', 'TOWER_ID'),
			'tOWERTYPETT' => array(self::BELONGS_TO, 'TowerType', 'TOWER_TYPE_TT_ID'),
			'wings' => array(self::HAS_MANY, 'Wing', 'TOWER_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'TOWER_ID' => 'Tower',
			'TOWER_NAME' => 'Tower Name',
			'TOWER_TYPE_TT_ID' => 'Tower Type Tt',
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

		$criteria->compare('TOWER_ID',$this->TOWER_ID);
		$criteria->compare('TOWER_NAME',$this->TOWER_NAME,true);
		$criteria->compare('TOWER_TYPE_TT_ID',$this->TOWER_TYPE_TT_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tower the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
