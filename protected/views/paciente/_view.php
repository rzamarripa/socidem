	<?php
		
	?>
	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->nombre . " " . $data->apellidos), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode(date("d-m-Y", strtotime($data->fechaNac_f))) . " - " . $this->CalculaEdad($data->fechaNac_f) . " años"; ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->sexo); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->telefono); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->usuario->nombre); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->celular); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->correo); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->direccion); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->peso); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->alergico); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->emergencia); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->grupoSanguineo); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->usuario->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fechaCreacion_ft); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->observaciones); ?>
		</td>
		*/ ?>
	</tr>