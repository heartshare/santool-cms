<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'terms-form',
	'enableAjaxValidation'=>false,
        'type'=>'horizontal',
        'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <?php echo $form->dropDownListRow($model, 'parent_id', isset($model->parent_id)?CHtml::listData(Terms::model()->getParent(), 'id', 'label'):CHtml::listData(Terms::model()->getParent(), 'id', 'label'),
                array('prompt'=>isset($model->parent_id)?NULL:'Pilih Parent',
                )); 
        ?>

	<?php //echo $form->textFieldRow($model,'parent_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'label',array('class'=>'span5','maxlength'=>128)); ?>

	<?php //echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textFieldRow($model,'position',array('class'=>'span5')); ?>

	<?php //echo $form->textAreaRow($model,'permalink',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>