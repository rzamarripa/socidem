<?php
$this->pageCaption='Detalle Proyecto';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar detalle proyecto';
$this->breadcrumbs=array(
	'Detalle Proyecto',
);

$this->menu=array(
	array('label'=>'Crear DetalleProyecto','url'=>array('create')),
	array('label'=>'Administrar DetalleProyecto','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
