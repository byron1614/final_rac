<?php
require_once '../../modelos/Calificacion.php';
require_once '../../modelos/Alumno.php';
try {

    if(isset($_GET['calif_alumno']) && $_GET['calif_alumno'] != ''){

        $id_alumno = $_GET['calif_alumno'];

        $alumnos = new Alumno(["id_alumnos" => $id_alumno]);
        $alumnos = $alumnos->buscar2();

        $calificacion = new Calificacion(["calif_alumno" => $id_alumno]);
        $calificaciones = $calificacion->buscar2();

        $promedio = $calificacion->promedio();     

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
                            <h2  class="text-center">CALIFICACION DEL ALUMNO</h2>
                    </thead>
                    <?php if(count($alumnos) > 0):?>
                        <?php foreach($alumnos as $key => $alumno) : ?>
                        <tr class="text-center">
<<<<<<< HEAD
<<<<<<< HEAD
                        <tr>
                            <th>ALUMNO</th>
=======
>>>>>>> f30af0a0c28d76e6a6272be90b58f2531bef931e
=======
                        <tr>
                            <th>ALUMNO</th>
>>>>>>> 08719a1cf8763ba257e7cd605f6990d3ed0e5514
                            <td><?= $alumno['ALU_NOMBRE'] . ' ' . $alumno['ALU_APELLIDO']?></td>
                        </tr>  
                        <tr>
                        <th>GRADO Y ARMA</th>
                            <td><?= $alumno['ALU_GRADO'] . ' ' . 'de' . ' ' . $alumno['ALU_ARMA']?></td>
                        </tr> 
                        <tr>
                        <th>NACIONALIDAD</th>
                        <td><?= $alumno['ALU_NAC']?></td>
                        </tr>
                     <tbody>
                           
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

        <tr>
            <h3 class="text-center">NOTAS OBTENIDAS</h3>
        </tr>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>MATERIA</th>
                            <th>PUNTEO</th>
                            <th>RESULTADO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($calificaciones) > 0):?>
                        <?php foreach($calificaciones as $key => $calificacion) : ?>
                        <tr class="text-center">
                            <td><?= $key + 1 ?></td>
                            <td><?= $calificacion['CALIF_MATERIA']?></td>
                            <td><?= $calificacion['CALIF_PUNTEO']?> PUNTOS</td>
                            <td><?= $calificacion['CALIF_RESULTADO']?></td>
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
                <a href="/final_rac/vistas/calificaciones/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
    <?php include_once '../../includes/footer.php'?>