<?php
$this->pageCaption='Crear Paciente';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo paciente';
$this->breadcrumbs=array(
	'Paciente'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar Paciente','url'=>array('index')),
	array('label'=>'Administrar Paciente','url'=>array('admin')),
);

$usuarioActual = Usuario::model()->obtenerUsuarioActual();
?>


<?php echo $this->renderPartial('_form', array('model'=>$model, 'usuarioActual'=>$usuarioActual)); ?>