<?php
include('../PHP/conexion.php');
$Asigacion = "SELECT DescripcionMat, descripcion from asignacioncriterios ag inner join criterio c on c.id_criterio=ag.id_criterio inner join materia ma on ag.id_curso=ma.id_curso;";
$Criterio="select * from criterio;";
$Materia="select * from materia;";

$resAsig = $con->query($Asigacion);
$resCrit = $con->query($Criterio);
$resMat = $con->query($Materia);
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
<div class="container">
        <div class="row justify-content-md-center">
        
            <form method="POST" action="../PHP/sabeCriterioMateria.php" enctype="multipart/form-data">
            <center><h2 class="centrar">TABLA DE de Asignacion</h2></center>
            <div class="form-group">
                    <label>Materia: </label><br>
                    <select name="slMateria" id="" class="form-control">
                        <option>Selecione Materia...</option>
                        <?php
                        if ($resMat->num_rows > 0) {
                            while ($fila = $resMat->fetch_assoc()) {
                                echo "<option value='" . $fila["id_curso"] . "'>" . $fila["DescripcionMat"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Criterio: </label><br>
                    <select name="slCriterio" id="" class="form-control">
                        <option>Selecione Criterio...</option>
                        <?php
                        if ($resCrit->num_rows > 0) {
                            while ($fila = $resCrit->fetch_assoc()) {
                                echo "<option value='" . $fila["id_criterio"] . "'>" . $fila["descripcion"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            <div class="form-group">
                    <input type="submit" name="btnSave" value="Nuevo" class="btn btn-outline-success" />
                    <input type="reset" value="Borrar" class="btn btn-outline-danger">
                    <a href="RegistrarCurso.html" btn class="btn btn-outline-alert">Regresar</a>
                </div>
            </form>

    <div class="container-fluid">
       
        

        <table class="table table-striped table-hover">
            <tr class="table-primary">
                <th>N.°</th>
                <th>Materia</th>
                <th>Criterio</th>
            </tr>
            <?php
            if ($resAsig->num_rows > 0) {
                $i = 0;
                while ($fila = $resAsig->fetch_assoc()) {
                    $i++;
                    echo "<tr class='table-secondary'>";
                    echo "<td>$i</td>";
                    echo "<td>" . $fila["DescripcionMat"] . "</td>";
                    echo "<td>" . $fila["descripcion"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9' class='centrar'>NO EXISTEN DATOS</td></tr>";
            }

            $con->close();
            ?>
        </table>
    </div>
    
</div>
</div>
</body>

</html>