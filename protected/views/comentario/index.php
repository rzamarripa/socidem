<?php
$this->pageCaption='Comentario';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar comentario';
$this->breadcrumbs=array(
	'Comentario',
);

$this->menu=array(
	array('label'=>'Crear Comentario','url'=>array('create')),
	array('label'=>'Administrar Comentario','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
