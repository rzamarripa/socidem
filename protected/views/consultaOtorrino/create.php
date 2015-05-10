<?php
$this->pageCaption='Crear Consulta Otorrino';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Consulta Otorrino'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Inicio','url'=>array('site/index')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>