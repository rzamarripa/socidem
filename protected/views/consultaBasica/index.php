<?php
$this->pageCaption='Consulta Basica';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar consulta basica';
$this->breadcrumbs=array(
	'Consulta Basica',
);

$this->menu=array(
	array('label'=>'Crear ConsultaBasica','url'=>array('create')),
	array('label'=>'Administrar ConsultaBasica','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
