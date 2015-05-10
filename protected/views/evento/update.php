<?php
$this->pageCaption='Actualizar Cita de '.$model->paciente->nombre . " " . $model->paciente->apellidos;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Evento'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Citas','url'=>array('index')),
	array('label'=>'Crear Cita','url'=>array('create')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model,'usuarioActual'=>$usuarioActual)); ?>