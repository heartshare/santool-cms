<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $id
 * @property integer $parent_id
 * @property string $label
 * @property integer $position
 * @property string $url
 * @property integer $status
 * @property string $controller
 */
class MenuLeft extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Menu the static model class
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
		return 'menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, position', 'required'),
			array('parent_id, position, status', 'numerical', 'integerOnly'=>true),
			array('label, url, controller', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, label, position, url, status, controller', 'safe', 'on'=>'search'),
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
			'position' => 'Position',
			'url' => 'Url',
			'status' => 'Status',
			'controller' => 'Controller',
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
		$criteria->compare('position',$this->position);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('controller',$this->controller,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getMenuItem($controller){
            $model = Yii::app()->db->createCommand()
                ->select('url, label')
                ->from('menu')
                ->where('controller=:controller', array(':controller'=>$controller))
                ->order('position')
                ->group('url')
                ->queryAll();


            $menuItem = array();
            foreach($model as $data){
                $menuItem[] = (array('label'=>$data['label'], 'url'=>array($data['url'])));
            }
            
            return $menuItem;
        }
}