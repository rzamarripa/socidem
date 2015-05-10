<?php
$this->pageCaption='Ver Cita de '.$model->paciente->nombre . " " . $model->paciente->apellidos;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Evento'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Cita','url'=>array('index')),
	array('label'=>'Crear Cita','url'=>array('create')),
	array('label'=>'Actualizar Cita','url'=>array('update','id'=>$model->id)),	
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		'fecha_ft',
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
	),
)); ?>
