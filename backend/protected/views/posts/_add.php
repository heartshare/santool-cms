<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'posts-main-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
        'htmlOptions'=>array('class'=>'well'),
)); ?>

    <legend>
        <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    </legend>

    <?php echo $form->errorSummary($model); ?>
    
    <?php 
        echo $form->dropDownListRow($model,'parent_id', CHtml::listData(Posts::model()->getParent(), 'id', 'label'), array('empty'=>': : Parent Menu')); 
    ?>

    <?php 
        echo $form->dropDownListRow($model,'terms_id', CHtml::listData(Terms::model()->findAll(), 'id', 'label'), array('empty'=>': : Category')); 
    ?>
    
    <?php echo $form->textFieldRow($model,'label',array('class'=>'span5','maxlength'=>512)); ?>

    <?php echo $form->ckEditorRow($model,'resume',array('options'=>array('fullpage'=>'js:true', 'height'=>'100', 'resize_maxWidth'=>'640','resize_minWidth'=>'320', 'filebrowserBrowseUrl'=>$this->createUrl("admin/fileupload")))); ?>

    <?php 
	   echo $form->ckEditorRow($model,'content',array('options'=>array('fullpage'=>'js:true', 'resize_maxWidth'=>'640','resize_minWidth'=>'320', 'filebrowserBrowseUrl'=>$this->createUrl("admin/fileupload")))); 
    ?>

    <?php echo $form->textAreaRow($model,'tags',array('class'=>'span5')); ?>
    
    <?php 
        echo $form->dropDownListRow($model,'type', CHtml::listData(PostsType::model()->getPostsType(), 'id', 'label'), array('empty'=>': : Type')); 
    ?>

	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5', 'value'=>0)); ?>
        
        

	<?php echo $form->textFieldRow($model,'permalink',array('class'=>'span5','maxlength'=>512)); ?>

	<?php echo $form->hiddenField($model,'author_id',array('class'=>'span5', 'value'=>Yii::app()->user->id)); ?>

	<?php echo $form->hiddenField($model,'author_name',array('class'=>'span5','maxlength'=>128, 'value'=>Yii::app()->user->get()->name)); ?>

	<?php echo $form->hiddenField($model,'author_email',array('class'=>'span5','maxlength'=>64, 'value'=>Yii::app()->user->get()->email)); ?>

	<?php echo $form->hiddenField($model,'status',array('class'=>'span5','maxlength'=>1, 'value'=>'1')); ?>



	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>