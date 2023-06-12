<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Calificaciones.php';
require '../../modelos/Rel_mate_alum.php';
    try {
        $id = $_GET['res_id'];
        $calificacion = new Calificacion($_GET);
        $Rel_mate_alum = new Rel_mate_alum([
            'res_materia' => $id
        ]);

        $calificaciones = $calificacion->buscar();
        $materias = $Rel_mate_alum->buscar();
        echo "<pre>";
        var_dump($calificaciones);
        echo "</pre>";
        echo "<pre>";
        var_dump($materias);
        echo "</pre>";
        exit;
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>