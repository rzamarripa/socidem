<?php
$this->pageCaption='Actualizar Paciente '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Paciente'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Paciente','url'=>array('index')),
	array('label'=>'Crear Paciente','url'=>array('create')),
	array('label'=>'Ver Paciente','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar Paciente','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model,'usuarioActual'=>$usuarioActual)); ?>