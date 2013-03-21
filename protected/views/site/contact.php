<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
	<div class="row">
		<?php //echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->hiddenField($model,'parent_id', array('value'=>0)); ?>
		<?php //echo $form->error($model,'parent_id'); ?>
	</div>
        
	<div class="row">
		<?php //echo $form->labelEx($model,'position'); ?>
		<?php echo $form->hiddenField($model,'status', array('value'=>2)); ?>
		<?php //echo $form->error($model,'position'); ?>
	</div>
        
	<div class="row">
		<?php //echo $form->labelEx($model,'position'); ?>
		<?php echo $form->hiddenField($model,'position', array('value'=>0)); ?>
		<?php //echo $form->error($model,'position'); ?>
	</div>
        
	<div class="row">
		<?php //echo $form->labelEx($model,'author_id'); ?>
		<?php echo $form->hiddenField($model,'author_id', array('class'=>'span12', 'value'=>2)); ?>
		<?php //echo $form->error($model,'author_id'); ?>
	</div>
	<div class="row">
		<?php //echo $form->labelEx($model,'type'); ?>
		<?php echo $form->hiddenField($model,'type',array('size'=>60,'maxlength'=>64, 'value'=>3)); ?>
		<?php //echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_name'); ?>
		<?php echo $form->textField($model,'author_name', array('class'=>'span12')); ?>
		<?php echo $form->error($model,'author_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_email'); ?>
		<?php echo $form->textField($model,'author_email', array('class'=>'span12')); ?>
		<?php echo $form->error($model,'author_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'label'); ?>
		<?php echo $form->textField($model,'label',array('size'=>60,'maxlength'=>128, 'class'=>'span12')); ?>
		<?php echo $form->error($model,'label'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span12')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>