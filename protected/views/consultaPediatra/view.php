<?php
$this->pageCaption=$model->paciente->nombre . " " . $model->paciente->apellidos;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription=$model->paciente->fechaNac_f;
$this->breadcrumbs=array(
	'Consulta Pediatra'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Crear Consulta','url'=>array('create')),
	array('label'=>'Actualizar Consulta','url'=>array('update','id'=>$model->id)),
	array('label'=>'Imprimir Consulta','url'=>array('imprimir','id'=>$model->id)),
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
		'notas',
		'peso',
		'altura',
		'pc',
		'temperatura',
		'fc',
		'fr',
		'ta',
		'diagnostico',
		'tratamiento',
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
		'fechaCreacion_ft',
	),
)); ?>