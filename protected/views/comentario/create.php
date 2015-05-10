<?php
$this->pageCaption='Crear Comentario';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo comentario';
$this->breadcrumbs=array(
	'Comentario'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar Comentario','url'=>array('index')),
	array('label'=>'Administrar Comentario','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>