<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">BUSCAR ALUMNO</h1>
        <div class="row justify-content-center">
            <form action="/final_rac/controladores/alumnos/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="alu_nombre">NOMBRE DEL ALUMNO</label>
                        <input type="text" name="alum_nombre" id="alum_nombre" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alum_apellido">APELLIDO DEL ALUMNO</label>
                        <input type="text" name="alum_apellido" id="alum_apellido" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alum_nacionalidad">NACIONALIDAD</label>
                        <input type="text" name="alum_nacionalidad" id="alum_nacionalidad" class="form-control">
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