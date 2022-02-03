<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <!-- Css -->
    <link rel="stylesheet" href="assets/libraries/fonts/kanit/index.css">
    <link rel="stylesheet" href="assets/libraries/bootstrap-5.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/libraries/fontawesome-free-5.15-web/css/all.css">
  </head>

  <body>

    <!-- --- --- --- Libraries --- --- --- -->
    <script src="assets/libraries/jquery-3.6.0.min.js"></script>
    <script src="assets/libraries/imask.js"></script>
    <script src="assets/libraries/sweetalert2@11.js"></script>
    <script src="assets/libraries/bootstrap-5.1/js/bootstrap.min.js"></script>
    <!-- --- --- END Libraries --- --- --- -->

    <!-- --- --- --- Globales --- --- --- -->
    <script src="assets/globales/Utilidades.js"></script>
    <!-- --- --- END Globales --- --- --- -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Historial operaciones</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div id='myModalBody' class="modal-body">...</div>
          <div class="modal-footer" id='myModalFooter'>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Cerrar&nbsp;<i class="far fa-times-circle"></i>
            </button>
            <button type="button" class="btn btn-primary" id='btn-modal-guardar'>
              Guardar&nbsp;<i class="far fa-times-circle"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <?php
      if( !isset($_GET['action']) ){
        $oCalculadoraController->index();
        require_once $oCalculadoraController->sTemplateRender;
      }
    ?>
  </body>
</html>