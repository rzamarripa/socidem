<?php
$this->pageCaption='Actualizar ConsultaOtorrino '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Consulta Otorrino'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar ConsultaOtorrino','url'=>array('index')),
	array('label'=>'Crear ConsultaOtorrino','url'=>array('create')),
	array('label'=>'Ver ConsultaOtorrino','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar ConsultaOtorrino','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>