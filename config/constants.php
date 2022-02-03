<?php

  class Constants{

    // Protegidas
    protected $aAuthDb = array();
    function __construct(){
      $this->aAuthDb['default'] = $this->conexionDefault();
    }

    protected static function conexionDefault(){
      return array(
        'db'    => 'prueba-calculadora',
        'user'  => 'root',
        'pass'  => '',
        'motor' => 'mysql',
        'host'  => '127.0.0.1',
        'port'  => '3306'
      );
    }

  }

?>