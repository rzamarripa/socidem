<?php
$this->pageCaption='Usuario';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar usuario';
$this->breadcrumbs=array(
	'Usuario',
);

$this->menu=array(
	array('label'=>'Crear Usuario','url'=>array('create')),
);

$c = 0;
?>
<div class="row" style="padding-top:50px;">          
  <div class="col-lg-12">
		<table id="myTable" class="table table-striped table-bordered">
			<thead class="thead">
				<tr>
					<th class="col-lg-1">No.</th>
					<th class="col-lg-1">Nombre</th>
					<th>Usuario</th>
					<th class="col-lg-1">Tipo Usuario</th>
					<th class="col-lg-1">Estatus</th>
					<th class="col-lg-3">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($usuarios as $usuario){ $c++; ?>
				<tr>
					<td><?php echo $c;?></td>
					<td><?php echo $usuario->nombre; ?></td>
					<td><?php echo $usuario->usuario;?></td>
					<td><?php echo $usuario->tipoUsuario->nombre;?></td>	
					<td><?php echo ($usuario->estatus_did == 1) ? '<span class="label label-success">' . $usuario->estatus->nombre. '</span>' :
	            							'<span class="label label-danger">' . $usuario->estatus->nombre . '</span>'; ?></td>
					<td>
          	<?php echo CHtml::link('Ver',array('usuario/view','id'=>$usuario->id),array('class'=>'btn btn-info btn-sm')); ?>
            <?php echo CHtml::link('Editar',array('usuario/update','id'=>$usuario->id),array('class'=>'btn btn-success btn-sm')); ?>
						<?php echo ($usuario->estatus_did == 1) ? 
												CHtml::link('Desactivar',array('usuario/cambiar','id'=>$usuario->id,'estatus'=>2),array('class'=>'btn btn-danger btn-sm')) : 
												CHtml::link('Activar',array('usuario/cambiar','id'=>$usuario->id,'estatus'=>1),array('class'=>'btn btn-primary btn-sm')); ?>						
          </td>	
				</tr>
				<?php } ?>
			</tbody>
		</table>
  </div>
</div>