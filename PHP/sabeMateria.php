<?php
	include('conexion.php');
	
	$Nombre=$_POST['txtnombre'];
    $sql="INSERT INTO materia(DescripcionMat)VALUES('$Nombre')";
    if ($con->query($sql)) {
        echo "guardado";
    }
    
    
	$con->close();
	
	header("Location: ../html/RegMateria.php");
?>