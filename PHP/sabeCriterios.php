
<?php
	include('conexion.php');
	
	$Nombre=$_POST['txtnombre'];
    $Estado=$_POST['txtEstado'];
    $sql="INSERT INTO criterio(descripcion,estado)VALUES('$Nombre','$Estado')";
    if ($con->query($sql)) {
        echo "guardado";
    }
    
    
	$con->close();
	
	header("Location: ../html/RegCriterio.php");
?>