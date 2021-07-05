<?php
include('../PHP/conexion.php');
$query1 = "select * from criterio;";
$resultado = $con->query($query1);
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container-fluid">
        <h2 class="centrar">TABLA</h2>
        <div class="container">
        <div class="row justify-content-md-center">
            <form method="POST" action="../PHP/sabeCriterios.php" enctype="multipart/form-data">
            <div class="form-group">
                    <label>NOMBRE: </label><br>
                    <input type="text" name="txtnombre" id="" class="form-control">
            </div>
            <div class="form-group">
                    <label>Estado: </label><br>
                    <input type="text" name="txtEstado" id="" class="form-control">
            </div>
            <div class="form-group">
                    <input type="submit" name="btnSave" value="Nuevo" class="btn btn-outline-success" />
                    <input type="reset" value="Borrar" class="btn btn-outline-danger">
                    <a href="RegistrarCurso.html" btn class="btn btn-outline-alert">Regresar</a>
                </div>
            </form>
        
        <table class="table table-striped table-hover">
            <tr class="table-primary">
                <th>N.°</th>
                <th>Nombre</th>
                <th>Estado</th>
            </tr>
            <?php
            if ($resultado->num_rows > 0) {
                $i = 0;
                while ($fila = $resultado->fetch_assoc()) {
                    $i++;
                    echo "<tr class='table-secondary'>";
                    echo "<td>$i</td>";
                    echo "<td>" . $fila["descripcion"] . "</td>";
                    echo "<td>" . $fila["estado"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='centrar'>NO EXISTEN DATOS</td></tr>";
            }

            $con->close();
            ?>
        </table>
        </div>
    </div>
    </div>
</body>

</html>