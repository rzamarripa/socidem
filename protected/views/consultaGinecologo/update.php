<?php
$this->pageCaption='Actualizar ConsultaGinecologo '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Consulta Ginecologo'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar ConsultaGinecologo','url'=>array('index')),
	array('label'=>'Crear ConsultaGinecologo','url'=>array('create')),
	array('label'=>'Ver ConsultaGinecologo','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar ConsultaGinecologo','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>