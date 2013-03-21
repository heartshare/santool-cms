<?php
    Yii::app()->user->setFlash('success', '<strong>Sukses!</strong> Pengaduan telah berhasil dibuat, pengaduan akan ditampilkan setelah dikonfirmasi oleh admin, terimakasih.');
    $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'×', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
                'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
        ),
    ));
?>