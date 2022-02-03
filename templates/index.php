<?php

  require_once '../src/Controller/CalculadoraController.php';
  $oCalculadoraController = new CalculadoraController();

  if( isset($_GET['action']) ){
    $sAction = $_GET['action'];
    $oCalculadoraController->$sAction();
  }else{
    require_once 'base.php';
  }
?>