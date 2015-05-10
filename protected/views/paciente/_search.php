<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<div class="clearfix">
		<?php echo $form->label($model,'id'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'id',array('size'=>11,'maxlength'=>11,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'foto'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'foto',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'nombre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'apellidos'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'apellidos',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'fechaNac_f'); ?>
		<div class="input">
			
			<?php
					if ($model->fechaNac_f!='') 
						$fechaNac_f=date('d-m-Y',strtotime($fechaNac_f));
					else
						$fechaNac_f=date('d-m-Y');
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					                                       'model'=>$model,
					                                       'attribute'=>'fechaNac_f',
					                                       'value'=>$fechaNac_f,
					                                       'language' => 'es',
					                                       'htmlOptions' => array('readonly'=>"readonly"),
					                                       'options'=>array(
					                                               'autoSize'=>true,
					                                               'defaultDate'=>$fechaNac_f,
					                                               'dateFormat'=>'yy-mm-dd',
					                                               'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
					                                               'buttonImageOnly'=>true,
					                                               'buttonText'=>'Fecha',
					                                               'selectOtherMonths'=>true,
					                                               'showAnim'=>'slide',
					                                               'showButtonPanel'=>true,
					                                               'showOn'=>'button',
					                                               'showOtherMonths'=>true,
					                                               'changeMonth' => 'true',
					                                               'changeYear' => 'true',
					                                               'minDate'=>"-70Y", //fecha minima
					                                               'maxDate'=> "+10Y", //fecha maxima
					                                       ),)); ?>		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'sexo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'sexo',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'telefono'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'telefono',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'celular'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'celular',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'correo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'correo',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'direccion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>500,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'peso'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'peso'); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'alergico'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'alergico',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'emergencia'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'emergencia',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'grupoSanguineo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'grupoSanguineo',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,"estatus_did",CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'usuario_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,"usuario_did",CHtml::listData(Usuario::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'fechaCreacion_ft'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'fechaCreacion_ft'); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'observaciones'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
