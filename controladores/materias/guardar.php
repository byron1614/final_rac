<?php
<<<<<<< HEAD
require '../../modelos/Materia.php';


=======
require '../../modelos/Materias.php';
>>>>>>> 08719a1cf8763ba257e7cd605f6990d3ed0e5514
if($_POST['ma_nombre'] != ''){
    try {
        $materia = new Materia($_POST);
        $resultado = $materia->guardar();
        $error = "NO se guardó correctamente";
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
}else{
    $error = "Debe llenar todos los datos";
}

?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <?php if($resultado): ?>
            <div class="alert alert-success" role="alert">
                Guardado exitosamente!
            </div>
<<<<<<< HEAD
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="/final_rac/vistas/materias/index.php" class="btn btn-info">Volver al formulario</a>
=======
            <?php else :?>
            <div class="alert alert-danger" role="alert">
                Ocurrió un error: <?= $error ?>
>>>>>>> 08719a1cf8763ba257e7cd605f6990d3ed0e5514
            </div>
            <?php endif ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <a href="/final_cornelio/vistas/materias/index.php" class="btn btn-info">Volver al formulario</a>
        </div>
    </div>
</div>
<?php include_once '../../includes/footer.php'?>