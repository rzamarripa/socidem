	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->paciente->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fecha_f); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->sintomas); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->notas); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->peso); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->altura); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->pc); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->temperatura); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fc); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fr); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->ta); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->diagnostico); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->tratamiento); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fechaCreacion_ft); ?>
		</td>
		*/ ?>
	</tr>