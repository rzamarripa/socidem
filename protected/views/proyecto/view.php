<?php
	$this->pageCaption='Proyecto: '.$model->nombre;
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='';
	$this->breadcrumbs=array(
		'Proyecto'=>array('index'),
		$model->id,
	);
	
	$this->menu=array(
		array('label'=>'Volver','url'=>array('proyecto/index')),
		array('label'=>'Agregar Actividad','url'=>array('detalleproyecto/create','id'=>$model->id)),
		array('label'=>'Agregar Documentos','url'=>array('proyecto/subir','id'=>$model->id)),
	);
	
	$c = 0;

	$actividadesPendientes = DetalleProyecto::model()->findAll("estatus_did = 1 && proyecto_did = " . $model->id);
	$actividadesRealizadas = DetalleProyecto::model()->findAll("estatus_did = 2 && proyecto_did = " . $model->id);
	$actividadesTotales = DetalleProyecto::model()->findAll("proyecto_did = " . $model->id);
	if (time() < strtotime($model->fechaFin_ft) && time() > strtotime($model->fechaInicio_ft)){
    $actual = new DateTime("now");
		$inicio = new DateTime($model->fechaInicio_ft);
		$fin = new DateTime($model->fechaFin_ft);
		$tiempoProduccion = date_diff($inicio, $fin);
		$actual = date_diff($inicio, $actual);
		$avance = ($actual->format('%a') / $tiempoProduccion->format('%a'))*100;
	} else if(time() < strtotime($model->fechaInicio_ft)){
		$avance = 0;
	} else if(time() > strtotime($model->fechaFin_ft)){
		$avance = 100;
	}			
?>
<div class="row">
  <div class="col-md-12">
    <h3><?php echo $model->descripcion; ?></h3>
  </div>
</div>
<hr>
<div class="row">
	<div class="col-sm-12 col-md-6 col-lg-6">
		<table class="table table-striped table-bordered display well">
			<caption>Actividades Pendientes</caption>
			<thead class="thead">
				<tr>
					<th class="col-lg-1">No.</th>
					<th>Nombre</th>
					<th class="col-lg-1">Peso</th>
					<th class="col-lg-1">Estatus</th>
					<th class="col-lg-2">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php $c=0; foreach($actividadesPendientes as $ap){ $c++; ?>
				<tr>
					<td><?php echo $c;?></td>
					<td><?php echo $ap->nombre; ?></td>
					<td><?php echo $ap->peso;?></td>	
					<td><?php echo ($ap->estatus_did == 1) ? '<span class="label label-warning">' . $ap->estatus->tipo. '</span>' :
	            							'<span class="label label-success">' . $ap->estatus->tipo . '</span>'; ?></td>
					<td>            
						<?php echo ($ap->estatus_did == 1) ? 
												CHtml::link('<i class="fa fa-check"></i>',array('detalleproyecto/cambiar','id'=>$ap->id,'estatus'=>2,'ver'=>'si'),array('class'=>'btn btn-primary btn-sm')):""; ?>
						<?php echo CHtml::link('<i class="fa fa-pencil"></i>',array('detalleproyecto/update','id'=>$ap->id),array('class'=>'btn btn-success btn-sm')); ?>
          </td>	
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<div  style="padding-top:50px;">
			<hr/>
		</div>
		<?php if(count($doctos)>0){ ?>		
		<table class="table table-bordered table-striped display well">
			<caption>Archivos Subidos</caption>
			<thead class="thead">
				<tr>
					<th class="text-center">Documento</th>
					<th class="col-lg-1">Estatus</th>
					<th class="col-lg-2">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($doctos as $docto){ ?>
				<tr>
					<td>
						<?php
							$arch = $file= Yii::app()->BaseUrl . DIRECTORY_SEPARATOR . 'images/uploads/tmp' . DIRECTORY_SEPARATOR . $docto->ruta; 																		
							echo CHtml::link('<i class="fa fa-file"></i> ' . $docto->ruta,$arch);
						?>
					</td>
					<td class="text-center">
						<span class="label label-<?php echo ($docto->estatus_did == 1) ? "success" : "warning"; ?>"><?php echo $docto->estatus->nombre;?></span>
					</td>
					<td class="text-center">
						<?php 
							echo CHtml::link('<i class="fa fa-eye"></i>',$arch,array('class'=>'btn btn-info btn-sm'));										
							echo CHtml::link('<i class="fa fa-trash-o"></i>',array('documento/delete','id'=>$docto->id),array('class'=>'btn btn-danger btn-sm')); ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>							   
		<?php	}	?>
	</div>
	<div class="col-sm-12 col-md-6 col-lg-6">
		<table class="table table-striped table-bordered display well">
			<caption>Actividades Realizadas</caption>
			<thead class="thead">
				<tr>
					<th class="col-lg-1">No.</th>
					<th >Nombre</th>
					<th class="col-lg-1">Peso</th>
					<th class="col-lg-1">Estatus</th>
					<th class="col-lg-2">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php $c=0; foreach($actividadesRealizadas as $ar){ $c++; ?>
				<tr>
					<td><?php echo $c;?></td>
					<td><?php echo $ar->nombre; ?></td>
					<td><?php echo $ar->peso;?></td>	
					<td><?php echo ($ar->estatus_did == 1) ? '<span class="label label-warning">' . $ar->estatus->tipo. '</span>' :
	            							'<span class="label label-success">' . $ar->estatus->tipo . '</span>'; ?></td>
					<td>            
						<?php echo ($ar->estatus_did == 1) ? 
												CHtml::link('<i class="fa fa-eye"></i>',array('detalleproyecto/cambiar','id'=>$ar->id,'estatus'=>2,'ver'=>'si'),array('class'=>'btn btn-primary btn-sm')) : 
												CHtml::link('<i class="glyphicon glyphicon-remove"></i>',array('detalleproyecto/cambiar','id'=>$ar->id,'estatus'=>1,'ver'=>'si'),array('class'=>'btn btn-danger btn-sm')); ?>
						<?php echo CHtml::link('<i class="fa fa-pencil"></i>',array('detalleproyecto/update','id'=>$ar->id,'ver'=>'si'),array('class'=>'btn btn-success btn-sm')); ?>
          </td>	
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>	
</div>