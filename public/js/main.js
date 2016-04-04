
var id="";
$(document).ready(function(){
      $('.obligatorio.corner.label').popup({
        popup : $('.custom.popup'),
        on    : 'click'
      });


    

    $('.addCliente').click(function(){
     	$('.addCliente').addClass('loading');
      });

    $('.eli').click(function(e){
    	var clasemodal='.ui.modal.modal'+this.classList[1];
     	$(clasemodal).modal('show');
    });

    $('.message .close')
      .on('click', function() {
        $(this).closest('.message').transition('fade');
      });

    $('#icon-movil').click(function(){
     	$('#menu-left').css('transform','translate3d(0%,0,0)');
      });


    $('.ui.dropdown')
      .dropdown({
       direction: 'downward'
      })
    ;

    $('.ui.accordion').accordion();

    $('a.item').click(function(e){
      //obtiene el id del item y lo guarda en el local storage
        localStorage.setItem("idItem",this.id);
    });

    // $('#tableClientes').DataTable();
});
window.onload = function(e){ 
  //busca el elemento con el query selector y remueve la clase "active"
  if (document.querySelector("a.item.active")!=null) {
    var ele=document.querySelector("a.item.active").classList.remove("active");
    //obtiene el elemento con con el nombre  que esta almacenado en el local storage
    //y le agrega la clase "ative"
    document.getElementById(localStorage.getItem("idItem")).classList.add("active");
    localStorage.removeItem("idItem");
  }else{
    document.getElementById(localStorage.getItem("idItem")).classList.add("active");
    localStorage.removeItem("idItem");
  }
}

