<?php
$this->pageCaption='Subir documentos del Proyecto: ' . $proyecto->nombre;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Documentos',
);

$this->menu=array(
	array('label'=>'Volver al proyecto','url'=>array('proyecto/view','id'=>$proyecto->id)),
);

?>
<br/>
<div class="row">          
  <div class="col-lg-12">
		<?php	
			$this->widget('xupload.XUpload', array(
		    'url' => Yii::app()->createUrl("proyecto/upload",array('id'=>$proyecto->id)),
		    'model' => $model,
		    'attribute' => 'file',
		    'multiple' => true,
			));	
		?>
	</div>
</div>