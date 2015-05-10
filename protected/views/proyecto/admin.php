<?php
$this->pageCaption='Adminsitrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='proyecto';
$this->breadcrumbs=array(
	'Proyecto'=>array('index'),
	'Adminsitrar',
);

$this->menu=array(
	array('label'=>'Listar Proyecto','url'=>array('index')),
	array('label'=>'Crear Proyecto','url'=>array('create')),
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'proyecto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		'descripcion',
		'fechaInicio_ft',
		'fechaFin_ft',
		array('name'=>'responsable_did',
		        'value'=>'$data->responsable->nombre',
			    'filter'=>CHtml::listData(Responsable::model()->findAll(), 'id', 'nombre'),),
		/*
		array('name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
