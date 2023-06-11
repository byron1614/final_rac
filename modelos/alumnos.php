<?php
require_once 'Conexion.php';

class Alumno extends Conexion{
    public $alum_ID;
    public $alum_Nombre;
    public $alum_Apellido;
    public $alum_Grado;
    public $alum_Arma;
    public $alum_Nacionalidad;
    public $detalle_situacion;


    public function __construct($args = [] )
    {
        $this->alum_ID = $args['alum_ID'] ?? null;
        $this->alum_Nombre = $args['alum_Nombre'] ?? '';
        $this->alum_Apellido = $args['alum_Apellido'] ?? '';
        $this->alum_Grado = $args['alum_Grado'] ?? '';
        $this->alum_Arma = $args['alum_Arma'] ?? '';
        $this->alum_Nacionalidad = $args['alum_Nacionalidad'] ?? '';
        $this->detalle_situacion = $args['detalle_situacion'] ?? '1';
    }

    public function guardar(){
        $sql = "INSERT INTO Alumnos(alum_Nombre, alum_Apellido, alum_Grado, alum_Arma, alum_Nacionalidad) 
                VALUES('$this->alum_Nombre', '$this->alum_Apellido', '$this->alum_Grado', '$this->alum_Arma', '$this->alum_Nacionalidad')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM Alumnos WHERE detalle_situacion = '1'";

        if($this->alum_Nombre != ''){
            $sql .= " AND alum_Nombre LIKE '%$this->alum_Nombre%'";
        }

        if($this->alum_Apellido != ''){
            $sql .= " AND alum_Apellido LIKE '%$this->alum_Apellido%'";
        }

        if($this->alum_ID != null){
            $sql .= " AND alum_ID = $this->alum_ID";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE Alumnos SET alum_Nombre = '$this->alum_Nombre', alum_Apellido = '$this->alum_Apellido',
                alum_Grado = '$this->alum_Grado', alum_Arma = '$this->alum_Arma', alum_Nacionalidad = '$this->alum_Nacionalidad' 
                WHERE alum_ID = $this->alum_ID";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE Alumnos SET detalle_situacion = '0' WHERE alum_ID = $this->alum_ID";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
