<?php

require '../../modelos/Alumnos.php';
    try {
        $alumno = new Alumno($_GET);

        $alumnos = $alumno->buscar_alum();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

    <div class="container">
        <h1 class="text-center">MODIFICAR ALUMNOS</h1>
        <div class="row justify-content-center">
            <form action="/final_rac/controladores/alumnos/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="alum_ID"value="<?= $alumnos[0]['ALUM_ID'] ?>" >
                <div class="row mb-3">
                <div class="col">
                        <label for="alum_Nombre">NOMBRE DEL ALUMNO</label>
                        <input type="text" name="alum_Nombre" id="alum_Nombre" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                    <div class="col">
                        <label for="alum_apellido">ALUMNO APELLIDO</label>
                        <input type="text" name="alum_apellido" id="alum_apellido" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alum_Grado">GRADO MILITAR</label>
                        <input type="text" name="alum_Grado" id="alum_Grado" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                    <div class="col">
                        <label for="alum_Arma">ARMA DEL ALUMNO</label>
                        <input type="text" name="alum_Arma" id="alum_Arma" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alum_Nacionalidad">NACIONALIDAD DEL ALUMNO</label>
                        <input type="text" name="alum_Nacionalidad" id="alum_Nacionalidad" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-warning w-100">MODIFICAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>