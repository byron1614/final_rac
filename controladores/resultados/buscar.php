<?php
require_once '../../modelos/Alumnos.php';
require_once '../../modelos/Resultados.php';

$id_alumno = isset($_GET['res_alumno']) && $_GET['res_alumno'] != '' ? $_GET['res_alumno'] : null;
$error = '';

if ($alum_id) {
    try {
        $alumnos = (new Alumno(["alum_id" => $alum_id]))->buscar2();
        $resultados = (new resultado(["res_alumno" => $alum_id]))->buscar2();
        $promedio = (new resultado(["res_alumno" => $alum_id]))->promedio();
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2) {
        $error = $e2->getMessage();
    }
} else {
    $error = "No se proporcionó el ID del alumno";
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultado de resultados de los alumnos</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>ALUMNO</th>
                            <th>GRADO</th>
                            <th>ARMA</th>
                            <th>NACIONALIDAD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($resultados) > 0):?>
                        <?php foreach($resultados as $key => $resultado) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $resultado['ALUM_NOMBRE'] . ' ' . $resultado['ALUM_NOMBRE']?></td>
                            <td><a class="btn btn-info w-100" href="/final_rac/vistas/resultados/resultado.php?res_id=<?= $calificacion['RES_ID']?>">VER DETALLE</a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="4">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/final_rac/vistas/resultados/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>