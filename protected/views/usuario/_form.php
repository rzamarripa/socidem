<?php 
	$usuarioActual = Usuario::model()->find("usuario = '" . Yii::app()->user->name . "'");
?>
<div class="row">
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Instrucciones</h4>	
		Los campos con <span class="required">*</span> son requeridos.
   </div>
	<div class="col-lg-3 text-center">
		<?php
			if(isset($model->foto)) {
				echo CHtml::link('<img class="img-polaroid" src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR . $model->foto . '" alt="' . $model->nombre . '" width=200 height=200/>',array('usuario/subir','id' =>$model->id));
				echo '<div class="alert alert-warning">
					<p><strong>Click en la imagen para agregar foto de perfil</strong></p>
				</div>';
			}
			else if(isset($model->id)){
				echo CHtml::link('<img class="img-polaroid" src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR . 'desconocido.jpeg' . '" alt="' . $model->nombre . '" width=200 height=200/>',array('usuario/subir','id' =>$model->id));	
				echo '<div class="alert alert-warning">
					<p><strong>Click en la imagen para agregar foto de perfil</strong></p>
				</div>';			
			}
			else
			{
				'<div class="alert alert-warning">
					<p><strong>Una vez que se haya registrado podrá subir la foto</strong></p>
				</div>';
			}
			?>	
	</div>
	<div class="col-lg-9">
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'usuario-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
	)); ?>	
	<?php echo $form->errorSummary($model); ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'usuario',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'usuario',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'usuario'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'contrasena',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->passwordField($model,'contrasena',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'contrasena'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'tipoUsuario_did',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->dropDownList($model,'tipoUsuario_did',CHtml::listData(TipoUsuario::model()->findAll(), "id", "nombre"),array("class"=>"form-control")); ?>			<?php echo $form->error($model,'tipoUsuario_did'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'estatus_did',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll(), "id", "nombre"),array("class"=>"form-control")); ?>			<?php echo $form->error($model,'estatus_did'); ?>
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
</div>
	