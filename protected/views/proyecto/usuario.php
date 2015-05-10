<?php
$this->pageCaption='Proyecto';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar proyecto';
$this->breadcrumbs=array(
	'Proyecto',
);

$this->menu=array(
	array('label'=>'Volver','url'=>array('proyecto/index')),
	array('label'=>'Crear Proyecto','url'=>array('create')),
);

$c = 0;
foreach($proyectos as $proyecto){ 
	$actividadesPendientes = DetalleProyecto::model()->findAll("estatus_did = 1 && proyecto_did = " . $proyecto->id);
	$actividadesRealizadas = DetalleProyecto::model()->findAll("estatus_did = 2 && proyecto_did = " . $proyecto->id);
	$actividadesTotales = DetalleProyecto::model()->findAll("proyecto_did = " . $proyecto->id);
	if (time() < strtotime($proyecto->fechaFin_ft) && time() > strtotime($proyecto->fechaInicio_ft)){
    $actual = new DateTime("now");
		$inicio = new DateTime($proyecto->fechaInicio_ft);
		$fin = new DateTime($proyecto->fechaFin_ft);
		$tiempoProduccion = date_diff($inicio, $fin);
		$actual = date_diff($inicio, $actual);
		$avance = ($actual->format('%a') / $tiempoProduccion->format('%a'))*100;
	} else if(time() < strtotime($proyecto->fechaInicio_ft)){
		$avance = 0;
	} else if(time() > strtotime($proyecto->fechaFin_ft)){
		$avance = 100;
	}			
?>
	<div class="jarviswidget" id="wid-id-<?php echo $c; ?>" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false" role="widget" style="">
		<!-- widget options:
		usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
	
		data-widget-colorbutton="false"
		data-widget-editbutton="false"
		data-widget-togglebutton="false"
		data-widget-deletebutton="false"
		data-widget-fullscreenbutton="false"
		data-widget-custombutton="false"
		data-widget-collapsed="true"
		data-widget-sortable="false"
	
		-->
		<header role="heading">
			<div class="widget-toolbar" role="menu">				
				<div class="progress progress-striped active" rel="tooltip" data-original-title="<?php echo number_format($avance,0);?>%" data-placement="bottom">
					<div class="progress-bar progress-bar-warning" role="progressbar" style="width: <?php echo number_format($avance,0);?>%"><?php echo number_format($avance,0);?> %</div>
				</div>
			</div>
			<div class="jarviswidget-ctrls" role="menu">  
				<?php 
					echo CHtml::link('<i class="fa fa-folder-open-o"></i>',array('proyecto/view','id'=>$proyecto->id),array('class'=>'button-icon jarviswidget-edit-btn'));
					echo CHtml::link('<i class="fa fa-pencil"></i>',array('proyecto/update','id'=>$proyecto->id),array('class'=>'button-icon jarviswidget-edit-btn'));
					echo CHtml::link('<i class="fa fa-plus"></i>',array('detalleproyecto/create','id'=>$proyecto->id),array('class'=>'button-icon jarviswidget-edit-btn'));
					echo ($proyecto->estatus_did == 1) ? 
							CHtml::link('<i class="fa fa-eye-slash"></i>',array('proyecto/cambiar','id'=>$proyecto->id,'estatus'=>2),array('class'=>'button-icon jarviswidget-edit-btn')) : 
							CHtml::link('<i class="fa fa-eye"></i>',array('proyecto/cambiar','id'=>$proyecto->id,'estatus'=>1),array('class'=>'button-icon jarviswidget-edit-btn')); 
				?>				
			</div>
			<h2>
				<strong><?php echo CHtml::link($proyecto->nombre,array('proyecto/view','id' => $proyecto->id)) . " - " . 
													CHtml::link($proyecto->responsable->nombre,array('proyecto/usuario','usuario' => $proyecto->responsable_did));?></strong>			</h2>
			<div class="widget-toolbar" role="menu"> 
				<div class="label label-success">
					<i class="fa fa-calendar"></i> <?php echo "Fin: " . date("d-m-Y", strtotime($proyecto->fechaFin_ft)); ?>
				</div>
			</div>
			<div class="widget-toolbar" role="menu"> 
				<div class="label label-success">
					<i class="fa fa-calendar"></i> <?php echo "Inicio: " . date("d-m-Y", strtotime($proyecto->fechaInicio_ft)); ?>
				</div>
			</div>
		</header>
		
		<div role="content">
			<div class="widget-body">
				
				<div class="">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab<?php echo $proyecto->id; ?>1" data-toggle="tab">Hechas <span class="badge bg-color-greenDark txt-color-white"><?php echo count($actividadesRealizadas); ?></span></a>
						</li>
						<li>
							<a href="#tab<?php echo $proyecto->id; ?>2" data-toggle="tab">Pendientes <span class="badge bg-color-blueDark txt-color-white"><?php echo count($actividadesPendientes); ?></span></a>
						</li>
						<li>
							<a href="#tab<?php echo $proyecto->id; ?>3" data-toggle="tab">Ambas <span class="badge bg-color-blue txt-color-white"><?php echo count($actividadesTotales); ?></span></a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab<?php echo $proyecto->id; ?>1">
							<table class="table table-striped table-bordered">
								<thead class="thead">
									<tr>
										<th class="col-lg-1">No.</th>
										<th >Nombre</th>
										<th class="col-lg-1">Peso</th>
										<th class="col-lg-1">Estatus</th>
										<th class="col-lg-3">Acciones</th>
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
					          	<?php echo CHtml::link('Ver',array('detalleproyecto/view','id'=>$ar->id),array('class'=>'btn btn-info btn-sm')); ?>
					            <?php echo CHtml::link('Editar',array('detalleproyecto/update','id'=>$ar->id),array('class'=>'btn btn-success btn-sm')); ?>
											<?php echo ($ar->estatus_did == 1) ? 
																	CHtml::link('Ya la hice',array('detalleproyecto/cambiar','id'=>$ar->id,'estatus'=>2),array('class'=>'btn btn-primary btn-sm')) : 
																	CHtml::link('No la he hecho',array('detalleproyecto/cambiar','id'=>$ar->id,'estatus'=>1),array('class'=>'btn btn-danger btn-sm')); ?>						
					          </td>	
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="tab-pane" id="tab<?php echo $proyecto->id; ?>2">
							<table class="table table-striped table-bordered">
								<thead class="thead">
									<tr>
										<th class="col-lg-1">No.</th>
										<th>Nombre</th>
										<th class="col-lg-1">Peso</th>
										<th class="col-lg-1">Estatus</th>
										<th class="col-lg-3">Acciones</th>
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
					          	<?php echo CHtml::link('Ver',array('detalleproyecto/view','id'=>$ap->id),array('class'=>'btn btn-info btn-sm')); ?>
					            <?php echo CHtml::link('Editar',array('detalleproyecto/update','id'=>$ap->id),array('class'=>'btn btn-success btn-sm')); ?>
											<?php echo ($ap->estatus_did == 1) ? 
																	CHtml::link('Ya la hice',array('detalleproyecto/cambiar','id'=>$ap->id,'estatus'=>2),array('class'=>'btn btn-primary btn-sm')) : 
																	CHtml::link('No la he hecho',array('detalleproyecto/cambiar','id'=>$ap->id,'estatus'=>1),array('class'=>'btn btn-danger btn-sm')); ?>						
					          </td>	
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="tab-pane" id="tab<?php echo $proyecto->id; ?>3">
							<table class="table table-striped table-bordered">
								<thead class="thead">
									<tr>
										<th class="col-lg-1">No.</th>
										<th>Nombre</th>
										<th class="col-lg-1">Peso</th>
										<th class="col-lg-1">Estatus</th>
										<th class="col-lg-3">Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php $c=0; foreach($actividadesTotales as $at){ $c++; ?>
									<tr>
										<td><?php echo $c;?></td>
										<td><?php echo $at->nombre; ?></td>
										<td><?php echo $at->peso;?></td>	
										<td><?php echo ($at->estatus_did == 1) ? '<span class="label label-warning">' . $at->estatus->tipo. '</span>' :
						            							'<span class="label label-success">' . $at->estatus->tipo . '</span>'; ?></td>
										<td>
					          	<?php echo CHtml::link('Ver',array('detalleproyecto/view','id'=>$at->id),array('class'=>'btn btn-info btn-sm')); ?>
					            <?php echo CHtml::link('Editar',array('detalleproyecto/update','id'=>$at->id),array('class'=>'btn btn-success btn-sm')); ?>
											<?php echo ($at->estatus_did == 1) ? 
																	CHtml::link('Ya la hice',array('detalleproyecto/cambiar','id'=>$at->id,'estatus'=>2),array('class'=>'btn btn-primary btn-sm')) : 
																	CHtml::link('No la he hecho',array('detalleproyecto/cambiar','id'=>$at->id,'estatus'=>1),array('class'=>'btn btn-danger btn-sm')); ?>						
					          </td>	
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
	
			</div>
			<!-- end widget content -->
	
		</div>
		<!-- end widget div -->
	
	</div>
<?php } $c = 0; ?>