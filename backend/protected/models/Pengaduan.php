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
class Pengaduan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pengaduan the static model class
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
                        array('author_id, author_name, author_email, label, content', 'required'),
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
        
        public function beforeSave() 
        {
            if($this->isNewRecord)
            {           
                $this->date_create=new CDbExpression('NOW()');
                $this->date_modified=new CDbExpression('NOW()');
                //$this->status=0; //option by default
            }
            $this->date_modified = new CDbExpression('NOW()');
            return parent::beforeSave();
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
			'label' => 'Subject',
			'resume' => 'Resume',
			'content' => 'Content',
			'type' => 'Type',
			'position' => 'Position',
			'permalink' => 'Permalink',
			'author_id' => 'Author',
			'author_name' => 'Name',
			'author_email' => 'Email',
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
	
        public function getLatestPengaduan(){
			$model = Yii::app()->db->createCommand()
					->select('a.id, a.label')
					->from('posts a')
					->leftJoin('user b', 'b.id=a.author_id')
					->where("a.type='3' and a.status='1'")
					->order('a.id desc')
					->queryAll();
			return $model;
        }
		
        public function getComment($id){
            $model = Yii::app()->db->createCommand()
                    ->select('a.id, a.label as label, a.content as content, a.author_name, a.author_email as authormail, b.name as name, b.email as email')
                    ->from('posts a')
                    ->leftJoin('user b', 'b.id=a.author_id')
                    ->where("a.parent_id='$id'")
                    ->order('a.id asc')
                    ->queryAll();
            return $model;
        }
		
        public function getCommentCount($id){
            $model = Yii::app()->db->createCommand()
                    ->select('count(*) as count')
                    ->from('posts a')
                    ->leftJoin('user b', 'b.id=a.author_id')
                    ->where("a.parent_id='$id'")
                    ->group('a.id')
                    ->queryScalar();
            return $model;
        }
}