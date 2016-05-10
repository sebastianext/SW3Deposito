$(document).ready(function(){
    

    $('#aceptar').click(function(){
      var token=$('#token').val();
      var route='http://localhost:8000/venta';

      var total=$('.total').text();
      var cliente=$('select[name=cliente_id]').val();
      var productoss='[';
      // var cantidades='[';
      

      
      
      var prodError='';
      var filas=$('.productosVenta tr');

      for (var i = 0; i<filas.length; i++) {
     
          var coma='';
          var clase=filas[i].className;
          var disponibles=parseInt(filas[i].cells[1].innerText);
          var cant=parseInt($('.campoCant'+clase).val());
          if(cant>disponibles){
            prodError+='<li>La cantidad del producto <b>'+filas[i].cells[0].innerText+'</b> excede la cantidad disponible</li>';
          }
      
      }
      if(prodError==''){
            var coma='';
            $( ".prodHidden" ).each(function( index, element )  {
                  var clase=".campoCant"+$(this).val();
                  productoss+=coma+'{"id":"'+$(this).val()+'","cant":"'+$(clase).val()+'"}';
                  coma=',';
                  
            });
            productoss+=']';

            $.ajax({
              url:route,
              headers:{
                'X-CSRF-TOKEN':token
              },
              type:'POST',
              dataType:'json',
              data:{
                'cliente':cliente,
                'total':total,
                'productos':productoss
              },
              success:function(){
                console.log("entro al success");
                alert('hola');
                
                window.location="{{URL::to('http://localhost:8000/venta')}}";
              }

            });
            window.location.href ="http://localhost:8000/venta";
      }else{
        $('#mensajeError').html("<div class='ui error floating  message'><div class='header'>Error!.</div><div>"+
        "<ul class='list'>"+prodError+"</ul></div></div>");
      }
      

    });  
});
