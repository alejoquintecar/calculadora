<?php

  // Globales
  require_once '../config/constants.php';
  require_once '../config/connections.php';
  require_once 'BaseController.php';
  // Modelos
  require_once '../src/Models/HistorialResultados.php';

  class CalculadoraController extends BaseController{

    public $oDataBase;
    public $sTemplateRender = '';
    public function __construct(){
      $this->sTemplateRender = 'calculadora/index.php';
    }

    public function index(){
      // require_once '../../templates/index.php';
    }

    public function guardar(){

      $nNumUno = (int)$_POST['num-uno'];
      $nNumDos = (int)$_POST['num-dos'];
      $sNumOperacion = $_POST['num-operacion'];

      $nTotal = '';
      $sOperacion = '';

      switch( $sNumOperacion ){
        case 'sumar': 
          $nTotal = $nNumUno + $nNumDos;
          $sOperacion = '+';
          break;
        case 'restar':
          $nTotal = $nNumUno - $nNumDos;
          $sOperacion = '-';
          break;
        case 'dividir':
          $nTotal = $nNumUno / $nNumDos;
          $sOperacion = '/';
          break;
        case 'multiplicar':
          $nTotal = $nNumUno * $nNumDos;
          $sOperacion = '*';
          break;
      }

      $oHistorialResultados = new HistorialResultados();
      $oHistorialResultados->setNumUno($nNumUno);
      $oHistorialResultados->setNumDos($nNumDos);
      $oHistorialResultados->setOperacion($sOperacion);
      $oHistorialResultados->setResultado($nTotal);
      $oHistorialResultados->persist($oHistorialResultados);
      $oHistorialResultados->flush($oHistorialResultados);

      $oHistorialResultados->closeConexion();
      header('Content-Type: application/json');
      echo json_encode(array(
        'status' => 1,
        'message' => 'La operación ha sido registrada en el historial.',
        'resultado' => $nTotal
      )); exit;
    }

    public function getOperaciones(){

      $oHistorialResultados = new HistorialResultados();
      $aHistorialResultados = $oHistorialResultados->findBy('historial_resultados', 'LIMIT 10');
      $oHistorialResultados->closeConexion();

      header('Content-Type: application/json');
      echo json_encode(array(
        'status' => 1,
        'message' => 'Ok',
        'data' => $aHistorialResultados
      )); exit;
    }

    public function __destruct() {
      // $this->closeConexion();
    }

  }

?>