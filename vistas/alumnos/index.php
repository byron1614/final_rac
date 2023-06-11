<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">FORMULARIO DE INGRESO DE ALUMNOS</h1>
        <div class="row justify-content-center">
            <form action="/practica9/controladores/clientes/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                    <label for="cliente_nombre">NOMBRE DEL ALUMNO</label>
                        <input type="text" name="cliente_nombre" id="cliente_nombre" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cliente_nit">APELLIDO DEL ALUMNO</label>
                        <input type="text" name="cliente_nit" id="cliente_nit" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cliente_nit">GRADO</label>
                        <input type="text" name="cliente_nit" id="cliente_nit" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cliente_nit">ARMA</label>
                        <input type="text" name="cliente_nit" id="cliente_nit" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cliente_nit">NACIONALIDAD</label>
                        <input type="text" name="cliente_nit" id="cliente_nit" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">GUARDAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>