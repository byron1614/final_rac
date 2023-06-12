<?php
require_once 'Conexion.php';

class Resultados extends Conexion{
    public $res_id;
    public $res_alumno;
    public $res_materia;
    public $res_punteo;
    public $res_resultado;
    public $detalle_situacion;

    public function __construct($args = [] )
    {
        $this->res_id = $args['res_id'] ?? null;
        $this->res_alumno = $args['res_alumno'] ?? '';
        $this->res_materia = $args['res_materia'] ?? '';
        $this->res_punteo = $args['res_punteo'] ?? '';
        $this->res_resultado = $args['res_resultado'] ?? '';
        $this->detalle_situacion = $args['detalle_situacion'] ?? '1';
    }

    public function guardar(){
        $sql = "INSERT INTO resultados(res_alumno, res_materia, res_punteo, res_resultado) VALUES ($this->res_alumno, $this->res_materia, $this->res_punteo, '$this->res_resultado')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM resultados WHERE detalle_situacion = '1'";

        if($this->res_id != null){
            $sql .= " AND res_id = $this->res_id";
        }

        if($this->res_id != ''){
            $sql .= " AND res_id = $this->res_id";
        }

        if($this->res_materia != ''){
            $sql .= " AND res_materia = $this->res_materia";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar_alum(){
        $sql = "SELECT materias.ma_nombre as res_materia, resultados.res_punteo as res_punteo, resultados.res_resultado as res_resultado  
        FROM resultados INNER JOIN materias ON materias.mate_id = resultados.res_materia WHERE resultados.detalle_situacion = '1'";

        if($this->res_alumno != ''){
            $sql .= " AND resultados.res_alumno = $this->res_alumno";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }
    public function modificar(){
        $sql = "UPDATE resultados SET res_alumno = $this->res_alumno, res_materia = $this->res_materia, res_punteo = $this->res_punteo, res_resultado = '$this->res_resultado' WHERE res_id = $this->res_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE resultados SET detalle_situacion = '0' WHERE res_id = $this->res_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}