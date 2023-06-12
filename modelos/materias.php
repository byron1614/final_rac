<?php
require_once 'Conexion.php';
    
    class Materia extends Conexion{
        public $mate_id;
        public $mate_nombre;
        public $detalle_situacion;
    
        public function __construct($args = [] )
        {
            $this->mate_id = $args['mate_id'] ?? null;
            $this->mate_nombre = $args['mate_nombre'] ?? '';
            $this->detalle_situacion = $args['detalle_situacion'] ?? '1';
        }
    
        public function guardar(){
            $sql = "INSERT INTO materias(mate_nombre) VALUES ('$this->mate_nombre')";
            $resultado = self::ejecutar($sql);
            return $resultado;
        }
    
        public function buscar(){
            $sql = "SELECT * FROM materias WHERE detalle_situacion = 1";
    
            if($this->mate_nombre != null){
                $sql .= " AND mate_nombre = '$this->mate_nombre'";
            }
    
            $resultado = self::servir($sql);
            return $resultado;
        }
    
        public function modificar(){
            $sql = "UPDATE materias SET mate_nombre = '$this->mate_nombre' WHERE mate_id = $this->mate_id";
            
            $resultado = self::ejecutar($sql);
            return $resultado;
        }
    
        public function eliminar(){
            $sql = "UPDATE materias SET detalle_situacion = '0' WHERE mate_id = $this->mate_id";
            
            $resultado = self::ejecutar($sql);
            return $resultado;
        }
    }