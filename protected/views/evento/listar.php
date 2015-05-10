<?php
$this->pageCaption='Citas';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar citas';
$this->breadcrumbs=array(
	'Citas',
);

$this->menu=array(
	array('label'=>'Ver el Calendario','url'=>array('index')),
);
$c = 0;
?>

<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Las citas se utilizar para mejorar la agenda del Médico
    </div>
  </div>
</div><!-- /.row -->
<div class="row" style="padding-top:50px;">          
  <div class="col-lg-12">
    <table class="display table table-bordered table-hover table-striped">
      <thead>
        <tr>
	        <th>Cita</th>
        	<th>Paciente</th>
          <th>Descripción</th>
          <th class="col-lg-2">Fecha</th>
          <th class="col-lg-2">Estatus</th>            
          <th class="col-lg-3 col-md-3">Acciones</th>
        </tr>
      </thead>
      <tbody>
      	<?php foreach($eventos as $evento){ $c++; ?>
        	<tr>
	        	<td><?php echo date("H:i A", strtotime($evento->fechaInicio_ft)); ?></td>
        		<td><?php echo $evento->paciente->nombre . " " . $evento->paciente->apellidos; ?></td>
            <td><?php echo $evento->descripcion; ?></td>
            <td><?php echo date("d-m-Y H:i A", strtotime($evento->fechaInicio_ft)); ?></td>
            <td class="text-center"><?php echo ($evento->estatus_did == 2) ? '<span class="label label-success">' . $evento->estatus->tipo. '</span>' :
            							'<span class="label label-warning">' . $evento->estatus->tipo . '</span>'; ?></td>
            <td>
            	<?php echo CHtml::link('Ver',array('evento/view','id'=>$evento->id),array('class'=>'btn btn-info btn-sm')); ?>
	            <?php echo CHtml::link('Editar',array('evento/actualizar','id'=>$evento->id),array('class'=>'btn btn-success btn-sm')); ?>
							<?php echo ($evento->estatus_did == 1) ? 
													CHtml::link('Pasar',array('evento/cambiar','id'=>$evento->id,'estatus'=>2),array('class'=>'btn btn-primary btn-sm')) : 
													CHtml::link('No Pasar',array('evento/cambiar','id'=>$evento->id,'estatus'=>1),array('class'=>'btn btn-warning btn-sm')); ?>
							<?php echo CHtml::link('Cancelar',array('evento/cambiar','id'=>$evento->id, 'estatus'=>3),array('class'=>'btn btn-danger btn-sm')); ?>
            </td>
          </tr>
      	<?php } ?>
       </tbody>
    </table>
  </div>
</div>