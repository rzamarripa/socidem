<?php
$this->pageCaption='Paciente';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar paciente';
$this->breadcrumbs=array(
	'Paciente',
);

$this->menu=array(
	array('label'=>'Crear Paciente','url'=>array('create')),
);

$c = 0;
?>


<div class="row" style="padding-top:50px;">          
  <div class="col-lg-12">
    <table id="pacientes" class="table table-bordered table-hover table-striped display">
      <thead>
        <tr>
	        <th class="hidden-sm hidden-xs">No</th>
        	<th>Nombre</th>
          <th class="hidden-sm hidden-xs">Fecha Nac.</th>
          <th class="hidden-sm hidden-xs">Sexo</th>
          <th class="hidden-sm hidden-xs">Teléfono</th>
          <th>Médico</th>            
          <th class="hidden-sm hidden-xs">Estatus</th>            
          <th class="hidden-lg">Acciones</th>
          <th class="hidden-sm hidden-xs hidden-md">Acciones</th>
        </tr>
      </thead>
      <tbody>
      	<?php foreach($pacientes as $paciente){ $c++; ?>
        	<tr>
	        	<td class="hidden-sm hidden-xs text-center"><?php echo $c; ?></td>
        		<td><?php echo CHtml::link(CHtml::encode($paciente->nombre . " " . $paciente->apellidos), array('view', 'id'=>$paciente->id)); ?></td>
            <td class="hidden-sm hidden-xs"><?php echo ($paciente->fechaNac_f=="0000-00-00")? "" :CHtml::encode(date("d-m-Y", strtotime($paciente->fechaNac_f))) . " - " . $this->CalculaEdad($paciente->fechaNac_f) . " años"; ?></td>
            <td class="hidden-sm hidden-xs"><?php echo $paciente->sexo; ?></td>
            <td class="hidden-sm hidden-xs"><?php echo $paciente->telefono; ?></td>
            <td><?php echo $paciente->usuario->nombre; ?></td>
            <td class="text-center hidden-sm hidden-xs"><?php echo ($paciente->estatus_did == 2) ? '<span class="label label-danger">' . $paciente->estatus->nombre. '</span>' :
            							'<span class="label label-success">' . $paciente->estatus->nombre . '</span>'; ?></td>
            <td class="hidden-sm hidden-xs hidden-md">
            	<?php echo CHtml::link('Ver',array('paciente/view','id'=>$paciente->id),array('class'=>'btn btn-info btn-sm')); ?>
	            <?php echo CHtml::link('Editar',array('paciente/update','id'=>$paciente->id),array('class'=>'btn btn-success btn-sm')); ?>
							<?php echo ($paciente->estatus_did == 1) ? 
													CHtml::link('Desactivar',array('paciente/cambiar','id'=>$paciente->id,'estatus'=>2),array('class'=>'btn btn-danger btn-sm')) : 
													CHtml::link('Activar',array('paciente/cambiar','id'=>$paciente->id,'estatus'=>1),array('class'=>'btn btn-primary btn-sm')); ?>
            </td>            
            <td class="hidden-lg">
	            <div class="btn-group">
							  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							    Acciones <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
							    <li><?php echo CHtml::link('Ver',array('paciente/view','id'=>$paciente->id),array('class'=>'btn btn-info btn-sm')); ?></li>
							    <li><?php echo CHtml::link('Editar',array('paciente/update','id'=>$paciente->id),array('class'=>'btn btn-success btn-sm')); ?></li>
							    <li><?php echo ($paciente->estatus_did == 1) ? 
													CHtml::link('Desactivar',array('paciente/cambiar','id'=>$paciente->id,'estatus'=>2),array('class'=>'btn btn-danger btn-sm')) : 
													CHtml::link('Activar',array('paciente/cambiar','id'=>$paciente->id,'estatus'=>1),array('class'=>'btn btn-primary btn-sm')); ?></li>
							  </ul>
							</div>
            </td>
          </tr>
      	<?php } ?>
       </tbody>
    </table>
  </div>
</div>