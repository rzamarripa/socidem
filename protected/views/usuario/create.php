<?php
$this->pageCaption='Usuarios';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Usuario'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar Usuario','url'=>array('index')),
	array('label'=>'Administrar Usuario','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>