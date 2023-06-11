<?php
require '../../modelos/Materias.php';
    try {
        $materia = new Materia($_GET);

        $materias = $materia->buscar();
        // echo "<pre>";
        // var_dump($productos[0]['PRODUCTO_ID']);
        // echo "</pre>";
        // exit;
        // $error = "NO se guardó correctamente";
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">MODIFICAR MATERIA</h1>
        <div class="row justify-content-center">
            <form action="/final_rac/controladores/materias/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="mate_id" value="<?= $materias[0]['MATE_ID'] ?>" >
                <div class="row mb-3">
                    <div class="col">
                        <label for="mate_nombre">NOMBRE DE LA MATERIA</label>
                        <input type="text" name="mate_nombre" id="mate_nombre" class="form-control" value="<?= $materias[0]['MATE_NOMBRE'] ?>">
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