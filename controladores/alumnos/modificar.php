<?php
<<<<<<< HEAD
require '../../modelos/Alumno.php';


=======
require '../../modelos/Alumnos.php';
>>>>>>> 08719a1cf8763ba257e7cd605f6990d3ed0e5514
if($_POST['id_alumnos'] != '' && $_POST['alu_nombre'] != '' && $_POST['alu_apellido'] != '' && $_POST['alu_grado'] != '' && $_POST['alu_arma'] != '' && $_POST['alu_nac'] != ''){
    try {
        $alumno = new Alumno($_POST);
        
        $resultado = $alumno->modificar();

    } catch (PDOException $e) {
        $error = $e->getMessage();

    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
}else{
    $error = "Faltaron campos por llenar";
}
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <?php if($resultado): ?>
            <div class="alert alert-success" role="alert">
                La modificacion se realizo sin novedad!
            </div>
<<<<<<< HEAD
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="/final_rac/controladores/alumnos/buscar.php?alu_nombre=<?= $_POST['alu_nombre'] ?>" class="btn btn-info">Volver al formulario</a>
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
            <a href="/final_cornelio/controladores/alumnos/buscar.php?alu_nombre=<?= $_POST['alu_nombre'] ?>"
                class="btn btn-info">Volver al formulario</a>
        </div>
    </div>
</div>
<?php include_once '../../includes/footer.php'?>