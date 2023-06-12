<?php
require_once 'Conexion.php';
class Alumno extends Conexion{
    public $alum_id;
    public $alum_nombre;
    public $alum_apellido;
    public $alum_grado;
    public $alum_arma;
    public $alum_nacionalidad;
    public $detalle_situacion;

    public function __construct($args = [] )
    {
        $this->alum_id = $args['alum_id'] ?? null;
        $this->alum_nombre = $args['alum_nombre'] ?? '';
        $this->alum_apellido = $args['alum_apellido'] ?? '';
        $this->alum_grado = $args['alum_grado'] ?? '';
        $this->alum_arma = $args['alum_arma'] ?? '';
        $this->alum_nacionalidad = $args['alum_nacionalidad'] ?? '';
        $this->detalle_situacion = $args['detalle_situacion'] ?? '1';
    }

    public function guardar(){
        $sql = "INSERT INTO alumnos(alum_nombre, alum_apellido, alum_grado, alum_arma, alum_nacionalidad) VALUES ('$this->alum_nombre', '$this->alum_apellido', '$this->alum_grado', '$this->alum_arma', '$this->alum_nacionalidad')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM alumnos where detalle_situacion != 0 ";

        if($this->alum_nombre != null && $this->alum_nombre != ''){
            $sql .= "AND alum_nombre = '$this->alum_nombre'";
        }

        if($this->alum_apellido != null && $this->alum_apellido != ''){
            $sql .= " AND alum_apellido = '$this->alum_apellido'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar_alum(){
        $sql = "SELECT * FROM alumnos WHERE ";

        if($this->alum_id != null){
            $sql .= " alum_id = $this->alum_id";
        }
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE alumnos SET alum_nombre = '$this->alu_nombre', alum_apellido = '$this->alum_apellido', alum_grado = '$this->alum_grado', alum_arma = '$this->alum_arma', alum_nacionalidad = '$this->alum_nacionalidad' where alum_id = '$this->alum_id'";

      
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE alumnos SET detalle_situacion = 0 WHERE alum_Id = $this->alum_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
