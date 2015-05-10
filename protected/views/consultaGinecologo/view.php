<?php
$this->pageCaption='Ver ConsultaGinecologo #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Consulta Ginecologo'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar ConsultaGinecologo','url'=>array('index')),
	array('label'=>'Crear ConsultaGinecologo','url'=>array('create')),
	array('label'=>'Actualizar ConsultaGinecologo','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar ConsultaGinecologo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar ConsultaGinecologo','url'=>array('admin')),
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
		'presionSanguinea',
		'peso',
		'temperatura',
		'frecuenciaRespiratoria',
		'pulso',
		'sintomas',
		'diagnostico',
		'tratamiento',
		'notas',
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
		'fechaCreacion_ft',
	),
)); ?>
