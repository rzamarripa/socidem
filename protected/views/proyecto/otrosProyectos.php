<?php
$this->pageCaption='Proyectos Externos';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Ayudar';
$this->breadcrumbs=array(
	'Proyecto',
);
$c = 0;
$usuarioActual = Usuario::model()->obtenerUsuarioActual();




foreach($proyectosExternos as $proyectoExterno){
	$actividadesExternas = DetalleProyecto::model()->findAll('estatus_did = 1 && responsable_did = :r && proyecto_did = :p || estatus_did = 3 && responsable_did = :r && proyecto_did = :p ',array(":r"=>$usuarioActual->id, ':p'=>$proyectoExterno->id)); 
	if(count($actividadesExternas) > 0) { ?>
	<h3><?php echo $proyectoExterno->nombre; ?></h3>
	<table class="table table-bordered table-striped table-hover">
		<tr class="head">
			<th>No.</th>
			<th>Encargado</th>
			<th>Nombre</th>
			<th>Peso</th>
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		<?php foreach($actividadesExternas as $actividadExterna){ $c++;?>
			<tr>
				<td><?php echo $c; ?></td>
				<td><?php echo $actividadExterna->proyecto->responsable->nombre; ?></td>				
				<td><?php echo $actividadExterna->nombre; ?></td>
				<td><?php echo $actividadExterna->peso; ?></td>
				<td class="text-center <?php echo ($actividadExterna->estatus_did == 3) ? 'danger' : 'warning'?>">
					<?php echo ($actividadExterna->estatus_did == 1) ? 
									'<span class="label label-warning">' . $actividadExterna->estatus->tipo. '</span>' :
									'<span class="label label-danger">' . $actividadExterna->estatus->tipo . '</span>'; ?></td>
				<td class="text-center">
        	<?php echo CHtml::link('<i class="fa fa-eye"></i>',array('detalleProyecto/view','id'=>$actividadExterna->id, 'accion'=>'otros'),array('class'=>'btn btn-info btn-sm')); ?>
					<?php echo CHtml::link('<i class="fa fa-check"></i>',array('detalleProyecto/cambiar','id'=>$actividadExterna->id,'estatus'=>2, 'accion'=>'otros'),array('class'=>'btn btn-primary btn-sm')); ?>
        </td>	
			</tr>			
		<?php }
		} ?>
	</table>
<?php } ?>