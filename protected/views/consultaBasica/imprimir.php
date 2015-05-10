<div class="row">
	<div class="span12">
		<table style="text-align:center;">
			<tr>
				<td class="span3" style="text-align:right;">
					<img src="<?php echo Yii::app()->baseUrl;?>/images/uaslogo.jpg" alt="logoUas" width="150" height="150">
				</td>
				<td class="span8">
					<h3>HOSPITAL ÁNGELES CULIACÁN</h3>
					<address class="muted">
					  Blvd. Alfonso G. Calderón No.2193 Poniente<br>
					  Cons. 502 A<br>
					  Desarrollo Urbano Tres Ríos<br>
					  Culiacán, Sinaloa<br/><br/><br/>
					  <h3 style="text-align:center;"><?php echo $model->usuario->nombre; ?></h3>
					</address>
				</td>
			</tr>
		</table>
	</div>	
</div>
<div class="row">
	<div class="span12">
		<table class="table table-condensed table-bordered">			
			<tbody>
				<tr>
					<td ><strong>Paciente</strong></td>
					<td class="span3"><strong>Peso.</strong></td>
					<td class="span3"><?php echo $model->paciente->peso; ?></td>
				</tr>
				<tr>
					<td><?php echo $model->paciente->nombre . " " . $model->paciente->apellidos; ?></td>
					<td><strong>Fecha Nac</strong></td>
					<td><?php echo date("d-m-Y", strtotime($model->paciente->fechaNac_f)); ?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table-condensed table-bordered">
			<tbody>
				<tr>
					<td ><strong>Tratamiento</strong></td>					
				</tr>
				<tr>
					<td><?php echo $model->tratamiento; ?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table-condensed table-bordered">
			<tbody>
				<tr>
					<td ><strong>Notas</strong></td>					
				</tr>
				<tr>
					<td><?php echo $model->notas; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>