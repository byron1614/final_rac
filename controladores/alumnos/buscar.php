<?php
require '../../modelos/Alumnos.php';
try {

    $alumno = new Alumno($_GET);
    $alumnos = $alumno->buscar();


} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>GRADO</th>
                            <th>ARMA</th>
                            <th>NACIONALIDAD</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($alumnos) > 0):?>
                        <?php foreach($alumnos as $key => $alumno) : ?>

                         
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $alumno['ALUM_NOMBRE'] ?></td>
                            <td><?= $alumno['ALUM_APELLIDO'] ?></td>
                            <td><?= $alumno['ALUM_GRADO'] ?></td>
                            <td><?= $alumno['ALUM_ARMA'] ?></td>
                            <td><?= $alumno['ALUM_NACIONALIDAD'] ?></td>
                            <td><a class="btn btn-warning w-100" href="/final_rac/vistas/alumnos/modificar.php?alum_id=<?= $alumno['ALUM_ID']?>">Modificar</a></td>
                            <td><a class="btn btn-danger w-100" href="/final_rac/controladores/alumnos/eliminar.php?alum_id=<?= $alumno['ALUM_ID']?>">Eliminar</a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="3">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/final_rac/vistas/alumnos/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>