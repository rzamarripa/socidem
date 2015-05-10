<?php
$this->pageCaption='Ver Consulta Otorrino de '.$model->paciente->nombre . " " . $model->paciente->apellidos;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Consulta Otorrino'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Inicio','url'=>array('site/index')),
	array('label'=>'Crear Consulta Otorrino','url'=>array('create')),
	array('label'=>'Actualizar Consulta Otorrino','url'=>array('update','id'=>$model->id)),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		array(	'name'=>'paciente_aid',
			        'value'=>$model->paciente->nombre,),
		'sintomas',
		'diagnostico',
		'tratamiento',
		'notas',
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
		'fechaCreacion_ft',
	),
)); ?>
