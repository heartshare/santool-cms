<?php $this->pageTitle=Yii::app()->name; ?>

<div class="hero-unit visible-desktop">
	<h1>Welcome <em><?php echo CHtml::encode(Yii::app()->name); 
		echo $_SERVER['REMOTE_ADDR'];
	?></em></h1>
	<br />
</div>