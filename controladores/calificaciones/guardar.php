<?php
require_once '../../modelos/Resultados.php';
require_once '../../modelos/Rel_mate_alum.php';

$materias = array_filter($_POST['materias']);
$calif_punteo = array_filter($_POST['calif_punteo']);
if($_POST['calificacion_cliente'] != '' && $_POST['calificacion_fecha'] != '' && count($materias)>0 && count($calif_punteo)>0){

    


    try {
        $calificacion = new Calificacion($_POST);
        $resultado = $calificacion->guardar();
        $idInsertado = $resultado['id'];
        $i = 0;
        foreach ($materias as $key => $producto) {
            $relacionmatalum = new RelacionMatAlum([
                'detalle_calificacion' => $idInsertado,
                'detalle_materia' => $producto,
                'detalle_punteo' => $calif_punteo[$i]
            ]);
            $relacionmatalum->guardar();
            $i++;

        }

        
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
}else{
    $error = "Debe llenar todos los datos y seleccionar al menos un producto";
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        Guardado exitosamente!
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
                <a href="/final_rac/vistas/alumnos/index.php" class="btn btn-info">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>