<?php
$this->pageCaption='Ver Actividad #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Actividad'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Actividad','url'=>array('index')),
	array('label'=>'Crear Actividad','url'=>array('create')),
	array('label'=>'Actualizar Actividad','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar Actividad','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Actividad','url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'mensaje',
		'usuario',
	),
)); ?>
