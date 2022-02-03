<?php

  class Connections extends Constants{

    // MySQL
    function __construct() {}

    /**
     * Inicia el Objeto de Conexion
     * @return array resultado Coneccion
    */
    public static function startConexion(){
      try{
        $aAuthDb = Constants::conexionDefault();
        $sConexionHost = 'host='.$aAuthDb['host'];
        $sConexionDBName = 'dbname='.$aAuthDb['db'];
        $sConexion = $aAuthDb['motor'].':'.$sConexionHost.';'.$sConexionDBName;
        $oConexion = new PDO( $sConexion, $aAuthDb['user'], $aAuthDb['pass'] );
        // ('mysql:host=localhost;dbname=prueba-calculadora', $this->usuario, $this->usuario);
        return $oConexion;
      }catch( \PDOException $e ){
        // throw new \PDOException($e->getMessage(), (int)$e->getCode());
        $aReturn['status'] = 0;
        $aReturn['message'] = $e->getMessage().'<br>Message Code: '.$e->getCode();
      }
      return $aReturn;
    }
  }

?>