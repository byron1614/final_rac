<?php
require '../../modelos/Alumnos.php';


if($_POST['alum_id'] != '' && $_POST['alum_nombre'] != '' && $_POST['alum_apellido'] != '' && $_POST['alum_grado'] != '' && $_POST['alum_arma'] != '' && $_POST['alum_nacionalidad'] != ''){

    try {
        $alumno = new Alumno($_POST);
        $resultado = $alumno->modificar();

    } catch (PDOException $e) {
        $error = $e->getMessage();

    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
}else{
    $error = "Debe llenar todos los datos";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados alumnos</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        Modificado exitosamente!
                    </div>
                <?php else :?>
                    <div class="alert alert-danger" role="alert">
                        Ocurrió un error: <?= $error ?>
                    </div>
                <?php endif ?>
              
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="/final_rac/controladores/alumnos/buscar.php?alum_nombre=<?= $_POST['alum_nombre'] ?>" class="btn btn-info">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>