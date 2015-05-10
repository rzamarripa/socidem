<?php
$this->pageCaption='Ver DetalleProyecto #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Detalle Proyecto'=>array('index'),
	$model->id,
);
if(isset($_GET["accion"])){
	$this->menu=array(
		array('label'=>'Volver a Proyectos Externos','url'=>array('proyecto/otros')),
		array('label'=>'Volver a mis Proyectos','url'=>array('proyecto/index')),
	);
}else{
	$this->menu=array(
		array('label'=>'Volver al Proyecto','url'=>array('proyecto/index')),
		array('label'=>'Crear Actividad','url'=>array('create','id'=>$_GET["id"])),
		array('label'=>'Actualizar Actividad','url'=>array('update','id'=>$model->id)),
		array('label'=>'Eliminar Actividad','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro que quieres eliminar este elemento?')),
	);
}

?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'nombre',
		array(	'name'=>'proyecto_did',
			        'value'=>$model->proyecto->nombre,),
		'peso',
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
	),
)); ?>
