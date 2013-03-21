<div class="well sidebar-nav">
<?php
	
    $controller = Yii::app()->getController()->getAction()->controller->id;
    $menuItem = MenuLeft::model()->getMenuItem($controller);
    //print_r($menuItem);
    
    $this->widget('bootstrap.widgets.TbMenu', array(
        'type'=>'list',
        'items' => $menuItem
    ));
	
?>
</div>