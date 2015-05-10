<?php
$this->pageCaption='Crear Actividad';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo actividad';
$this->breadcrumbs=array(
	'Actividad'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar Actividad','url'=>array('index')),
	array('label'=>'Administrar Actividad','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>