<?php
$this->pageCaption='Adminsitrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='consulta pediatra';
$this->breadcrumbs=array(
	'Consulta Pediatra'=>array('index'),
	'Adminsitrar',
);

$this->menu=array(
	array('label'=>'Listar ConsultaPediatra','url'=>array('index')),
	array('label'=>'Crear ConsultaPediatra','url'=>array('create')),
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'consulta-pediatra-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array('name'=>'paciente_aid',
		        'value'=>'$data->paciente->nombre',
			    'filter'=>CHtml::listData(Paciente::model()->findAll(), 'id', 'nombre'),),
		'fecha_f',
		'sintomas',
		'notas',
		'peso',
		/*
		'altura',
		'pc',
		'temperatura',
		'fc',
		'fr',
		'ta',
		'diagnostico',
		'tratamiento',
		array('name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		'fechaCreacion_ft',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
