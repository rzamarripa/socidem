
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'consulta-basica-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
	)); 
	?>

	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Instrucciones</h4>	
		Los campos con <span class="required">*</span> son requeridos.
	</div>	
	<?php echo $form->errorSummary($model); ?>
		<div class="form-group">
		<?php echo $form->labelEx($model,'paciente_aid',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			
							<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
						      'model'=>$model, 
						      'attribute'=>'paciente_aid', 
						      'sourceUrl'=>Yii::app()->createUrl('paciente/autocompletesearch'), 
						      'showFKField'=>false,
						      'relName'=>'paciente',
						      'displayAttr'=>'nombre',	
						      'options'=>array(
						          'minLength'=>1, 
						      ),
						 )); ?>			<?php echo $form->error($model,'paciente_aid'); ?>
		</div>
	</div>
	<?php if($model->isNewRecord){?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'fecha_f',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			
							<?php
							if ($model->fecha_f!='') 
								$model->fecha_f=date('Y-m-d',strtotime($model->fecha_f));
							$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                   'model'=>$model,
                   'attribute'=>'fecha_f',
                   'value'=>$model->fecha_f,
                   'language' => 'es',
                   'htmlOptions' => array('readonly'=>"",'value' => date('Y-m-d')),
                  'options'=> array(
									'dateFormat'=>'yy-mm-dd', 
									'altFormat'=>'dd-mm-yy',
									'changeMonth'=>'true', 
									'changeYear'=>'true', 
									'showOn'=>'both',
									'buttonText'=>'<i class="fa fa-calendar"></i>'
								),)); ?>			<?php echo $form->error($model,'fecha_f'); ?>
		</div>
	</div><?php }else{?>
		<div class="form-group">
		<?php echo $form->labelEx($model,'fecha_f',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			
							<?php
							if ($model->fecha_f!='') 
								$model->fecha_f=date('Y-m-d',strtotime($model->fecha_f));
							$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                   'model'=>$model,
                   'attribute'=>'fecha_f',
                   'value'=>$model->fecha_f,
                   'language' => 'es',
                   'htmlOptions' => array('readonly'=>""),
                  'options'=> array(
									'dateFormat'=>'yy-mm-dd', 
									'altFormat'=>'dd-mm-yy',
									'changeMonth'=>'true', 
									'changeYear'=>'true', 
									'showOn'=>'both',
									'buttonText'=>'<i class="fa fa-calendar"></i>'
								),)); ?>			<?php echo $form->error($model,'fecha_f'); ?>
		</div>
	</div>
	<?php } ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'sintomas',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textArea($model,'sintomas',array('rows'=>6, 'cols'=>50, 'class'=>'')); ?>
			<?php echo $form->error($model,'sintomas'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'diagnostico',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textArea($model,'diagnostico',array('rows'=>6, 'cols'=>50, 'class'=>'')); ?>
			<?php echo $form->error($model,'diagnostico'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'tratamiento',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textArea($model,'tratamiento',array('rows'=>6, 'cols'=>50, 'class'=>'')); ?>
			<?php echo $form->error($model,'tratamiento'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'notas',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textArea($model,'notas',array('rows'=>6, 'cols'=>50, 'class'=>'')); ?>
			<?php echo $form->error($model,'notas'); ?>
		</div>
	</div>
	<?php /*
	<div class="form-group">
		<?php echo $form->labelEx($model,'estatus_did',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll(), "id", "nombre"),array("class"=>"form-control")); ?>			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div> */?>
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
