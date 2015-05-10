<?php
$this->pageCaption=$model->nombre;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Usuario',
	$model->id,
);

$this->menu=array(
	array('label'=>'Volver','url'=>array('usuario/index')),
	array('label'=>'Actualizar','url'=>array('update','id'=>$model->id)),
);
?>
<br/>
<div class="row">
	<div class="col-lg-3">
		<?php
			if(isset($model->foto)) 
				echo '<img class="img-thumbnail" src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR . $model->foto . '" alt="' . $model->nombre . '" width=200 height=200/>';
			else if(isset($model->id)){
				echo '<img class="img-thumbnail" src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR . 'desconocido.jpeg' . '" alt="' . $model->nombre . '" width=200 height=200/>';				
			}
			else
			{
				'<div class="alert alert-warning">
					<p><strong>Una vez que se haya registrado podrá subir la foto</strong></p>
				</div>';
			}
			?>	
	</div>
	<div class="col-lg-9">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'baseScriptUrl'=>false,
			'cssFile'=>false,
			'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
			'attributes'=>array(
				'id',
				'nombre',
				'usuario',
				array(	'name'=>'tipoUsuario_did',
					        'value'=>$model->tipoUsuario->nombre,),
				array(	'name'=>'estatus_did',
					        'value'=>$model->estatus->nombre,),
			),
		)); ?>
	</div>
</div>

