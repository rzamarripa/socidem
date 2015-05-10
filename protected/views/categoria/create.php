<?php
$this->pageCaption='Crear Categoría';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo categoría';
$this->breadcrumbs=array(
	'Categoría'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Volver','url'=>array('index')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>