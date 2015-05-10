<?php
$this->pageCaption='Adminsitrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='paciente';
$this->breadcrumbs=array(
	'Paciente'=>array('index'),
	'Adminsitrar',
);

$this->menu=array(
	array('label'=>'Listar Paciente','url'=>array('index')),
	array('label'=>'Crear Paciente','url'=>array('create')),
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'paciente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'foto',
		'nombre',
		'apellidos',
		'fechaNac_f',
		'sexo',
		/*
		'telefono',
		'celular',
		'correo',
		'direccion',
		'peso',
		'alergico',
		'emergencia',
		'grupoSanguineo',
		array('name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		array('name'=>'usuario_did',
		        'value'=>'$data->usuario->nombre',
			    'filter'=>CHtml::listData(Usuario::model()->findAll(), 'id', 'nombre'),),
		'fechaCreacion_ft',
		'observaciones',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
