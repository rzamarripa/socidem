<?php
$this->pageCaption='Crear ConsultaPediatra';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo consultapediatra';
$this->breadcrumbs=array(
	'Consulta Pediatra'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar ConsultaPediatra','url'=>array('index')),
	array('label'=>'Administrar ConsultaPediatra','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>