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
    <div class="container">
        <h1 class="text-center">MODIFICAR ALUMNOS</h1>
        <div class="row justify-content-center">
            <form action="/final_rac/controladores/alumnos/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="cliente_id">
                <div class="row mb-3">
                <div class="col">
                        <label for="alum_nombre">NOMBRE DEL ALUMNO</label>
                        <input type="text" name="alum_nombre" id="alum_nombre" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                    <div class="col">
                        <label for="alum_apellido">ALUMNO APELLIDO</label>
                        <input type="text" name="alum_apellido" id="alum_apellido" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alum_grado">GRADO MILITAR</label>
                        <input type="text" name="alum_grado" id="alum_grado" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                    <div class="col">
                        <label for="alum_arma">ARMA DEL ALUMNO</label>
                        <input type="text" name="alum_arma" id="alum_arma" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alum_nac">NACIONALIDAD DEL ALUMNO</label>
                        <input type="text" name="alum_nac" id="alum_nac" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-warning w-100">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>