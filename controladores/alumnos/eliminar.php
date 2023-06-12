<?php
require '../../modelos/Alumnos.php';
require '../../modelos/Rel_mate_alum.php';

try {

    if (isset($_GET['alum_id'])) {
        $alumno = new Alumno(['alum_id' => $_GET['alum_id']]);

        if($alumno->eliminar()){

            $resultado = true;

        }else{
            $resultado = false;
            throw new Exception("Error al eliminar el usuario ");
        }

        $relacion = new Rel_mate_alum(['mate_alumno' => $_GET['alum_id']]);

        if($relacion->eliminar()){

            $resultado = true;
            
        }else{
            
            $resultado = false;
            throw new Exception("Error al eliminar");
            
        }

    } else {
        $resultado = false;
        $error .= "no proporciono el ID del alumno";
    }

}catch (PDOException $ex){
    $error .= $ex->getMessage();

}catch (Exception $e2) {
    $error .= $e2->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultado de alumnos</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        Alumno eliminado exitosamente!
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
                <a href="/final_rac/controladores/alumnos/buscar.php" class="btn btn-info">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>