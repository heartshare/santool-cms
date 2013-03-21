<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property integer $role_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $last_name
 * @property string $no_paket
 * @property string $no_ktp
 * @property string $pekerjaan
 * @property string $telp
 * @property integer $kota_id
 * @property string $alamat
 *
 * The followings are the available model relations:
 * @property Posts[] $posts
 * @property Role $role
 * @property Persil[] $persils
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_paket, no_ktp, pekerjaan, telp, alamat, username, password, role_id, kota_id', 'required', 'message'=>'{attribute} harus diisi'),
			array('role_id, kota_id', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>32),
			array('name', 'length', 'max'=>128),
			array('email, last_name', 'length', 'max'=>64),
			array('password', 'length', 'max'=>256),
			array('no_paket, no_ktp, pekerjaan, telp, alamat', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, role_id, name, email, password, last_name, no_paket, no_ktp, pekerjaan, telp, kota_id, alamat', 'safe', 'on'=>'search'),
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
			'posts' => array(self::HAS_MANY, 'Posts', 'author_id'),
			'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
			'persils' => array(self::HAS_MANY, 'Persil', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'role_id' => 'Role',
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'last_name' => 'Last Name',
			'no_paket' => 'No Paket',
			'no_ktp' => 'No Ktp',
			'pekerjaan' => 'Pekerjaan',
			'telp' => 'Telp',
			'kota_id' => 'Kota',
			'alamat' => 'Alamat',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('no_paket',$this->no_paket,true);
		$criteria->compare('no_ktp',$this->no_ktp,true);
		$criteria->compare('pekerjaan',$this->pekerjaan,true);
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('kota_id',$this->kota_id);
		$criteria->compare('alamat',$this->alamat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}