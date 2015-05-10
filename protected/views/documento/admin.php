<?php
$this->pageCaption='Adminsitrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='documento';
$this->breadcrumbs=array(
	'Documento'=>array('index'),
	'Adminsitrar',
);

$this->menu=array(
	array('label'=>'Listar Documento','url'=>array('index')),
	array('label'=>'Crear Documento','url'=>array('create')),
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'documento-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array('name'=>'proyecto_did',
		        'value'=>'$data->proyecto->nombre',
			    'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id', 'nombre'),),
		'ruta',
		array('name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
