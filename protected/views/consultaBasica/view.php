<?php
$this->pageCaption='Ver Consulta Básica de '.$model->paciente->nombre . " " . $model->paciente->apellidos;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Consulta Basica'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Crear Consulta','url'=>array('create')),
	array('label'=>'Actualizar Consulta','url'=>array('update','id'=>$model->id)),
	array('label'=>'Imprimir','url'=>array('imprimir','id'=>$model->id), 'linkOptions' => array('target'=>'_blank')),

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
		'sintomas:html',
		'diagnostico:html',
		'tratamiento:html',
		'notas:html',
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
		'fechaCreacion_ft',
	),
)); ?>


