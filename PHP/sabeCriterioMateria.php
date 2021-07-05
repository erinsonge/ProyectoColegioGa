<?php
	include('conexion.php');
	
	$idCri=$_POST['slCriterio'];
    $idMat=$_POST['slMateria'];
    $sql="INSERT INTO asignacioncriterios(estadoAsigCri,id_criterio,id_curso)VALUES('a','$idCri','$idMat');";
    echo $idMat,$idCri;
    if ($con->query($sql)) {
        echo "guardado";
    }
    
    
	$con->close();
	
	header("Location: ../html/RegMatCrit.php");
?>