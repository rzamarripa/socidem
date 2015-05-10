<?php
$this->pageCaption='Actualizar Consulta de '.$model->paciente->nombre . " " . $model->paciente->apellidos;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Consulta Basica'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Ver Consulta Básica','url'=>array('view','id'=>$model->id)),
	array('label'=>'Crear Consulta Básica','url'=>array('create')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>