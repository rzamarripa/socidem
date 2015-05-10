<?php
$this->pageCaption='Adminsitrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='comentario';
$this->breadcrumbs=array(
	'Comentario'=>array('index'),
	'Adminsitrar',
);

$this->menu=array(
	array('label'=>'Listar Comentario','url'=>array('index')),
	array('label'=>'Crear Comentario','url'=>array('create')),
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'comentario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array('name'=>'detalleProyecto_did',
		        'value'=>'$data->detalleProyecto->nombre',
			    'filter'=>CHtml::listData(DetalleProyecto::model()->findAll(), 'id', 'nombre'),),
		'descripcion',
		array('name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		'fechaCreacion_f',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
