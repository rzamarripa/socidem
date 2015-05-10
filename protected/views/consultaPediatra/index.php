<?php
$this->pageCaption='Consulta Pediatra';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar consulta pediatra';
$this->breadcrumbs=array(
	'Consulta Pediatra',
);

$this->menu=array(
	array('label'=>'Crear ConsultaPediatra','url'=>array('create')),
	array('label'=>'Administrar ConsultaPediatra','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
