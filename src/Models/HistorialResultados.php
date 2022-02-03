<?php

  include_once 'ModelBase.php';
  class HistorialResultados extends ModelBase{

    public $table = 'historial_resultados';
    public $numUno;
    public $numDos;
    public $operacion;
    public $resultado;

    // numUno
    public function getTable(){
      return $this->table;
    }

    // numUno
    public function getNumUno(){
      return $this->numUno;
    }
    public function setNumUno($numUno){
      $this->numUno = $numUno;
    }
    // numDos
    public function getNumDos(){
      return $this->numDos;
    }
    public function setNumDos($numDos){
      $this->numDos = $numDos;
    }
    // Operacion
    public function getOperacion(){
      return $this->operacion;
    }
    public function setOperacion($operacion){
      $this->operacion = $operacion;
    }
    // resultado
    public function getResultado(){
      return $this->resultado;
    }
    public function setResultado($resultado){
      $this->resultado = $resultado;
    }
  }
?>