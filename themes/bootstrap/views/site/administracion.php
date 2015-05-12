	
  <div class="row">
		<div class="col-lg-12">
			<table class="table table-striped table-bordered display" style="margin-top:50px;">
				<caption><h4>Listado de citas</h4></caption>
				<thead class="thead">
					<tr>
						<th style="text-align: center;">Cita</th>
						<th style="text-align: center;">Paciente</th>
						<th style="text-align: center;">Fecha Cita</th>
						<th class="hidden-sm hidden-xs" style="text-align: center;">Descripción</th>
						<th style="text-align: center;">Médico</th>
						<th class="hidden-sm hidden-xs hidden-md" style="text-align: center;">Estatus</th>
						<th class="hidden-lg" style="text-align: center;">Acciones</th>
						<th class="hidden-sm hidden-xs hidden-md" style="text-align: center;">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php $c=0; foreach($citas as $cita){ $c++; ?>
					<tr>
						<td style="text-align: center;"><?php echo date("H:i A", strtotime($cita->fechaInicio_ft)); ?></td>
						<td><?php echo CHtml::link(CHtml::encode($cita->paciente->nombre . " " . $cita->paciente->apellidos), array('paciente/view', 'id'=>$cita->paciente->id)); ?></td>
						<td><?php echo date("d-m-Y H:i A", strtotime($cita->fechaInicio_ft));?></td>	
						<td class="hidden-sm hidden-xs"><?php echo $cita->descripcion;?></td>	
						<td ><?php echo $cita->usuario->nombre;?></td>
						 <td  class="hidden-sm hidden-xs hidden-md text-center"><?php echo ($cita->estatus_did == 2) ? '<span class="label label-success">' . $evento->estatus->tipo. '</span>' :
            							'<span class="label label-warning">' . $cita->estatus->tipo . '</span>'; ?></td>							
            <td class="hidden-sm hidden-xs hidden-md">
            	<?php echo CHtml::link('Ver',array('evento/view','id'=>$cita->id),array('class'=>'btn btn-info btn-sm')); ?>
	            <?php echo CHtml::link('Editar',array('evento/actualizar','id'=>$cita->id),array('class'=>'btn btn-success btn-sm')); ?>
							<?php echo ($cita->estatus_did == 1) ? 
													CHtml::link('Pasar',array('evento/cambiar','id'=>$cita->id,'estatus'=>2),array('class'=>'btn btn-primary btn-sm')) : 
													CHtml::link('No Pasar',array('evento/cambiar','id'=>$cita->id,'estatus'=>1),array('class'=>'btn btn-danger btn-sm')); ?>
            </td>            
            <td class="hidden-lg">
	            <div class="btn-group">
							  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							    Acciones <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
							    <li><?php echo CHtml::link('Ver',array('evento/view','id'=>$cita->id),array('class'=>'btn btn-info btn-sm')); ?></li>
							    <li><?php echo CHtml::link('Editar',array('evento/actualizar','id'=>$cita->id),array('class'=>'btn btn-success btn-sm')); ?></li>
							    <li><?php echo ($cita->estatus_did == 1) ? 
													CHtml::link('<i class="fa fa-ok"></i>Pasar',array('evento/cambiar','id'=>$cita->id,'estatus'=>2),array('class'=>'btn btn-primary btn-sm')) : 
													CHtml::link('No Pasar',array('evento/cambiar','id'=>$cita->id,'estatus'=>1),array('class'=>'btn btn-danger btn-sm')); ?></li>
							  </ul>
							</div>
            </td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	
		<script>
			$(document).ready(function() {

				// DO NOT REMOVE : GLOBAL FUNCTIONS!
				pageSetUp();

					});

		</script>

		