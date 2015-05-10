<?php
$this->pageCaption='Consulta Ginecologo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar consulta ginecologo';
$this->breadcrumbs=array(
	'Consulta Ginecologo',
);

$this->menu=array(
	array('label'=>'Crear ConsultaGinecologo','url'=>array('create')),
	array('label'=>'Administrar ConsultaGinecologo','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
