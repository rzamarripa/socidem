<?php $usuarioActual = Usuario::model()->obtenerUsuarioActual(); ?>
<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
			'id'=>'evento-form',
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
						)); ?>            
					<?php echo $form->error($model,'paciente_aid'); ?>
        </div>
    </div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'descripcion',array('class'=>'control-label col-lg-2')); ?>
			<div class="col-lg-3">
				<?php echo $form->textArea($model,'descripcion',array('id'=>'summernote','placeholder'=>'Descripción')); ?>
				<?php echo $form->error($model,'descripcion'); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'fechaInicio_ft',array('class'=>'control-label col-lg-2')); ?>
			<div class="col-lg-3">
				
					<?php
										Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
										
											$this->widget('CJuiDateTimePicker',array(
												'model'=>$model,
					              'attribute'=>'fechaInicio_ft',	            
					              
					              'language' => 'es',
					              'options'=>array(
					              	'dateFormat'=>'yy/mm/dd',
					              	'buttonText'=>'<span class="glyphicon glyphicon-calendar"></span>',
							            'showAnim'=>'fold',
							            'showOn'=>'both',
						            ),
						            'htmlOptions' => array(
				                  'style' => 'vertical-align:top'
				                ),
					            ));?>	
					<?php echo $form->error($model,'fechaInicio_ft'); ?>
			</div>
		</div>	
		<div class="form-group">
			<?php echo $form->labelEx($model,'fechaFin_ft',array('class'=>'control-label col-lg-2')); ?>
			<div class="col-lg-3">
				
					 <?php
              Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
              if ($model->fechaFin_ft!='') 
                  $model->fechaFin_ft=date('Y-m-d H:i:s',strtotime($model->fechaFin_ft));
              $this->widget('CJuiDateTimePicker',array(
                  'model'=>$model,
                  'attribute'=>'fechaFin_ft',
                  'mode'=>'datetime',
                  'language' => 'es',
                  'options'=>array(
										'buttonText'=>'<span class="glyphicon glyphicon-calendar"></span>',
										'timeFormat' => 'hh:mm tt',
										'dateFormat'=>'yy/mm/dd',
		              	'buttonText'=>'<span class="glyphicon glyphicon-calendar"></span>',
				            'showAnim'=>'fold',
				            'showOn'=>'both',
                 
                  )));?>			
					<?php echo $form->error($model,'fechaFin_ft'); ?>
			</div>
		</div>	
		<div class="form-group">
			<?php echo $form->labelEx($model,'estatus_did',array('class'=>'control-label col-lg-2')); ?>
			<div class="col-lg-3">
				<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll("nombre IS NOT NULL"), "id", "nombre"),array("class"=>"form-control")); ?>			
				<?php echo $form->error($model,'estatus_did'); ?>
			</div>
		</div>
		<?php if($usuarioActual->tipoUsuario_did == 1){ ?>
    <div class="form-group">
			<?php echo $form->labelEx($model,'usuario_did',array('class'=>'control-label col-lg-2')); ?>
			<div class="col-lg-3">
				<?php echo $form->dropDownList($model,'usuario_did',CHtml::listData(Usuario::model()->findAll(), "id", "nombre"),array("class"=>"form-control")); ?>			<?php echo $form->error($model,'usuario_did'); ?>
			</div>
		</div>
	  <?php } else { 
			$model->usuario_did = $usuarioActual->id;
		
		} ?>
		<div class="form-group">
			<div class="col-sm-12 col-md-6 col-lg-4">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
			)); ?>
			</div>
		</div>
	
	<?php $this->endWidget(); ?>

	</div>
</div>

