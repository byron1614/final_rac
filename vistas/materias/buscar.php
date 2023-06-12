<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">BUSCAR MATERIAS</h1>
        <div class="row justify-content-center">
            <form action="/final_rac/controladores/materias/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="mate_Nombre">NOMBRE DE LA MATERIA</label>
                        <input type="text" name="mate_Nombre" id="mate_Nombre" class="form-control">
                    </div>
                </div>
                    <div class="col">
                        <button type="submit" class="btn btn-info w-100">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once '../../includes/footer.php'?>