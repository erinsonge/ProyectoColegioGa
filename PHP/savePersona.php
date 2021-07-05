<?php
	include('conexion.php');
	$dni=$_POST['txtdni'];
	$Nombre=$_POST['txtnombre'];
	$apPaterno=$_POST['txtApellPat'];
    $apMaterno=$_POST['txtApellMat'];
	$FechaNac=$_POST['txtFechaNac'];
	$Telefono=$_POST['txtTelefono'];
    $Correo=$_POST['txtEmail'];
    $Direccion=$_POST['txtDireccion'];
	$sql="call sp_insertarAlumno('$dni','$Nombre','$apPaterno','$apMaterno','$FechaNac','$Telefono','$Correo','$Direccion')";
    $sql2="INSERT into alumno(id_alumno,id_persona,id_apoderado,estadoAlum) values(null,(select MAX(id_persona) from persona),1,'a');";
    if ($con->query($sql)) {
        echo "guardado";
    }
    if ($con->query($sql2)) {
        echo "guardado 2";
    }
    
    
	$con->close();
	
	header("Location: ../index.html");
?>