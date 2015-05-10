<?php
$this->pageCaption='Crear ConsultaGinecologo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo consultaginecologo';
$this->breadcrumbs=array(
	'Consulta Ginecologo'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar ConsultaGinecologo','url'=>array('index')),
	array('label'=>'Administrar ConsultaGinecologo','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>