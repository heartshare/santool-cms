<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'posts-main-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'parent_id',array('class'=>'span5', 'value'=>$id)); ?>
        
<?php echo $form->hiddenField($model,'terms_id',array('class'=>'span5', 'value'=>'1')); ?>

	<?php echo $form->hiddenField($model,'label',array('class'=>'span5','maxlength'=>512, 'value'=>'Balasan')); ?>

	<?php echo $form->hiddenField($model,'resume',array('class'=>'span5','maxlength'=>1024)); ?>

	<?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->hiddenField($model,'type',array('class'=>'span5','maxlength'=>64, 'value'=>5)); ?>

	<?php echo $form->hiddenField($model,'position',array('class'=>'span5', 'value'=>0)); ?>

	<?php echo $form->hiddenField($model,'permalink',array('class'=>'span5','maxlength'=>512)); ?>

	<?php echo $form->hiddenField($model,'author_id',array('class'=>'span5', 'value'=>Yii::App()->user->id)); ?>

	<?php echo $form->hiddenField($model,'author_name',array('class'=>'span5','maxlength'=>128, 'value'=>User::model()->info()->name)); ?>

	<?php echo $form->hiddenField($model,'author_email',array('class'=>'span5','maxlength'=>64, 'value'=>User::model()->info()->email)); ?>

	<?php echo $form->hiddenField($model,'status',array('class'=>'span5','maxlength'=>1, 'value'=>1)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>