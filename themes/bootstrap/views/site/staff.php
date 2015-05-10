	<div class="row">
    <div class="col-lg-3">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6">
              <i class="fa fa-comments fa-5x"></i>
            </div>
            <div class="col-xs-6 text-right">
              <h1 style="font-size:40pt;"><strong><?php echo Proyecto::model()->count("responsable_did = " . $usuarioActual->id);?></strong></h1>
              <p class="announcement-text">Proyectos Totales!</p>
            </div>
          </div>
        </div>
        <a href="<?php array("foro/index") ?>">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
                Ver...
              </div>
              <div class="col-xs-6 text-right">
                <i class="fa fa-arrow-circle-right"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6">
              <i class="fa fa-check fa-5x"></i>
            </div>
            <div class="col-xs-6 text-right">
              <h1 style="font-size:40pt;"><strong><?php echo Proyecto::model()->count("estatus_did = 2 && responsable_did = " . $usuarioActual->id);?></strong></h1>
              <p class="announcement-text">Proyectos Terminados!</p>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
                Ver...
              </div>
              <div class="col-xs-6 text-right">
                <i class="fa fa-arrow-circle-right"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6">
              <i class="fa fa-tasks fa-5x"></i>
            </div>
            <div class="col-xs-6 text-right">
              <h1 style="font-size:40pt;"><strong><?php echo Proyecto::model()->count("estatus_did = 1 && responsable_did = " . $usuarioActual->id);?></strong></h1>
              <p class="announcement-text">Proyectos Trabajando!</p>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
                Ver...
              </div>
              <div class="col-xs-6 text-right">
                <i class="fa fa-arrow-circle-right"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="panel panel-success">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6">
              <i class="fa fa-comments fa-5x"></i>
            </div>
            <div class="col-xs-6 text-right">
              <h1 style="font-size:40pt;"><strong><?php echo Proyecto::model()->count("estatus_did = 3 && responsable_did = " . $usuarioActual->id);?></strong></h1>
              <p class="announcement-text">Proyectos Cancelados!</p>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
                Ver...
              </div>
              <div class="col-xs-6 text-right">
                <i class="fa fa-arrow-circle-right"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div><!-- /.row -->
	<!-- widget grid -->
	<section id="widget-grid" class="">
		<!-- row -->
		<div class="row">
			<article class="col-sm-12">
				<!-- new widget -->
				<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
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
					<header>
						<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
						<h2>Seguimiento </h2>

						<ul class="nav nav-tabs pull-right in" id="myTab">
							<li class="active">
								<a data-toggle="tab" href="#s1"><i class="fa fa-clock-o"></i> <span class="hidden-mobile hidden-tablet">Estadísticas</span></a>
							</li>										
						</ul>

					</header>

					<!-- widget div-->
					<div class="no-padding">
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">

							test
						</div>
						<!-- end widget edit box -->

						<div class="widget-body">
							<!-- content -->
							<div id="myTabContent" class="tab-content">
								<div class="tab-pane fade active in padding-10 no-padding-bottom" id="s1">
									<div class="row no-space">
										
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 show-stats">

											<div class="row">
												<?php foreach($proyectos as $proyecto) {
												
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
												}	?>
												<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> 
													<span class="text"><?php echo $proyecto->nombre;?> 
														<span class="pull-right">
															<i class="fa fa-calendar"></i> <?php echo "Inicio: " . date("d-m-Y", strtotime($proyecto->fechaInicio_ft)); ?> /
															<i class="fa fa-calendar"></i> <?php echo "Fin: " . date("d-m-Y", strtotime($proyecto->fechaFin_ft)); ?>
														</span> 
													</span>
													<div class="progress">
														<div class="progress-bar bg-color-blueDark" style="width: <?php echo $avance; ?>%;"></div>
													</div> 
												</div>
												<?php } ?>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
							
		<!-- end row -->

	</section>
	<!-- end widget grid -->
	
</div>
<!-- END MAIN CONTENT -->

</div>
<script>
$(document).ready(function() {

	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();

		});

</script>