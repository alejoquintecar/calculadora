<?php

  class BaseController{

    private $oConexion = null;
    private $oConnections = null;
    public function __construct(){
      
    }

    protected function getConexion(){
      $this->oConexion = Connections::startConexion();
      return $this->oConexion;
    }

    protected function closeConexion(){
      // $this->oConexion = Connections::closeConexion();
      $this->connection->query('KILL CONNECTION_ID()');
      $this->connection = null;
    }

  }
?>