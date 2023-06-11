<?php
require_once 'Conexion.php';

class Materia extends Conexion{
    public $mate_ID;
    public $mate_Nombre;
    public $detalle_situacion;


    public function __construct($args = [] )
    {
        $this->mate_ID = $args['mate_ID'] ?? null;
        $this->mate_Nombre = $args['mate_Nombre'] ?? '';
        $this->detalle_situacion = $args['detalle_situacion'] ?? '1';
    }

    public function guardar(){
        $sql = "INSERT INTO Materias(mate_Nombre) VALUES('$this->mate_Nombre')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM Materias WHERE detalle_situacion = '1'";

        if($this->mate_Nombre != ''){
            $sql .= " AND mate_Nombre LIKE '%$this->mate_Nombre%'";
        }

        if($this->mate_ID != null){
            $sql .= " AND mate_ID = $this->mate_ID";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE Materias SET mate_Nombre = '$this->mate_Nombre' WHERE mate_ID = $this->mate_ID";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE Materias SET detalle_situacion = '0' WHERE mate_ID = $this->mate_ID";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
