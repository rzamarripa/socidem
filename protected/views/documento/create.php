<?php
$this->pageCaption='Crear Documento';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo documento';
$this->breadcrumbs=array(
	'Documento'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar Documento','url'=>array('index')),
	array('label'=>'Administrar Documento','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>