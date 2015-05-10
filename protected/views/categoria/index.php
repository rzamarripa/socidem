<?php
$this->pageCaption='Categoría';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar categoría';
$this->breadcrumbs=array(
	'Categoría',
);

$this->menu=array(
	array('label'=>'Crear Categoría','url'=>array('create')),
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
					<th>Descripción</th>
					<th class="col-lg-2">Estatus</th>
					<th class="col-lg-2">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($categorias as $categoria){ $c++; ?>
				<tr>
					<td><?php echo $c;?></td>
					<td><?php echo $categoria->nombre; ?></td>
					<td><?php echo $categoria->descripcion; ?></td>
					<td><?php echo ($categoria->estatus_did == 1) ? '<span class="label label-success">' . $categoria->estatus->tipo. '</span>' :
	            							'<span class="label label-danger">' . $categoria->estatus->tipo . '</span>'; ?></td>
					<td>
          	<?php echo CHtml::link('Ver',array('categoria/view','id'=>$categoria->id),array('class'=>'btn btn-info btn-sm')); ?>
            <?php echo CHtml::link('Editar',array('categoria/update','id'=>$categoria->id),array('class'=>'btn btn-success btn-sm')); ?>
						<?php echo ($categoria->estatus_did == 1) ? 
												CHtml::link('No publicar',array('categoria/cambiar','id'=>$categoria->id,'estatus'=>2),array('class'=>'btn btn-danger btn-sm')) : 
												CHtml::link('Publicar',array('categoria/cambiar','id'=>$categoria->id,'estatus'=>1),array('class'=>'btn btn-primary btn-sm')); ?>						
          </td>	
				</tr>
				<?php } ?>
			</tbody>
		</table>
  </div>
</div>