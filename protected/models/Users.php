<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property integer $role_id
 * @property string $username
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $designation
 * @property string $pic
 * @property integer $is_complete
 * @property string $total
 * @property integer $status
 * @property string $created
 *
 * The followings are the available model relations:
 * @property Roles $role
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role_id', 'required'),
			array('role_id, is_complete, status', 'numerical', 'integerOnly'=>true),
			array('username, password, first_name, last_name, designation, pic', 'length', 'max'=>500),
			array('total', 'length', 'max'=>100),
			array('created', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, role_id, username, password, first_name, last_name, designation, pic, is_complete, total, status, created', 'safe', 'on'=>'search'),
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
			'role' => array(self::BELONGS_TO, 'Roles', 'role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'role_id' => 'Role',
			'username' => 'Username',
			'password' => 'Password',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'designation' => 'Designation',
			'pic' => 'Pic',
			'is_complete' => 'Is Complete',
			'total' => 'Total',
			'status' => 'Status',
			'created' => 'Created',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('designation',$this->designation,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('is_complete',$this->is_complete);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
