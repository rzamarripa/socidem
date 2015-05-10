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
		<?php echo $form->label($model,'paciente_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'paciente_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('paciente/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'paciente', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'fecha_f'); ?>
		<div class="input">
			
			<?php
					if ($model->fecha_f!='') 
						$fecha_f=date('d-m-Y',strtotime($fecha_f));
					else
						$fecha_f=date('d-m-Y');
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					                                       'model'=>$model,
					                                       'attribute'=>'fecha_f',
					                                       'value'=>$fecha_f,
					                                       'language' => 'es',
					                                       'htmlOptions' => array('readonly'=>"readonly"),
					                                       'options'=>array(
					                                               'autoSize'=>true,
					                                               'defaultDate'=>$fecha_f,
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
		<?php echo $form->label($model,'sintomas'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'sintomas',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'notas'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'notas',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'peso'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'peso'); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'altura'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'altura'); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'pc'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'pc'); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'temperatura'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'temperatura'); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'fc'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'fc'); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'fr'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'fr'); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'ta'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'ta'); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'diagnostico'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'diagnostico',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'tratamiento'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'tratamiento',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,"estatus_did",CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'fechaCreacion_ft'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'fechaCreacion_ft'); ?>
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
