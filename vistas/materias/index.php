<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">FORMULARIO PARA AGREGAR MATERIA</h1>
        <div class="row justify-content-center">
            <form action="/final_rac/controladores/materias/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="mate_nombre">NOMBRE DE LA MATERIA</label>
                        <input type="text" name="mate_nombre" id="mate_nombre" class="form-control">
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