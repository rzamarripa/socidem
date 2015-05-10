<?php
$this->pageCaption='Adminsitrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='consulta ginecologo';
$this->breadcrumbs=array(
	'Consulta Ginecologo'=>array('index'),
	'Adminsitrar',
);

$this->menu=array(
	array('label'=>'Listar ConsultaGinecologo','url'=>array('index')),
	array('label'=>'Crear ConsultaGinecologo','url'=>array('create')),
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'consulta-ginecologo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array('name'=>'paciente_aid',
		        'value'=>'$data->paciente->nombre',
			    'filter'=>CHtml::listData(Paciente::model()->findAll(), 'id', 'nombre'),),
		'fecha_f',
		'presionSanguinea',
		'peso',
		'temperatura',
		/*
		'frecuenciaRespiratoria',
		'pulso',
		'fechaUltimaMenstruacion_f',
		'sintomas',
		'diagnostico',
		'tratamiento',
		'notas',
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
