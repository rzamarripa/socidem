<?php
$this->pageCaption='Crear DetalleProyecto';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo detalleproyecto';
$this->breadcrumbs=array(
	'Detalle Proyecto'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Volver','url'=>array('proyecto/index')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>