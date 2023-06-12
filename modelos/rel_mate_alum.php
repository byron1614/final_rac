<?php
require_once 'Conexion.php';
class Rel_mate_alum extends Conexion{
    public $id_mate_alum;
    public $mate_alumno;
    public $mate_materia;

    public function __construct($args = [] ){
        $this->id_mate_alum = $args['id_mate_alum'] ?? null;
        $this->mate_alumno = $args['mate_alumno'] ?? '';
        $this->mate_materia = $args['mate_materia'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO rel_mate_alum(mate_alumno, mate_materia) VALUES ($this->mate_alumno, $this->mate_materia)";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM rel_mat_alum WHERE 1=1";
    
        if($this->id_mate_alum != null){
            $sql .= " AND id_mate_alum = $this->id_mate_alum";
        }
    
        if($this->mate_alumno != ''){
            $sql .= " AND mate_alumno = $this->mate_alumno";
        }
    
        if($this->mate_materia != ''){
            $sql .= " AND mate_materia = $this->mate_materia";
        }
    
        $resultado = self::servir($sql);
        return $resultado;
    }
    public function modificar(){
        $sql = "UPDATE rel_mate_alum SET mate_alumno = $this->mate_alumno, mate_materia = $this->mate_materia WHERE id_mate_alum = $this->id_mate_alum";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "DELETE FROM rel_mate_alum WHERE id_mate_alum = $this->id_mate_alum";
        
        $resultado = self::ejecutar($sql);
        
        return $resultado;
    }
}
?>