<?php
$this->pageCaption='Crear Consulta';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Consulta Basica'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Volver','url'=>Yii::app()->request->urlReferrer),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>