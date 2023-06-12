<?php
require '../../modelos/Materias.php';
try {
    if(isset($_GET['mate_id']) && $_GET['mate_id'] != ''){

        $id_materia = $_GET['mate_id'];
        $materia = new Materia(["mate_id" => $mate_id]);
        $materias = $materia->buscar();
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">MODIFICAR MATERIAS</h1>
        <div class="row justify-content-center">
            <form action="/final_rac/controladores/materias/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="mate_ID" value="<?= $materias[0]['MATE_ID'] ?>" >
                <div class="row mb-3">
                    <div class="col">
                        <label for="mate_Nombre">NOMBRE DE LA MATERIA</label>
                        <input type="text" name="mate_Nombre" id="mate_Nombre" class="form-control" value="<?= $materias[0]['MATE_NOMBRE'] ?>">
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
