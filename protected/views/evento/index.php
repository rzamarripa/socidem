<?php
$this->pageCaption='Citas';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar citas';
$this->breadcrumbs=array(
	'Citas',
);

$this->menu=array(
	array('label'=>'Listar Citas','url'=>array('listar')),
);


?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Nueva Cita</h4>
      </div>
      <div class="modal-body">
      	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
						'id'=>'evento-form',
						'type'=>'horizontal',
						'enableAjaxValidation'=>true,
					)); ?>
	
						<div class="alert alert-info">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<h4>Instrucciones</h4>	
							Los campos con <span class="required">*</span> son requeridos.
						</div>	
						<?php echo $form->errorSummary($model); ?>
						<div class="form-group">
							<?php echo $form->labelEx($model,'paciente_aid',array('class'=>'control-label col-lg-3 text-left')); ?>
							<div class="col-sm-12 col-md-6 col-lg-12">
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
							<?php echo $form->labelEx($model,'descripcion',array('class'=>'control-label col-lg-3 text-left')); ?>
							<div class="col-sm-12 col-md-6 col-lg-12">
								<?php echo $form->textArea($model,'descripcion',array('id'=>'summernote','placeholder'=>'Descripción')); ?>
								<?php echo $form->error($model,'descripcion'); ?>
							</div>
						</div>
						<div class="form-group">		
							<?php echo $form->labelEx($model,'fechaInicio_ft',array('class'=>'control-label col-lg-3 text-left')); ?>	
							<div class="col-sm-12 col-md-6 col-lg-12">
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
							            'showOn'=>'button',
						            ),
						            'htmlOptions' => array(
				                  'style' => 'vertical-align:top'
				                ),
					            ));?>			
								<?php echo $form->error($model,'fechaInicio_ft'); ?>
							</div>
						</div>							
						<div class="form-group">		
							<?php echo $form->labelEx($model,'fechaFin_ft',array('class'=>'control-label col-lg-4 text-left')); ?>	
							<div class="col-sm-12 col-md-6 col-lg-12">
								<?php
										Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
										
											$this->widget('CJuiDateTimePicker',array(
												'model'=>$model,
					              'attribute'=>'fechaFin_ft',	              
					              
					              'language' => 'es',
					              'options'=>array(
					              	'dateFormat'=>'yy/mm/dd',
					              	'buttonText'=>'<span class="glyphicon glyphicon-calendar"></span>',
							            'showAnim'=>'fold',
							            'showOn'=>'button',
						            ),
						            'htmlOptions' => array(
				                  'style' => 'vertical-align:top'
				                ),
					            ));?>			
								<?php echo $form->error($model,'fechaFin_ft'); ?>
							</div>
						</div>							
						<?php 
							$usuarioActual = Usuario::model()->obtenerUsuarioActual();	

							if($usuarioActual->tipoUsuario_did == 1){ ?>
					    <div class="form-group">
								<?php echo $form->labelEx($model,'usuario_did',array('class'=>'control-label col-lg-6 text-left')); ?>
								<div class="col-lg-8">
									<?php echo $form->dropDownList($model,'usuario_did',CHtml::listData(Usuario::model()->findAll("estatus_did = 1 && tipoUsuario_did > 3"), "id", "nombre"),array("class"=>"form-control")); ?>			
									<?php echo $form->error($model,'usuario_did'); ?>
								</div>
							</div>
						  <?php } ?>						
				
				<?php $this->endWidget(); ?> 
			</div>
			
 
			<div class="modal-footer">
		    <?php $this->widget('bootstrap.widgets.TbButton', array(
            'label'=>'Cerrar',
            'url'=>'#',
            'type'=>'',
            'htmlOptions'=>array('data-dismiss'=>'modal'),
				)); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'type'=>'info',
            'label'=>'Aceptar',
            'url'=>Yii::app()->createUrl("create"),
            'htmlOptions'=>array('data-dismiss'=>'modal','onclick'=>'$("#evento-form").submit()'),
        )); ?>
			</div>
    </div>
  </div>
</div>


<div id='calendar' style="height:200px;"></div>