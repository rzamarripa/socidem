<?php 
	$this->pageCaption=$model->nombre;
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='';
	$this->breadcrumbs=array(
		'Actualizar foto',
		$model->id,
	);
?>
<div class="form">

	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'usuario-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>true,		
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
	)); ?>
		
		<div class="<?php echo 'control-group'; ?>">
			<?php echo $form->labelEx($up,'foto',array('class'=>'control-label')); ?>
			<div class="controls">
				<div class="input-prepend">
				<?php echo $form->FileField($up,'foto'); ?>
				<?php echo $form->error($up,'foto'); ?>
				</div>
			</div>
		</div>
		
		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',			
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
			'htmlOptions'=>array("id"=>"btnAction",'data-alert'=>'abajo'),
		)); ?>
		</div>

	<?php $this->endWidget(); ?>
</div>