<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
            <label class="control-label">
		<?php echo $form->labelEx($model,'username'); ?>
            </label>
            <div class="controls">
		<?php echo $form->textField($model,'username',array('size'=>32,'maxlength'=>32, 'class'=>'span4')); ?>
            </div>
            <div class="control-label">
		<?php echo $form->error($model,'username'); ?>
            </div>
	</div>
        
        
	<div class="control-group">
            <label class="control-label">
		<?php echo $form->labelEx($model,'email'); ?>
            </label>
            <div class="controls">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>64, 'class'=>'span4')); ?>
            </div>
            <label class="control-label">
		<?php echo $form->error($model,'email'); ?>
            </label>
	</div>

	<div class="control-group">
            <label class="control-label">
		<?php echo $form->labelEx($model,'name'); ?>
            </label>
            <div class="controls">
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128, 'class'=>'span4')); ?>
            </div>
            <label class="control-label">
		<?php echo $form->error($model,'name'); ?>
            </label>
	</div>

	<div class="control-group">
            <label class="control-label">
		<?php echo $form->labelEx($model,'last_name'); ?>
            </label>
            <div class="controls">
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>64, 'class'=>'span4')); ?>
            </div>
            <label class="control-label">
		<?php echo $form->error($model,'last_name'); ?>
            </label>
	</div>

	<div class="control-group">
            <label class="control-label">
		<?php echo $form->labelEx($model,'password'); ?>
            </label>
            <div class="controls">
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>256, 'class'=>'span4')); ?>
            </div>
            <label class="control-label">
		<?php echo $form->error($model,'password'); ?>
            </label>
	</div>
        
        <div class="control-group">
            <label class="control-label">
                <?php echo $form->labelEx($model,'password2'); ?>
            </label>
            <div class="controls">
                <?php echo $form->passwordField($model,'password2', array('class'=>'span4')); ?>
            </div>
            <label class="control-label">
                <?php echo $form->error($model,'password2'); ?>
            </label>
        </div>
        
	<div class="control-group">
            <label class="control-label">
		<?php echo $form->labelEx($model,'role_id'); ?>
            </label>
            <div class="controls">
		<?php echo $form->hiddenField($model,'role_id'); ?>
                <?php
                    $this->widget('ext.editable.EditableField', array(
                        'type' => 'select',
                        'model' => $model,
                        'attribute' => 'role_id',
                        'url' => $this->createUrl('user/create'),
                        'source' => CHtml::listData(Role::model()->findAll(), 'id', 'name'), 
                        'onUpdate' => 'js: function(e, editable) {
                                           $("#User_role_id").val(editable.value);
                                       }',
                        'placement' =>  'right',
                        'emptytext'=>'Add user role here'
                    ));
                ?>
            </div>
            <label class="control-label">
		<?php echo $form->error($model,'role_id'); ?>
            </label>
	</div>

	<div class="control-group">
            <div class="controls">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn-primary')); ?>
            </div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->