<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'terms-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
            <label class="control-label">
		<?php echo $form->labelEx($model,'parent_id'); ?>
            </label>
            <div class="controls">
		<?php echo $form->hiddenField($model,'parent_id'); ?>
                <?php
                    $this->widget('ext.editable.EditableField', array(
                        'type' => 'select',
                        'model' => $model,
                        'attribute' => 'parent_id',
                        'url' => $this->createUrl('user/create'),
                        'source' => CHtml::listData(Terms::model()->findAll(), 'id', 'label'), 
                        'onUpdate' => 'js: function(e, editable) {
                                           $("#Terms_parent_id").val(editable.value);
                                       }',
                        'placement' =>  'right'
                    ));
                ?>
            </div>
            <label class="control-label">
		<?php echo $form->error($model,'parent_id'); ?>
            </label>
	</div>

	<div class="control-group">
            <label class="control-label">
		<?php echo $form->labelEx($model,'label'); ?>
            </label>
            <div class="controls">
		<?php echo $form->textField($model,'label',array('size'=>60,'maxlength'=>128)); ?>
            </div>
            <label class="control-label">
		<?php echo $form->error($model,'label'); ?>
            </label>
	</div>

	<div class="control-group">
            <label class="control-label">
		<?php echo $form->labelEx($model,'position'); ?>
            </label>
            <div class="controls">
		<?php echo $form->textField($model,'position'); ?>
            </div>
            <label class="control-label">
		<?php echo $form->error($model,'position'); ?>
            </label>
	</div>

	<div class="control-group">
            <div class="controls">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn-primary')); ?>
            </div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->