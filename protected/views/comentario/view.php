<?php
$this->pageCaption='Ver Comentario #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Comentario'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Comentario','url'=>array('index')),
	array('label'=>'Crear Comentario','url'=>array('create')),
	array('label'=>'Actualizar Comentario','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar Comentario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Comentario','url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		array(	'name'=>'detalleProyecto_did',
			        'value'=>$model->detalleProyecto->nombre,),
		'descripcion',
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
	),
)); ?>
