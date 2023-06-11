<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">FORMULARIO DE INGRESO DE ALUMNOS</h1>
        <div class="row justify-content-center">
            <form action="/final_rac/controladores/alumnos/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="alum_nombre">NOMBRE DE ALUMNOS</label>
                        <input type="text" name="alum_nombre" id="alum_nombre" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="alum_apellido">APELLIDO DEL ALUMNO</label>
                        <input type="text" name="alum_apellido" id="alum_apellido" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alum_grado">GRADO MILITAR</label>
                        <input type="text" name="alum_grado" id="alum_grado" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="alum_arma">ARMA DEL ALUMNO</label>
                        <input type="text" name="alum_arma" id="alum_arma" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alum_nacionalidad">NACIONALIDAD DEL ALUMNO</label>
                        <input type="text" name="alum_nacionalidad" id="alum_nacionalidad" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>