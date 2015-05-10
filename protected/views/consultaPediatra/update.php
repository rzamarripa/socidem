<?php
$this->pageCaption='Actualizar ConsultaPediatra '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Consulta Pediatra'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar ConsultaPediatra','url'=>array('index')),
	array('label'=>'Crear ConsultaPediatra','url'=>array('create')),
	array('label'=>'Ver ConsultaPediatra','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar ConsultaPediatra','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>