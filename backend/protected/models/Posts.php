<?php

/**
 * This is the model class for table "posts".
 *
 * The followings are the available columns in table 'posts':
 * @property integer $id
 * @property integer $parent_id
 * @property string $label
 * @property string $resume
 * @property string $content
 * @property string $type
 * @property integer $position
 * @property string $permalink
 * @property integer $author_id
 * @property string $author_name
 * @property string $author_email
 * @property string $status
 *
 * The followings are the available model relations:
 * @property User $author
 * @property TermsRelationships[] $termsRelationships
 */
class Posts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Posts the static model class
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
		return 'posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, position, author_id', 'numerical', 'integerOnly'=>true),
			array('label, permalink', 'length', 'max'=>512),
			array('resume', 'length', 'max'=>1024),
			array('type, author_email', 'length', 'max'=>64),
			array('author_name', 'length', 'max'=>128),
			array('status', 'length', 'max'=>1),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, label, resume, content, type, position, permalink, author_id, author_name, author_email, status', 'safe', 'on'=>'search'),
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
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
			'posts' => array(self::BELONGS_TO, 'Posts', 'parent_id'),
			'termsRelationships' => array(self::HAS_MANY, 'TermsRelationships', 'posts_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'label' => 'Label',
			'resume' => 'Title',
			'content' => 'Content',
			'type' => 'Type',
			'position' => 'Position',
			'permalink' => 'Permalink',
			'author_id' => 'Author',
			'author_name' => 'Author Name',
			'author_email' => 'Author Email',
			'status' => 'Status',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('resume',$this->resume,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('permalink',$this->permalink,true);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('author_name',$this->author_name,true);
		$criteria->compare('author_email',$this->author_email,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getParent(){
            $model = Yii::app()->db->createCommand()
                    ->select('id, label')
                    ->from('posts')
                    //->where("parent_id='22031989' or id='1' or id='22031989' or id='22031999'")
                    ->where("type=4")
                    ->order('id asc')
                    ->queryAll();
            return $model;
        }
}