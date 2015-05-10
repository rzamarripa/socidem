<?php
$this->pageCaption='Proyecto';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar proyecto';
$this->breadcrumbs=array(
	'Proyecto',
);

$this->menu=array(
	array('label'=>'Volver','url'=>array('site/index')),
	array('label'=>'Crear Proyecto','url'=>array('create')), 
);


$c = 0;
$categoriaTmp = 0;
foreach($proyectos as $proyecto){ 
	$c++;
	$actividadesPendientes = DetalleProyecto::model()->findAll("estatus_did = 3 && proyecto_did = :p || estatus_did = 1 && proyecto_did = :p", array(":p"=>$proyecto->id));
	$actividadesRealizadas = DetalleProyecto::model()->findAll("estatus_did = 2 && proyecto_did = :p", array(":p"=>$proyecto->id));
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
				<h1>
					<?php 
						if($categoriaTmp != $proyecto->categoria_did)
							echo "<strong>" . $proyecto->categoria->nombre . "</strong>"; 
						$categoriaTmp = $proyecto->categoria_did; 
					?>
				</h1>
				<div class="jarviswidget" id="wid-id-<?php echo $c; ?>" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false" role="widget" style="">
					<header role="heading">
						<div class="widget-toolbar" role="menu">				
							<div class="progress progress-striped active" rel="tooltip" data-original-title="<?php echo number_format($avance,0);?>%" data-placement="bottom">
								<div class="progress-bar progress-bar-warning" role="progressbar" style="width: <?php echo number_format($avance,0);?>%"><?php echo number_format($avance,0);?> %</div>
							</div>
						</div>
						<div class="jarviswidget-ctrls" role="menu">  
							<?php 
								echo CHtml::link('<i class="fa fa-folder-open text-info"></i>',array('proyecto/view','id'=>$proyecto->id),array('class'=>'button-icon jarviswidget-edit-btn'));
								echo CHtml::link('<i class="fa fa-pencil text-warning"></i>',array('proyecto/update','id'=>$proyecto->id),array('class'=>'button-icon jarviswidget-edit-btn'));
								echo CHtml::link('<i class="fa fa-plus text-primary"></i>',array('detalleProyecto/create','id'=>$proyecto->id),array('class'=>'button-icon jarviswidget-edit-btn'));
								echo CHtml::link('<i class="fa fa-user text-primary"></i>',array('detalleProyecto/create','id'=>$proyecto->id, 'ayuda'=>true),array('class'=>'button-icon jarviswidget-edit-btn'));
								echo ($proyecto->estatus_did == 1) ? "" : 
										CHtml::link('<i class="fa fa-check text-info"></i>',array('proyecto/cambiar','id'=>$proyecto->id,'estatus'=>1),array('class'=>'button-icon jarviswidget-edit-btn')); 
							?>				
						</div>
						<h2>
							<strong><?php echo  CHtml::link($proyecto->nombre,array('proyecto/view','id' => $proyecto->id)) . " - " . 
																	CHtml::link($proyecto->responsable->nombre,array('proyecto/usuario','usuario' => $proyecto->responsable_did)) . " - " . 
																	$proyecto->estatus->tipo; ?></strong>
						</h2>
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
										<a id="tab<?php echo $proyecto->id; ?>tab2" href="#tab<?php echo $proyecto->id; ?>2" data-toggle="tab">Pendientes 
											<span class="badge bg-color-blueDark txt-color-white"><?php echo count($actividadesPendientes); ?></span></a>
									</li>
									<li>
										<a id="tab<?php echo $proyecto->id; ?>tab1" href="#tab<?php echo $proyecto->id; ?>1" data-toggle="tab">Hechas 
											<span class="badge bg-color-greenDark txt-color-white"><?php echo count($actividadesRealizadas); ?></span></a>
									</li>
									<li>
										<a id="tab<?php echo $proyecto->id; ?>tab3" href="#tab<?php echo $proyecto->id; ?>3" data-toggle="tab">Ambas 
											<span class="badge bg-color-blue txt-color-white"><?php echo count($actividadesTotales); ?></span></a>
									</li>
								</ul>
								<div class="tab-content" style="padding-top:50px;">									
									<div class="tab-pane active" id="tab<?php echo $proyecto->id; ?>2">
										<table class="table table-striped table-bordered display">
											<thead class="thead">
												<tr>
													<th class="col-lg-1 text-center">No.</th>
													<th class="col-lg-1">Responsable</th>
													<th class="col-lg-6">Nombre</th>
													<th class="col-lg-1 text-center">Peso</th>
													<th class="col-lg-1 text-center">Estatus</th>
													<th class="col-lg-2 text-center">Acciones</th>
												</tr>
											</thead>
											<tbody>
												<?php $e=0; foreach($actividadesPendientes as $ap){ $e++; ?>
												<tr>
													<td class="text-center"><?php echo $e;?> - <?php echo CHtml::link('<i class="fa fa-comment"></i>',array('comentario/create','idActividad'=>$ap->id),array('class'=>'btn btn-success btn-sm')); ?>						</td>
													<td><?php echo $ap->responsable->nombre; ?></td>
													<td><?php echo $ap->nombre; ?></td>
													<td class="text-center"><?php echo $ap->peso;?></td>	
													<td class="text-center <?php echo ($ap->estatus_did == 3) ? 'danger' : 'warning'?>"><?php echo ($ap->estatus_did == 1) ? '<span class="label label-warning">' . $ap->estatus->tipo. '</span>' :
									            							'<span class="label label-danger">' . $ap->estatus->tipo . '</span>'; ?></td>
													<td class="text-center">
								          	<?php echo CHtml::link('<i class="fa fa-eye"></i>',array('detalleProyecto/view','id'=>$ap->id),array('class'=>'btn btn-info btn-sm')); ?>
								            <?php echo CHtml::link('<i class="fa fa-pencil"></i>',array('detalleProyecto/update','id'=>$ap->id),array('class'=>'btn btn-success btn-sm')); ?>
														<?php echo CHtml::link('<i class="fa fa-check"></i>',array('detalleProyecto/cambiar','id'=>$ap->id,'estatus'=>2),array('class'=>'btn btn-primary btn-sm')); ?>
														<?php echo CHtml::link('<i class="fa fa-exclamation"></i>',array('detalleProyecto/cambiar','id'=>$ap->id,'estatus'=>3),array('class'=>'btn btn-danger btn-sm')); ?>						
								          </td>	
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
									<div class="tab-pane" id="tab<?php echo $proyecto->id; ?>1">
										<table class="table table-striped table-bordered display">
											<thead class="thead">
												<tr>
													<th class="col-lg-1 text-center">No.</th>
													<th class="col-lg-1">Responsable</th>
													<th class="col-lg-6">Nombre</th>
													<th class="col-lg-1 text-center">Peso</th>
													<th class="col-lg-1 text-center">Estatus</th>
													<th class="col-lg-3 text-center">Acciones</th>
												</tr>
											</thead>
											<tbody>
												<?php $d=0; foreach($actividadesRealizadas as $ar){ $d++; ?>
												<tr>
													<td class="text-center"><?php echo $d;?></td>
													<td><?php echo $ar->responsable->nombre; ?></td>
													<td><?php echo $ar->nombre; ?></td>
													<td class="text-center"><?php echo $ar->peso;?></td>	
													<td class="text-center"><?php echo ($ar->estatus_did == 1) ? '<span class="label label-warning">' . $ar->estatus->tipo. '</span>' :
									            							'<span class="label label-success">' . $ar->estatus->tipo . '</span>'; ?></td>
													<td class="text-center">
								          	<?php echo CHtml::link('<i class="fa fa-eye"></i>',array('detalleProyecto/view','id'=>$ar->id),array('class'=>'btn btn-info btn-sm')); ?>
								            <?php echo CHtml::link('<i class="fa fa-pencil"></i>',array('detalleProyecto/update','id'=>$ar->id),array('class'=>'btn btn-success btn-sm')); ?>
														<?php echo CHtml::link('<i class="glyphicon glyphicon-remove"></i>',array('detalleProyecto/cambiar','id'=>$ar->id,'estatus'=>1),array('class'=>'btn btn-danger btn-sm')); ?>						
								          </td>	
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
									<div class="tab-pane" id="tab<?php echo $proyecto->id; ?>3">
										<table class="table table-striped table-bordered display">
											<thead class="thead">
												<tr>
													<th class="col-lg-1 text-center">No.</th>
													<th class="col-lg-1">Responsable</th>
													<th class="col-lg-6">Nombre</th>
													<th class="col-lg-1 text-center">Peso</th>
													<th class="col-lg-1 text-center">Estatus</th>
													<th class="col-lg-3 text-center">Acciones</th>
												</tr>
											</thead>
											<tbody>
												<?php $f=0; foreach($actividadesTotales as $at){ $f++; ?>
												<tr>
													<td class="text-center"><?php echo $f;?></td>
													<td><?php echo $at->responsable->nombre; ?></td>
													<td><?php echo $at->nombre; ?></td>
													<td class="text-center"><?php echo $at->peso;?></td>	
													<td class="text-center"><?php echo ($at->estatus_did == 1) ? '<span class="label label-warning">' . $at->estatus->tipo. '</span>' :
									            							'<span class="label label-success">' . $at->estatus->tipo . '</span>'; ?></td>
													<td class="text-center">
								          	<?php echo CHtml::link('<i class="fa fa-eye"></i>',array('detalleProyecto/view','id'=>$at->id),array('class'=>'btn btn-info btn-sm')); ?>
								            <?php echo CHtml::link('<i class="fa fa-pencil"></i>',array('detalleProyecto/update','id'=>$at->id),array('class'=>'btn btn-success btn-sm')); ?>
														<?php echo ($at->estatus_did == 1) ? 
																				CHtml::link('<i class="fa fa-check"></i>',array('detalleProyecto/cambiar','id'=>$at->id,'estatus'=>2),array('class'=>'btn btn-primary btn-sm')) : 
																				CHtml::link('<i class="glyphicon glyphicon-remove"></i>',array('detalleProyecto/cambiar','id'=>$at->id,'estatus'=>1),array('class'=>'btn btn-danger btn-sm')); ?>						
								          </td>	
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	<?php } $c = 0; $d = 0; $e = 0; $f = 0; ?>
<script>
	$(document).ready(function() {
	  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	    localStorage.setItem('lastTab', $(e.target).attr('id'));
	  });
		
	  var lastTab = localStorage.getItem('lastTab');
	  if (lastTab) {
	      $('#'+lastTab).tab('show');
	  }	
	  
	  $('.collapsed').on('shown.bs.collapse', function (e) {
		  console.log("hola");
		});
	});
</script>