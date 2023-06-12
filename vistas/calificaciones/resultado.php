<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require '../../modelos/Venta.php';
require '../../modelos/Calificaciones.php';
require '../../modelos/Alumnos.php';
    try {
        $id = $_GET['res_id'];
        $calificacion = new Calificacion();

        $resultado = $calificacion->resultado($id);

 
        $subresultado = 0;
        $nota = 0;
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>RESULTADOS</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 table-responsive">
            <table class="table table-bordered">
    <thead>
        <tr class="text-center table-dark">
            <th colspan="3">DETALLE DEL RESULTADO.</th>
        </tr>
    </thead>
    <tbody>
               <tr>
            <td><strong>NOMBRE DEL ALUMNO:</strong></td>
            <?php foreach ($resultado as $key => $resultados) : ?>
                <td><?= $resultado['ALUM_NOMBRE'] . ' ' . $resultado['ALUM_APELLIDO'] ?></td>
            <?php endforeach ?>
        </tr>
        <tr>
            <td><strong>GRADO MILITAR DEL ALUMNO:</strong></td>
            <?php foreach ($resultado as $key => $resultados) : ?>
                <td><?= $resultados['ALUM_GRADO'] ?></td>
            <?php endforeach ?>
        </tr>
        <tr>
            <td><strong>ARMA DEL ALUMNO:</strong></td>
            <?php foreach ($resultado as $key => $resultados) : ?>
                <td><?= $resultados['ALUM_ARMA'] ?></td>
            <?php endforeach ?>
        </tr>
        <tr>
            <td><strong>NACIONALIDAD:</strong></td>
            <?php foreach ($resultado as $key => $resultados) : ?>
                <td><?= $resultados['ALUM_NACIONALIDAD'] ?></td>
            <?php endforeach ?>
        </tr>
        <?php if (count($resultado) == 0) : ?>
            <tr>
                <td colspan="3">NO EXISTEN REGISTROS</td>
            </tr>
         <?php endif ?>
        </tbody>
    </table>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 table-responsive">
                <table class="table table-bordered">
                    <thead >
                        <tr class="text-center table-dark">
                            <th colspan="7">MATERIAS</th>
                        </tr>
                    <thead class="table-dark">
                        <tr>
                            <th>NO.</th>
                            <th>MATERIA</th>
                            <th>PUNTEO</th>
                            <th>GANO/PERDIO</th>
                       </tr>
                    </thead>
                    <tbody>
                        <?php if (count($resultado) > 0) : ?>
                            <?php foreach ($resultado as $key => $resultados) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $resultados ['MATE_NOMBRE'] ?></td>
                                    <td><?= $resultados['RES_PUNTEO'] ?></td>
                                    <td><?= $resultados['RES_RESULTADO'] ?></td>                 
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="8">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif ?>
                        <tr>
                        <td colspan="4">RESULTADO:</td>
                        <td><?= $resultado['RESULTADO'] ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/final_rac/vistas/calificaciones/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>