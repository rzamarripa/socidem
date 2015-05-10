<?php
$this->pageCaption='Adminsitrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='consulta otorrino';
$this->breadcrumbs=array(
	'Consulta Otorrino'=>array('index'),
	'Adminsitrar',
);

$this->menu=array(
	array('label'=>'Listar ConsultaOtorrino','url'=>array('index')),
	array('label'=>'Crear ConsultaOtorrino','url'=>array('create')),
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'consulta-otorrino-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array('name'=>'paciente_aid',
		        'value'=>'$data->paciente->nombre',
			    'filter'=>CHtml::listData(Paciente::model()->findAll(), 'id', 'nombre'),),
		'fecha_f',
		'sintomas',
		'diagnostico',
		'tratamiento',
		/*
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
