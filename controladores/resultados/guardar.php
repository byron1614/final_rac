<?php
require_once '../../modelos/Resultados.php';
require_once '../../modelos/Rel_mate_alum.php';




  

if(isset($_POST)){

    if($_POST['res_alumno'] != '' && $_POST['res_materia'] != '' && $_POST['res_punteo'] != ''){

        $res_alumno = $_POST['res_alumno'];
        $res_materia = $_POST['res_materia'];
        $res_punteo = $_POST['res_punteo'];
        $res_resultado = nota_literal($res_punteo);

        $arg = [
            'res_alumno' => $res_alumno,
            'res_materia' => $res_materia,
            'res_punteo' => $res_punteo,
            'res_resultado' => $res_resultado
        ];
        
        try {
            $resultado = new resultado($arg);
            $resultado = $resultado->guardar();
            $error = "NO se guardó correctamente";
        } catch (PDOException $e) {
            $error = $e->getMessage();
        } catch (Exception $e2){
            $error = $e2->getMessage();
        }
    }else{
        $error = "Debe llenar todos los datos";
    }

}else{
    $error = "No se recibieron datos";
}

?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        Guardado exitosamente!
                    </div>
                <?php else :?>
                    <div class="alert alert-danger" role="alert">
                        Ocurrió un error: <?= $error ?>
                    </div>
                <?php endif ?>
              
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="/final_rac/vistas/resultados/index.php" class="btn btn-info">Volver al formulario</a>
            </div>
        </div>
    </div>
    <?php include_once '../../includes/footer.php'?>
