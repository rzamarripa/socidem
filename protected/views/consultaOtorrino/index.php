<?php
$this->pageCaption='Consulta Otorrino';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar consulta otorrino';
$this->breadcrumbs=array(
	'Consulta Otorrino',
);

$this->menu=array(
	array('label'=>'Crear ConsultaOtorrino','url'=>array('create')),
	array('label'=>'Administrar ConsultaOtorrino','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
