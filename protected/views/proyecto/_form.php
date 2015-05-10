
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'proyecto-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
	)); ?>

	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Instrucciones</h4>	
		Los campos con <span class="required">*</span> son requeridos.
	</div>	
	<?php echo $form->errorSummary($model); ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'categoria_did',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->dropDownList($model,'categoria_did',CHtml::listData(Categoria::model()->findAll(), "id", "nombre"),array("class"=>"form-control")); ?>			
			<?php echo $form->error($model,'categoria_did'); ?>
		</div>
	</div>
		<div class="form-group">
		<?php echo $form->labelEx($model,'nombre',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'descripcion',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50, 'id' => 'summernote')); ?>
			<?php echo $form->error($model,'descripcion'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'fechaInicio_ft',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php
										Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
										if ($model->fechaInicio_ft!='') 
											$model->fechaInicio_ft=date('d-m-Y',strtotime($model->fechaInicio_ft));
										$this->widget('CJuiDateTimePicker',array(
											'model'=>$model,
							                'attribute'=>'fechaInicio_ft',
							                'mode'=>'datetime',
							                'language' => 'es',
							                'options'=>array('dateFormat'=>'yy/mm/dd'),
							               
								            ));?>			<?php echo $form->error($model,'fechaInicio_ft'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'fechaFin_ft',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php
										Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
										if ($model->fechaFin_ft!='') 
											$model->fechaFin_ft=date('d-m-Y',strtotime($model->fechaFin_ft));
										$this->widget('CJuiDateTimePicker',array(
											'model'=>$model,
							                'attribute'=>'fechaFin_ft',
							                'mode'=>'datetime',
							                'language' => 'es',
							                'options'=>array('dateFormat'=>'yy/mm/dd'),
							               
								            ));?>			<?php echo $form->error($model,'fechaFin_ft'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'responsable_did',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->dropDownList($model,'responsable_did',CHtml::listData(Usuario::model()->findAll(), "id", "nombre"),array("class"=>"form-control")); ?>			
			<?php echo $form->error($model,'responsable_did'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'estatus_did',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll(), "id", "nombre"),array("class"=>"form-control")); ?>			
			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
