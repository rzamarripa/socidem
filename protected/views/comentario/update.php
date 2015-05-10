<?php
$this->pageCaption='Actualizar Comentario '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Comentario'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Comentario','url'=>array('index')),
	array('label'=>'Crear Comentario','url'=>array('create')),
	array('label'=>'Ver Comentario','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar Comentario','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>