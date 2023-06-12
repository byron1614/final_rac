<?php
require '../../modelos/Alumnos.php';

if($_POST['alum_ID'] != '' && $_POST['alum_Nombre'] != '' && $_POST['alum_apellido'] != '' && $_POST['alum_Grado'] != '' && $_POST['alum_Arma'] != '' && $_POST['alum_Nacionalidad'] != ''){



    try {
        $alumno = new Alumno($_POST);
        
        $resultado = $alumno->modificar();

    } catch (PDOException $e) {
        $error = $e->getMessage();

    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
}else{
    $error = "llena todos los campos";
}

?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        La modificacion fue realizada con exito!
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
    <?php include_once '../../includes/footer.php'?>