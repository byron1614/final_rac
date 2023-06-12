<?php
require_once '../../modelos/Alumnos.php';
require_once '../../modelos/Materias.php';
    try {
        $alumno = new Alumno();
        $materia = new Materia();
        $alumnos = $alumno->buscar();
        $materias = $materia->buscar();
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">FORMULARIO DE BUSQUEDA DE RESULTADOS</h1>
        <div class="row justify-content-center">
            <form action="/final_rac/controladores/resultados/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="res_alumno">NOMBRE DEL ALUMNO</label>
                        <select name="res_alumno" id="res_alumno" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($alumnos as $key => $alumno) : ?>
                                <option value="<?= $alumno['ALUM_ID'] ?>"><?= $alumno['ALUM_NOMBRE'] . ' ' . $alumno['ALUM_APELLIDO'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>               
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-info w-100">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>