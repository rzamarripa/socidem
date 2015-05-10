
	<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'".$this->class2id($this->modelClass)."-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
	)); ?>\n"; ?>

	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Instrucciones</h4>	
		Los campos con <span class="required">*</span> son requeridos.
	</div>	
	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>
	<?php
		foreach($this->tableSchema->columns as $column)
		{
			if($column->autoIncrement || $column->name == 'fechaCreacion_f')
				continue;			
	?>
	<div class="form-group">
		<?php echo "<?php echo ". $this->generateActiveLabel($this->modelClass,$column) ."; ?>\n"; ?>
		<div class="col-lg-3">
			<?php 
				$partes = explode('_',$column->name);
				$finalCampo=$partes[count($partes)-1];
				
					if($finalCampo=='did'){					
						$modeloColumna=ucwords($partes[0]);
						echo '<?php echo $form->dropDownList($model,\''.$column->name.'\',CHtml::listData('.$this->tableSchema->foreignKeys[$column->name][0].'::model()->findAll(), "id", "nombre"),array("class"=>"form-control")); ?>';
					}
					else if($finalCampo=='aid'){
						$modeloColumna=$partes[0];
						
						echo "
							<?php \$this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
						      'model'=>\$model, 
						      'attribute'=>'$column->name', 
						      'sourceUrl'=>Yii::app()->createUrl('$modeloColumna/autocompletesearch'), 
						      'showFKField'=>false,
						      'relName'=>'$modeloColumna',
						      'displayAttr'=>'nombre',	
						      'options'=>array(
						          'minLength'=>1, 
						      ),
						 )); ?>";
					}
					else if($finalCampo=='f'){					
							echo "
							<?php
							if (\$model->$column->name!='') 
								\$model->$column->name=date('d-m-Y',strtotime(\$model->$column->name));
							\$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                   'model'=>\$model,
                   'attribute'=>'$column->name',
                   'value'=>\$model->$column->name,
                   'language' => 'es',
                   'htmlOptions' => array('readonly'=>\"\"),
                  'options'=> array(
									'dateFormat'=>'yy-mm-dd', 
									'altFormat'=>'dd-mm-yy', 
									'changeMonth'=>'true', 
									'changeYear'=>'true', 
									'showOn'=>'both',
									'buttonText'=>'<i class=\"icon-calendar\"></i>'
								),)); ?>";
					}
					else if($finalCampo=='ft'){ 
												
							echo "<?php
										Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
										if (\$model->$column->name!='') 
											\$model->$column->name=date('d-m-Y',strtotime(\$model->$column->name));
										\$this->widget('CJuiDateTimePicker',array(
											'model'=>\$model,
							                'attribute'=>'$column->name',
							                'mode'=>'datetime',
							                'language' => 'es',
							                'options'=>array('dateFormat'=>'yy/mm/dd'),
							               
								            ));?>";
					}
					
					else{
						echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n";
					}
			?>
			<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
		</div>
	</div>
<?php
}
?>
	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
		<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>\$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>\n"; ?>
		</div>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
