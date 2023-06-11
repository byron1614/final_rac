<?php
require_once 'Conexion.php';

class Calificacion extends Conexion{
    public $id_calificaciones;
    public $calif_alumno;
    public $calif_materia;
    public $calif_punteo;
    public $calif_resultado;
    public $detalle_situacion;

    public function __construct($args = [] )
    {
        $this->id_calificaciones = $args['id_calificaciones'] ?? null;
        $this->calif_alumno = $args['calif_alumno'] ?? '';
        $this->calif_materia = $args['calif_materia'] ?? '';
        $this->calif_punteo = $args['calif_punteo'] ?? '';
        $this->calif_resultado = $args['calif_resultado'] ?? '';
        $this->detalle_situacion = $args['detalle_situacion'] ?? '1';
    }

    public function guardar(){
        $sql = "INSERT INTO resultados(res_Alumno, res_Materia, res_Punteo, res_Resultado) VALUES ($this->calif_alumno, $this->calif_materia, $this->calif_punteo, '$this->calif_resultado')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM resultados WHERE detalle_situacion = '1'";

        if($this->id_calificaciones != null){
            $sql .= " AND res_ID = $this->id_calificaciones";
        }

        if($this->calif_alumno != ''){
            $sql .= " AND res_Alumno = $this->calif_alumno";
        }

        if($this->calif_materia != ''){
            $sql .= " AND res_Materia = $this->calif_materia";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE resultados SET res_Alumno = $this->calif_alumno, res_Materia = $this->calif_materia, res_Punteo = $this->calif_punteo, res_Resultado = '$this->calif_resultado' WHERE res_ID = $this->id_calificaciones";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE resultados SET detalle_situacion = '0' WHERE res_ID = $this->id_calificaciones";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
