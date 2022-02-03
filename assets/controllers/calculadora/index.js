
var oModal = new bootstrap.Modal(document.getElementById('myModal'), { keyboard: false });
let aConfigNumMask = { mask: 'num', blocks: {
  num: { mask: Number, min: 0, max: 99999999999, thousandsSeparator: '.' }
}};
let oConfigNumUnoMask = IMask(document.getElementById('num-uno'), aConfigNumMask);
let oConfigNumDosMask = IMask(document.getElementById('num-dos'), aConfigNumMask);

// var oSwall = require('sweetalert2');

$(document).ready(function(){

  let oUtilidades = new Utilidades();
  // oUtilidades.swallAlert({
  //   icon: 'success',
  //   html: 'success',
  //   confirmButtonText: 'Continuar'
  // });

  $("#btn-historial").on('click', function (e){
    // $('.modal-dialog').addClass('modal-xl');
    $.ajax({
      url: 'templates/index.php?action=getOperaciones',
      // data: ,
      type: 'post',
      beforeSend: function(){

      },
      success: function(data){

        let sHtmlTable = '<table class="table table-sm">';
        sHtmlTable += '<thead>';
        sHtmlTable += '<tr>';
        sHtmlTable += '<th>Núm Uno</th>';
        sHtmlTable += '<th>Núm Dos</th>';
        sHtmlTable += '<th>Operación</th>';
        sHtmlTable += '<th>Resultado</th>';
        sHtmlTable += '</tr>';
        sHtmlTable += '</thead>';
        $.each( data.data, function (indexInArray, item ){
          sHtmlTable += '<tbody>';
          sHtmlTable += '<tr>';
          sHtmlTable += '<td>'+item.num_uno+'</td>';
          sHtmlTable += '<td>'+item.num_dos+'</td>';
          sHtmlTable += '<td>'+item.operacion+'</td>';
          sHtmlTable += '<td>'+item.resultado+'</td>';
          sHtmlTable += '</tr>';
          sHtmlTable += '</tbody>';
        });
        sHtmlTable += '</table>';
        $('#myModalBody').empty().append(sHtmlTable);
      },
      error: function(data){
        console.log( 'error cargarNuevosMensajes', data );
        $('#loading').hide();
      }
    });
    oModal.show();
  });

  // Limpiar formulario
  $("#btn-limpiar").on('click', function (e){
    oConfigNumUnoMask.value = '';
    oConfigNumDosMask.value = '';
    $('#num-operacion').val('');
    $('#num-resultado').val('Resultado');
  });




  $("#form-calculadora").submit(function (e) {

    let nTotal = 0;
    let bGuardar = true;
    let oNumUno = $('#num-uno');
    let oNumDos = $('#num-dos');
    let nNumUno = parseInt(oNumUno.val().replace( /[$\.]/g, ''));
    let nNumDos = parseInt(oNumDos.val().replace( /[$\.]/g, ''));
    let oNumOperacion = $('#num-operacion');

    console.log(nNumUno);
    console.log(nNumDos);

    switch( oNumOperacion.val() ){
      case 'sumar':
        nTotal = nNumUno+nNumDos;
        break;
      case 'restar':
        nTotal = nNumUno-nNumDos;
        break;
      case 'multiplicar':
        nTotal = nNumUno*nNumDos;
        break;
      case 'dividir':

        if( nNumUno == 0 && nNumDos == 0 ){
          oUtilidades.swallToast({
            icon: 'warning',
            html: 'No se puede dividir entre cero'
          });
          bGuardar = false;
        }else if( nNumDos == 0 ){
          oUtilidades.swallToast({
            icon: 'warning',
            html: 'No se puede dividir entre cero'
          });
          bGuardar = false;
        }else{
          nTotal = nNumUno/nNumDos;
        }
        break;
    }

    $.ajax({
      url: 'templates/index.php?action=guardar',
      data: $('#form-calculadora').serialize(),
      type: 'post',
      beforeSend: function(){

      },
      success: function(data){

        oUtilidades.swallToast({
          icon: ( data.status == 1 ) ? 'success':'warning',
          html: data.message,
          confirmButtonText: 'OK'
        });
        $('#num-resultado').val(data.resultado);
      },
      error: function(data){
        console.log( 'error cargarNuevosMensajes', data );
        $('#loading').hide();
      }
    });
    return false;
  });

});