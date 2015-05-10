<?php

$proyectos = Proyecto::model()->findAll();
foreach($proyectos as $proyecto){
	echo $proyecto->nombre . " - " . $proyecto->responsable->nombre . "<br/>";
}

?>