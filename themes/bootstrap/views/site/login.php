<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

	$this->pageTitle=Yii::app()->name . ' - Sesión';
	$this->breadcrumbs=array(
		'Iniciar Sesión',
	);
?>
<div class="row">
  <div class="col-lg-12">
    <h1>Iniciar Sesión<small> para administrar citas y pacientes</small></h1>
  </div>
</div><!-- /.row -->
<br/><br/><br/><br/>
<div class="row">
	<div class="col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2 col-lg-4 col-lg-offset-4" style="text-align:center">
		<div class="well no-padding">
			<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
					'id'=>'login-form',
				    'type'=>'',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
					'htmlOptions'=>array(
						'class'=>"smart-form client-form"
					),
				));
				echo $form->errorSummary($model); ?>
				<header>
					Iniciar Sesión
				</header>

				<fieldset>
					
					<section>
						<label class="label">Usuario</label>
						<label class="input"> <i class="icon-append fa fa-user"></i>
							<?php echo $form->textField($model,'username',array('placeholder'=>'Usuario')); ?>
							<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Introduzca su usuario</b></label>
					</section>

					<section>
						<label class="label">Contraseña</label>
						<label class="input"> <i class="icon-append fa fa-lock"></i>
							<?php	echo $form->passwordField($model,'password',array('placeholder'=>'Contraseña')); ?>
							<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Introduzca su contraseña</b> </label>						
					</section>
				</fieldset>
				<footer>
					<button type="submit" name="submit" class="btn btn-info btn-block">Iniciar Sesión</button>
				</footer>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>