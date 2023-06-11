<?php
require_once 'Conexion.php';

class Resultado extends Conexion{
    public $res_ID;
    public $res_Alumno;
    public $res_Materia;
    public $res_Punteo;
    public $res_Resultado;
    public $detalle_situacion;


    public function __construct($args = [] )
    {
        $this->res_ID = $args['res_ID'] ?? null;
        $this->res_Alumno = $args['res_Alumno'] ?? '';
        $this->res_Materia = $args['res_Materia'] ?? '';
        $this->res_Punteo = $args['res_Punteo'] ?? '';
        $this->res_Resultado = $args['res_Resultado'] ?? '';
        $this->detalle_situacion = $args['detalle_situacion'] ?? '1';
    }

    public function guardar(){
        $sql = "INSERT INTO Resultados(res_Alumno, res_Materia, res_Punteo, res_Resultado) VALUES($this->res_Alumno, $this->res_Materia, $this->res_Punteo, '$this->res_Resultado')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM Resultados WHERE detalle_situacion = '1'";

        if($this->res_Alumno != ''){
            $sql .= " AND res_Alumno = $this->res_Alumno";
        }

        if($this->res_Materia != ''){
            $sql .= " AND res_Materia = $this->res_Materia";
        }

        if($this->res_Punteo != ''){
            $sql .= " AND res_Punteo = $this->res_Punteo";
        }

        if($this->res_Resultado != ''){
            $sql .= " AND res_Resultado = '$this->res_Resultado'";
        }

        if($this->res_ID != null){
            $sql .= " AND res_ID = $this->res_ID";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE Resultados SET res_Alumno = $this->res_Alumno, res_Materia = $this->res_Materia, res_Punteo = $this->res_Punteo, res_Resultado = '$this->res_Resultado' WHERE res_ID = $this->res_ID";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE Resultados SET detalle_situacion = '0' WHERE res_ID = $this->res_ID";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
