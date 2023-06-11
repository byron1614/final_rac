<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Resultados.php';  
require '../../modelos/Rel_mate_alum.php';  

try {
    $id = $_GET['res_id'];
    $calificacion = new Calificacion([
        'res_ID' => $id 
    ]);
    $relacionmatalum = new RelacionMatAlum([
        'mate_materia' => $id  
    ]);

    $calificaciones = $calificacion->buscar();
    $materias = $rel_mate_alum ->buscar();
    echo "<pre>";
    var_dump($calificaciones);
    echo "</pre>";
    echo "<pre>";
    var_dump($materias);
    echo "</pre>";
    exit;
    // $error = "NO se guardó correctamente";
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}
?>
