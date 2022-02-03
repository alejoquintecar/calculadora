
class Utilidades{

  constructor(){
  }

  /**
   * Elementos esperados en oConfig
   * icon, iconHtml -> estilo alerta
   * title, text, html -> texto alerta
   * timer -> tiempo alerta
  */
  swallAlert( oConfig ){
    let oConfigDefault = {
      icon: 'info',
      html: '',
      iconHtml: '<i class="fas fa-info-circle"></i>',
      timer: 7000,
      position: 'center',
      confirmButtonText: 'Ok',
      showCloseButton: true,
      timerProgressBar: true,
      showConfirmButton: true,
      onOpen: (toast) => {
        toast.addEventListener('mouseenter', swall.stopTimer),
        toast.addEventListener('mouseleave', swall.resumeTimer)
      }
    };
    Object.assign(oConfigDefault, oConfig);
    Swal.fire(oConfigDefault);
  }

  /**
   * Elementos esperados en oConfig
   * icon, iconHtml -> estilo alerta
   * title, text, html -> texto alerta
   * timer -> tiempo alerta
  */
  swallToast( oConfig ){
    let oConfigDefault = {
      icon: 'warning',
      html: '',
      iconHtml: '<i class="fas fa-info-circle"></i>',
      toast: true,
      timer: 6200,
      position: 'top-end',
      showCloseButton: true,
      timerProgressBar: true,
      showConfirmButton: false,
      onOpen: (toast) => {
        toast.addEventListener('mouseenter', swall.stopTimer),
        toast.addEventListener('mouseleave', swall.resumeTimer)
      }
    };
    Object.assign(oConfigDefault, oConfig);
    Swal.fire(oConfigDefault);
  }
}