<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Resultados.php';
require '../../modelos/Detalle.php';
    try {
        $id = $_GET['res_id'];
        $resultado = new Resultado($_GET);
        $detalle = new Detalle([
            'res_materia' => $id
        ]);

        $resultado = $resultado->buscar();
        $materias = $detalle->buscar();
        echo "<pre>";
        var_dump($resultado);
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