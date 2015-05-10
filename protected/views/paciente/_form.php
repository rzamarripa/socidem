
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'paciente-form',
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
		<?php echo $form->labelEx($model,'foto',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->fileField($model,'foto',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'foto'); ?>
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
		<?php echo $form->labelEx($model,'apellidos',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'apellidos',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'apellidos'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'fechaNac_f',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			
				<?php
				
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
             'model'=>$model,
             'attribute'=>'fechaNac_f',
             'value'=>$model->fechaNac_f,
             'language' => 'es',
             'htmlOptions' => array('readonly'=>""),
            'options'=> array(
	            'numberOfMonths'=>3,
	            'showButtonPanel'=>true,
	            'showAnim'=>'clip',
							'dateFormat'=>'yy-mm-dd', 
							'yearRange'=>'-90:+0',
							'changeMonth'=>'true', 
							'changeYear'=>'true', 
							'showOn'=>'both',
							'buttonText'=>'<i class="fa fa-calendar"></i>'
					),)); ?>			
				<?php echo $form->error($model,'fechaNac_f'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'sexo',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->dropDownList($model,'sexo',array("Masculino"=>"Masculino", "Femenino"=>"Femenino"),array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'sexo'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'telefono',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'telefono',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'telefono'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'celular',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'celular',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'celular'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'correo',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'correo',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'correo'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'direccion',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>500,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'direccion'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'peso',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'peso',array('size'=>6,'maxlength'=>6,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'peso'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'alergico',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textArea($model,'alergico',array('rows'=>6, 'cols'=>52)); ?>
			<?php echo $form->error($model,'alergico'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'emergencia',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'emergencia',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'emergencia'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'grupoSanguineo',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->dropDownList($model,'grupoSanguineo',array(
																							"A RH-"=>"A RH-", 
																							"A RH+"=>"A RH+", 
																							"AB RH-"=>"AB RH-", 
																							"AB RH+"=>"AB RH+", 
																							"B RH-"=>"B RH-", 
																							"B RH+"=>"B RH+", 
																							"O RH-"=>"O RH-", 
																							"O RH+"=>"O RH+"
																		),array("empty"=>"Seleccione Tipo Sangre","class"=>"form-control")); ?>
			<?php echo $form->error($model,'grupoSanguineo'); ?>
		</div>
	</div>
	<?php /*
	<div class="form-group">
		<?php echo $form->labelEx($model,'estatus_did',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll("nombre IS NOT NULL"), "id", "nombre"),array("class"=>"form-control")); ?>			
			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div>
	*/ ?>
	<?php if($usuarioActual->tipoUsuario_did == 1){ ?>
    <div class="form-group">
			<?php echo $form->labelEx($model,'usuario_did',array('class'=>'control-label col-lg-2')); ?>
			<div class="col-lg-3">
				<?php echo $form->dropDownList($model,'usuario_did',CHtml::listData(Usuario::model()->findAll("estatus_did = 1 && tipoUsuario_did > 3"), "id", "nombre"),array("empty"=>"Seleccione al Doctor", "class"=>"form-control")); ?>			<?php echo $form->error($model,'usuario_did'); ?>
			</div>
		</div>
  <?php } else { 
		$model->usuario_did = $usuarioActual->id;
	
	} ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'observaciones',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>52)); ?>
			<?php echo $form->error($model,'observaciones'); ?>
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
