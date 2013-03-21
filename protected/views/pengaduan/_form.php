<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pengaduan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->hiddenField($model,'parent_id', array('value'=>0)); ?>
		<?php //echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'label'); ?>
		<?php echo $form->textField($model,'label',array('size'=>60,'maxlength'=>512, 'class'=>'span12')); ?>
		<?php echo $form->error($model,'label'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span12')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'type'); ?>
		<?php echo $form->hiddenField($model,'type',array('size'=>60,'maxlength'=>64, 'value'=>3)); ?>
		<?php //echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'position'); ?>
		<?php echo $form->hiddenField($model,'position', array('value'=>0)); ?>
		<?php //echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'author_id'); ?>
		<?php echo $form->hiddenField($model,'author_id', array('value'=>6)); ?>
		<?php //echo $form->error($model,'author_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_name'); ?>
		<?php echo $form->textField($model,'author_name',array('size'=>60,'maxlength'=>128, 'class'=>'span12')); ?>
		<?php echo $form->error($model,'author_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_email'); ?>
		<?php echo $form->textField($model,'author_email',array('size'=>60,'maxlength'=>64, 'class'=>'span12')); ?>
		<?php echo $form->error($model,'author_email'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'status'); ?>
		<?php echo $form->hiddenField($model,'status',array('size'=>1,'maxlength'=>1, 'value'=>2, 'class'=>'span12')); ?>
		<?php //echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->