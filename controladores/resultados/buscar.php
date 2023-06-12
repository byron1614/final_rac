<?php
require_once '../../modelos/Resultados.php';
require_once '../../modelos/Alumnos.php';
try {

    if(isset($_GET['res_alumno']) && $_GET['res_alumno'] != ''){

        $alum_id = $_GET['res_alumno'];

        $alumnos = new Alumno(["alum_id" => $alum_id]);
        $alumnos = $alumnos->buscar_alum();

        $resultado = new resultado(["res_alumno" => $alum_id]);
        $resultadoes = $resultado->buscar_alum();

        $promedio = $resultado->promedio();     

    }
    

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
                            <th>ALUMNO</th>
                            <th>GRADO</th>
                            <th>ARMA</th>
                            <th>NACIONALIDAD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($alumnos) > 0):?>
                        <?php foreach($alumnos as $key => $alumno) : ?>
                        <tr class="text-center">
                            <td><?= $key + 1 ?></td>
                            <td><?= $alumno['ALUM_NOMBRE'] . ' ' . $alumno['ALUM_APELLIDO']?></td>
                            <td><?= $alumno['ALUM_GRADO']?></td>
                            <td><?= $alumno['ALUM_ARMA']?></td>
                            <td><?= $alumno['ALUM_NACIONALIDAD']?></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="4">NO HAY REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>MATERIA</th>
                            <th>PUNTEO</th>
                            <th>RESULTADO</th>
                            <th>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($resultados) > 0):?>
                        <?php foreach($resultados as $key => $resultado) : ?>
                        <tr class="text-center">
                            <td><?= $key + 1 ?></td>
                            <td><?= $resultado['RES_MATERIA']?></td>
                            <td><?= $resultado['RES_PUNTEO']?> PUNTOS</td>
                            <td><?= $resultado['RES_RESULTADO']?></td>
                            <td></td>
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
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <tbody class="text-center">
                        <tr>
                            <td>PROMEDIO</td>
                            <td><?= number_format($promedio[0]['PROMEDIO'], 2, '.', ',')?> PUNTOS</td>
                        </tr>
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
    <?php include_once '../../includes/footer.php'?>