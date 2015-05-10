<?php
$this->pageCaption=$model->nombre . " " . $model->apellidos;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription=date("d-M-Y", strtotime($model->fechaNac_f));
$this->breadcrumbs=array(
	'Paciente'=>array('index'),
	$model->id,
);
if($usuarioActual->tipoUsuario->nombre == "Asistente"){
	$this->menu=array(
		array('label'=>'Listar Paciente','url'=>array('index')),
		array('label'=>'Crear Paciente','url'=>array('create')),
		array('label'=>'Actualizar Paciente','url'=>array('update','id'=>$model->id)),
	);
}else{
	$this->menu=array(
		array('label'=>'Listar Paciente','url'=>array('index')),
		array('label'=>'Crear Paciente','url'=>array('create')),
		array('label'=>'Actualizar Paciente','url'=>array('update','id'=>$model->id)),
		array('label'=>'Nueva Consulta','url'=>array('consultaBasica/create')),
	);
}

$c = 0;
?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Datos del Paciente <span class="pull-right "><?php echo $model->correo . "|" . $model->grupoSanguineo . "|" . $model->celular; ?></span>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <?php $this->widget('zii.widgets.CDetailView', array(
						'data'=>$model,
						'baseScriptUrl'=>false,
						'cssFile'=>false,
						'htmlOptions'=>array('class'=>'table table-bordered table-striped table-hover'),
						'attributes'=>array(
							'id',
							'foto',
							array("name"=>"nombre",
										"value"=>$model->nombre . " " . $model->apellidos
										),
							'fechaNac_f',
							'sexo',
							'telefono',
							'celular',
							'correo',
							'direccion',
							'peso',
							'alergico',
							'emergencia',
							'grupoSanguineo',
							array(	'name'=>'estatus_did',
								        'value'=>$model->estatus->nombre,),
							array(	'name'=>'usuario_did',
								        'value'=>$model->usuario->nombre,),
							'fechaCreacion_ft',
							'observaciones',
						),
					)); ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Consultas Básicas <span class="pull-right label label-success"><?php echo count($consultasBasicas); ?></span>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <table class="table table-striped table-bordered display" style="margin-top:50px;">
					<thead class="thead">
						<tr>
							<td>No.</td>
							<td>Fecha</td>
							<td>Síntomas</td>
							<td>Diagnóstico</td>
							<td>Tratamiento</td>
							<td>Acciones</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($consultasBasicas as $consultaBasica){ $c++; ?>
						<tr>
							<td><?php echo $c;?></td>	
							<td><?php echo $consultaBasica->fecha_f;?></td>			
							<td><?php echo $consultaBasica->sintomas;?></td>			
							<td><?php echo $consultaBasica->diagnostico;?></td>
							<td><?php echo $consultaBasica->tratamiento;?></td>						
							<td><?php echo CHtml::link("Ver", array("consultaBasica/view","id"=>$consultaBasica->id), array("class"=>"btn btn-primary btn-xs"));?>
							<?php echo CHtml::link("Imprimir", array("consultaBasica/imprimir","id"=>$consultaBasica->id), array("class"=>"btn btn-primary btn-xs"));?></td>						
						</tr>
						<?php } ?>
					</tbody>
				</table>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Consultas Especialista <span class="pull-right label label-success"><?php echo count($consultas); ?></span>
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <table class="table table-striped table-bordered display" style="margin-top:50px;">
					<thead class="thead">
						<tr>
							<td>No.</td>
							<td>Fecha</td>
							<td>Síntomas</td>
							<td>Diagnóstico</td>
							<td>Tratamiento</td>
							<td>Acciones</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($consultas as $consulta){ $c++; ?>
						<tr>
							<td><?php echo $c;?></td>	
							<td><?php echo $consulta->fecha_f;?></td>			
							<td><?php echo $consulta->sintomas;?></td>			
							<td><?php echo $consulta->diagnostico;?></td>
							<td><?php echo $consulta->tratamiento;?></td>	
							<?php $irA = $usuarioActual->tipoUsuario->nombre; ?>						
							<td><?php echo CHtml::link("Ver", array("consulta" . $irA . "/view","id"=>$consulta->id), array("class"=>"btn btn-primary btn-xs"));?></td>						
						</tr>
						<?php } ?>
					</tbody>
				</table>
      </div>
    </div>
  </div>
</div>


