<?php
$this->pageCaption='Actualizar Categoria '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Categoria'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Categoria','url'=>array('index')),
	array('label'=>'Crear Categoria','url'=>array('create')),
	array('label'=>'Ver Categoria','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar Categoria','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>