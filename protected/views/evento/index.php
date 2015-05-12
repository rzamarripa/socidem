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

<!-- MAIN PANEL -->
		<div id="main" role="main">

			
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><i class="fa fa-calendar fa-fw "></i> 
							Calendar
							<span>>
							Add events
							</span>
						</h1>
					</div>
					
				</div>
				<!-- row -->
				
				<div class="row">
				
					<div class="col-sm-12 col-md-12 col-lg-3">
						<!-- new widget -->
						<div class="jarviswidget jarviswidget-color-blueDark">
							<header>
								<h2> Add Events </h2>
							</header>
				
							<!-- widget div-->
							<div>
				
								<div class="widget-body">
									<!-- content goes here -->
				
									<form id="add-event-form">
										<fieldset>
				
											<div class="form-group">
												<label>Select Event Icon</label>
												<div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">
													<label class="btn btn-default active">
														<input type="radio" name="iconselect" id="icon-1" value="fa-info" checked>
														<i class="fa fa-info text-muted"></i> </label>
													<label class="btn btn-default">
														<input type="radio" name="iconselect" id="icon-2" value="fa-warning">
														<i class="fa fa-warning text-muted"></i> </label>
													<label class="btn btn-default">
														<input type="radio" name="iconselect" id="icon-3" value="fa-check">
														<i class="fa fa-check text-muted"></i> </label>
													<label class="btn btn-default">
														<input type="radio" name="iconselect" id="icon-4" value="fa-user">
														<i class="fa fa-user text-muted"></i> </label>
													<label class="btn btn-default">
														<input type="radio" name="iconselect" id="icon-5" value="fa-lock">
														<i class="fa fa-lock text-muted"></i> </label>
													<label class="btn btn-default">
														<input type="radio" name="iconselect" id="icon-6" value="fa-clock-o">
														<i class="fa fa-clock-o text-muted"></i> </label>
												</div>
											</div>
				
											<div class="form-group">
												<label>Event Title</label>
												<input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="Event Title">
											</div>
											<div class="form-group">
												<label>Event Description</label>
												<textarea class="form-control" placeholder="Please be brief" rows="3" maxlength="40" id="description"></textarea>
												<p class="note">Maxlength is set to 40 characters</p>
											</div>
				
											<div class="form-group">
												<label>Select Event Color</label>
												<div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
													<label class="btn bg-color-darken active">
														<input type="radio" name="priority" id="option1" value="bg-color-darken txt-color-white" checked>
														<i class="fa fa-check txt-color-white"></i> </label>
													<label class="btn bg-color-blue">
														<input type="radio" name="priority" id="option2" value="bg-color-blue txt-color-white">
														<i class="fa fa-check txt-color-white"></i> </label>
													<label class="btn bg-color-orange">
														<input type="radio" name="priority" id="option3" value="bg-color-orange txt-color-white">
														<i class="fa fa-check txt-color-white"></i> </label>
													<label class="btn bg-color-greenLight">
														<input type="radio" name="priority" id="option4" value="bg-color-greenLight txt-color-white">
														<i class="fa fa-check txt-color-white"></i> </label>
													<label class="btn bg-color-blueLight">
														<input type="radio" name="priority" id="option5" value="bg-color-blueLight txt-color-white">
														<i class="fa fa-check txt-color-white"></i> </label>
													<label class="btn bg-color-red">
														<input type="radio" name="priority" id="option6" value="bg-color-red txt-color-white">
														<i class="fa fa-check txt-color-white"></i> </label>
												</div>
											</div>
				
										</fieldset>
										<div class="form-actions">
											<div class="row">
												<div class="col-md-12">
													<button class="btn btn-default" type="button" id="add-event" >
														Add Event
													</button>
												</div>
											</div>
										</div>
									</form>
				
									<!-- end content -->
								</div>
				
							</div>
							<!-- end widget div -->
						</div>
						<!-- end widget -->
				
						<div class="well well-sm" id="event-container">
							<form>
								<fieldset>
									<legend>
										Draggable Events
									</legend>
									<ul id='external-events' class="list-unstyled">
										<li>
											<span class="bg-color-darken txt-color-white" data-description="Currently busy" data-icon="fa-time">Office Meeting</span>
										</li>
										<li>
											<span class="bg-color-blue txt-color-white" data-description="No Description" data-icon="fa-pie">Lunch Break</span>
										</li>
										<li>
											<span class="bg-color-red txt-color-white" data-description="Urgent Tasks" data-icon="fa-alert">URGENT</span>
										</li>
									</ul>
									<div class="checkbox">
										<label>
											<input type="checkbox" id="drop-remove" class="checkbox style-0" checked="checked">
											<span>remove after drop</span> </label>
					
									</div>
								</fieldset>
							</form>
				
						</div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-9">
				
						<!-- new widget -->
						<div class="jarviswidget jarviswidget-color-blueDark">
				
							<!-- widget options:
							usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
				
							data-widget-colorbutton="false"
							data-widget-editbutton="false"
							data-widget-togglebutton="false"
							data-widget-deletebutton="false"
							data-widget-fullscreenbutton="false"
							data-widget-custombutton="false"
							data-widget-collapsed="true"
							data-widget-sortable="false"
				
							-->
							<header>
								<span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
								<h2> My Events </h2>
								<div class="widget-toolbar">
									<!-- add: non-hidden - to disable auto hide -->
									<div class="btn-group">
										<button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
											Showing <i class="fa fa-caret-down"></i>
										</button>
										<ul class="dropdown-menu js-status-update pull-right">
											<li>
												<a href="javascript:void(0);" id="mt">Month</a>
											</li>
											<li>
												<a href="javascript:void(0);" id="ag">Agenda</a>
											</li>
											<li>
												<a href="javascript:void(0);" id="td">Today</a>
											</li>
										</ul>
									</div>
								</div>
							</header>
				
							<!-- widget div-->
							<div>
				
								<div class="widget-body no-padding">
									<!-- content goes here -->
									<div class="widget-body-toolbar">
				
										<div id="calendar-buttons">
				
											<div class="btn-group">
												<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-prev"><i class="fa fa-chevron-left"></i></a>
												<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-next"><i class="fa fa-chevron-right"></i></a>
											</div>
										</div>
									</div>
									<div id="calendar"></div>
				
									<!-- end content -->
								</div>
				
							</div>
							<!-- end widget div -->
						</div>
						<!-- end widget -->
				
					</div>
				
				</div>
				
				<!-- end row -->

			</div>
			<!-- END MAIN CONTENT -->

		</div>