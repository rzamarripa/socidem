<?php
$this->pageCaption='';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(

);

$this->menu=array(
	
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
<div id="evento" class="popover top">
      <div class="arrow"></div>
      <h3 class="popover-title" id="popover-top">Popover top<a class="anchorjs-link" href="#popover-top"><span class="anchorjs-icon"></span></a></h3>
      <div class="popover-content">
        <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
      </div>
    </div>
    <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>
<div class="row">
	<div class="col-lg-2">
		<?php echo CHtml::link("Listar Citas",array("evento/listar"), array("class"=>"btn btn-info")); ?>
		<br/><br/>
		<ul id="medicos">
			<?php $medicos = Usuario::model()->findAll("tipoUsuario_did >= 3");
				foreach($medicos as $medico){ ?>
					<li id="<?php echo $medico->id; ?>" class="fc-event">
						<span data-id="holiday" class="title{medico: '<?php echo $medico->id; ?>'}"><?php echo $medico->nombre; ?></span>
					</li>					
			<?php } ?>
		</ul>
	</div>
	<div class="col-lg-10">
		<div id='calendar'></div>		
	</div>
</div>
