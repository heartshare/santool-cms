<?php

/**
 * This is the model class for table "terms".
 *
 * The followings are the available columns in table 'terms':
 * @property integer $id
 * @property integer $parent_id
 * @property string $label
 * @property string $content
 * @property integer $position
 * @property string $permalink
 *
 * The followings are the available model relations:
 * @property TermsRelationships[] $termsRelationships
 * @property Posts[] $posts
 */
class Categories extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Categories the static model class
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
		return 'terms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, position', 'numerical', 'integerOnly'=>true),
			array('label', 'length', 'max'=>128),
			array('content, permalink', 'length', 'max'=>512),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, label, content, position, permalink', 'safe', 'on'=>'search'),
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
			'termsRelationships' => array(self::HAS_MANY, 'TermsRelationships', 'terms_id'),
			'posts' => array(self::HAS_MANY, 'Posts', 'terms_id'),
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
			'content' => 'Content',
			'position' => 'Position',
			'permalink' => 'Permalink',
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
		$criteria->compare('content',$this->content,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('permalink',$this->permalink,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}