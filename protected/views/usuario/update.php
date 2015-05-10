<?php
$this->pageCaption=$model->nombre;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Usuario',
	$model->id,
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Volver','url'=>array('view','id'=>$model->id)),
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>