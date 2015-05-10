<?php
$this->pageCaption='Administrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='actividad';
$this->breadcrumbs=array(
	'Actividad'=>array('index'),
	'Administrar',
);
$count=0;
$this->menu=array(
	array('label'=>'Listar Actividad','url'=>array('index')),
	array('label'=>'Crear Actividad','url'=>array('create')),
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'actividad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	$partes = explode('_',$column->name);
	$finalCampo=$partes[count($partes)-1];
	$relacion=$partes[0];
	$modeloColumna=ucwords($partes[0]);
	
	if($finalCampo=='did' || $finalCampo=='aid')
		echo "\t\tarray('name'=>'{$column->name}',
		        'value'=>'\$data->{$relacion}->nombre',
			    'filter'=>CHtml::listData({$modeloColumna}::model()->findAll(), 'id', 'nombre'),),\n";
	else
		echo "\t\t'".$column->name."',\n";
}

if($count>=7)
	echo "\t\t*/\n";

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
