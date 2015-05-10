<?php
$this->pageCaption='Actividad';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar actividad';
$this->breadcrumbs=array(
	'Actividad',
);

$this->menu=array(
	array('label'=>'Crear Actividad','url'=>array('create')),
	array('label'=>'Administrar Actividad','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
