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
 *
 * The followings are the available model relations:
 * @property Posts[] $posts
 * @property Role $role
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
        public $password2;
        
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
                        array('role_id, username, password, password2, name, email', 'required'),
			array('role_id', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>32),
			array('name', 'length', 'max'=>128),
			array('email, last_name', 'length', 'max'=>64),
			array('password', 'length', 'max'=>256),
                        array('password2', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('alamat, pekerjaan','type','type'=>'string','allowEmpty'=>true),
			array('id, username, role_id, name, email, password, password2, last_name, alamat', 'safe', 'on'=>'search'),
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
		);
	}
        
        
        public function beforeSave() {

            if(parent::beforeSave() && $this->isNewRecord) {

                $this->password = md5($this->password);

            }
            else if(parent::beforeSave()) {

                $this->password = md5($this->password);

            }

            return true;
        }
        
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username <i>(Required)</i>',
			'role_id' => 'Role',
			'name' => 'Name',
			'email' => 'E-Mail <i>(Required)</i>',
			'password' => 'Password <i>(Twice, Required)</i>',
                        'password2' => 'Re-type Password',
			'last_name' => 'Last Name',
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
                $criteria->compare('password2',$this->password,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('alamat',$this->alamat,true);

		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function info(){
	
		$user = User::model()->findByPk(Yii::App()->user->id);
		return $user;
	
	}
	

}