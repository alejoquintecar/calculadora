<?php

use function PHPSTORM_META\type;

class ModelBase{

    public $oConexion;
    public $aGuardar = null;
    public function __construct(){
      $this->oConexion = Connections::startConexion();
    }

    public function findBy($sTabla, $limit = '', $sWhere = '1 = 1' ){
      // $oQuery = $this->oConexion->query("SELECT * 
      //   FROM {$sTabla} as t
      //   WHERE {$sWhere}
      // ");
      $sQuery = "SELECT * 
        FROM {$sTabla} as t
        WHERE {$sWhere}
        {$limit}
      ";
      $oQuery = $this->oConexion->prepare($sQuery);
      $oQuery->execute();
      return $oQuery->fetchAll(PDO::FETCH_ASSOC);
      // return $oQuery;
    }

    public function persist($oModelo){
      $this->aGuardar = array(
        'status' => 1,
        'message' => 'ok'
      );
      $sDetalle = '';
      foreach( $oModelo as $propiedad => $value ){
        if( gettype($value) != 'object' && $propiedad != 'aGuardar' && $propiedad != 'table' ){
          if( empty($value) ) $sDetalle .= $propiedad.' es igual a vacio. ';
        }
      }
      if( $sDetalle != '' ){
        $this->aGuardar = array(
          'status' => 0,
          'message' => 'Hay valores sin diligenciar: '
        );
      }
    }

    public function flush( $oModelo ){

      $sTable = $oModelo->getTable();

      $sSql = "INSERT INTO {$sTable} (";
      $sSqlInsert = "";
      $sSqlValues = "";

      $aSqlValues = array();
      // $sSql = "INSERT INTO {$sTable} VALUES(";
      foreach( $oModelo as $propiedad => $value ){
        if( gettype($value) != 'object' && $propiedad != 'aGuardar' && $propiedad != 'table' ){
          $output = ltrim(strtolower(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $propiedad)), '_');
          if( !empty($sSqlInsert) ) $sSqlInsert .= ',';
          if( !empty($sSqlValues) ) $sSqlValues .= ',';
          $sSqlValues .= '?';
          $sSqlInsert .= $output;
          $aSqlValues[] = $value;
        }
      }
      $sSql .= $sSqlInsert.') VALUES ('.$sSqlValues.')';
      $oQuery = $this->oConexion->prepare($sSql)->execute($aSqlValues);      
    }

    public function closeConexion(){
      $this->oConexion->query('KILL CONNECTION_ID()');
      $this->oConexion = null;
    }

  }
  

?>