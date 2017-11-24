$(document).ready(function() {
/*
  $('li a').click(function(e) {
        e.preventDefault();
        $('a').removeClass('active');
        $(this).addClass('active');
    });
/*/
 $("#empleadosbtn").click(function() {
               
     
      $("#contenido").remove();
      $('body').append('<div id="contenido"></div>'); 
      $("#contenido").load('partesAdmin/formDetalleEmpleados.php');
      
          
});

 $("#cocherasbtn").click(function() {
               
     
      $("#contenido").remove();
      $('body').append('<div id="contenido"></div>'); 
      $("#contenido").load('partesAdmin/formDetalleCocheras.php');
      
          
});

 $("#autosbtn").click(function() {
               
     
      $("#contenido").remove();
      $('body').append('<div id="contenido"></div>'); 
      $("#contenido").load('partesAdmin/formDetalleAutos.php');
      
          
});

 $("#promediosbtn").click(function() {
               
     
      $("#contenido").remove();
      $('body').append('<div id="contenido"></div>'); 
      $("#contenido").load('partesAdmin/formPromedios.php');
      
          
});

 $("#pdfbtn").click(function() {
               
     location.href ="http://localhost/TPProgramcion-laboratorioIII2017/partesAdmin/formPdf.php";
     // $("#contenido").remove();
     // $('body').append('<div id="contenido"></div>'); 
     // $("#contenido").load('partesAdmin/formPdf.php');
      
          
});

 $("#btnbuscar").click(function() {
               
     $.ajax({

                   url:'partesAdmin/nexo.php',
                   type:'POST',
                   data:{operacion:"buscarreportes",nombreempleado: $('#nombreempleado').val(), desde: $('#fechaDesde').val(),hasta: $('#fechaHasta').val()},
                   async: true,
                   beforeSend: function () {
                             $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
                    },
                  success: function (dataRespuesta){
                    
                     $("#respuesta").html(dataRespuesta);
          
                  }

              });
           
          
});



 $("#btnbuscar2").click(function() {
               
     $.ajax({

                   url:'partesAdmin/nexo.php',
                   type:'POST',
                   data:{operacion:"buscarreportesporfecha",nombreempleado: $('#nombreempleado2').val(),fecha: $('#fecha2').val()},
                   async: true,
                   beforeSend: function () {
                             $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
                    },
                  success: function (dataRespuesta){
                    
                     $("#respuesta").html(dataRespuesta);
          
                  }

              });
           
          
});


 $("#btnalta").click(function() {
               
      $("#contenido").remove();
      $('body').append('<div id="contenido"></div>'); 
      $("#contenido").load('partesAdmin/formAltaEmpleados.php');
});

 $("#btnbaja").click(function() {
               
      $("#contenido").remove();
      $('body').append('<div id="contenido"></div>'); 
      $("#contenido").load('partesAdmin/formBajaEmpleados.php');
});

 $("#btnsuspender").click(function() {
               
      $("#contenido").remove();
      $('body').append('<div id="contenido"></div>'); 
      $("#contenido").load('partesAdmin/formSuspenderEmpleados.php');
});

//--------------------------FORM ALTA EMPLEADO------------------------------------
 //ALTA
 $("#btningresar").click(function(event) {
    event.preventDefault();
               
     nombre = $("#nombre").val();
     apellido = $("#apellido").val();
     fecha_creacion = $("#fecha_creacion").val();
     foto = $("#foto").val();
     usuario = $("#usuario").val();
     turno = $("#turno").val();
     clave = $("#clave").val();

     $.ajax({

             url:'partesAdmin/nexo.php',
             type:'POST',
             data:{operacion:"altaempleado",nombre: nombre, apellido: apellido, fecha_creacion: fecha_creacion, foto: foto, usuario: usuario, turno: turno, clave: clave},
             async: true,
             beforeSend: function () {
                        $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
              },
             success: function (dataRespuesta){
                    
                   $("#respuesta").html(dataRespuesta);
          
             }

     });


   
});
//BAJA


 $("#btnborrar").click(function(event) {
  event.preventDefault();
               
     usuario = $("#usuario").val();

     $.ajax({

             url:'partesAdmin/nexo.php',
             type:'POST',
             data:{operacion:"borrarempleado",usuario: usuario},
             async: true,
             beforeSend: function () {
                        $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
              },
             success: function (dataRespuesta){
                    
                   $("#respuesta").html(dataRespuesta);
          
             }

     });
   
});

//SUSPENDER

 $("#btnsuspender123").click(function() {
               
     usuario = $("#usuario").val();
     suspendido = $("#suspendido").val();


     $.ajax({

             url:'partesAdmin/nexo.php',
             type:'POST',
             data:{operacion:"suspenderempleado",usuario: usuario,suspendido: suspendido},
             async: true,
             beforeSend: function () {
                        $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
              },
             success: function (dataRespuesta){
                    
                   $("#respuesta").html(dataRespuesta);
          
             }

     });


   
});


 $("#btnbuscar3").click(function() {
               
     usuario = $("#nombremp").val();
     fecha = $("#fecha3").val();

     $.ajax({

             url:'partesAdmin/nexo.php',
             type:'POST',
             data:{operacion:"veroperaciones",usuario: usuario,fecha: fecha},
             async: true,
             beforeSend: function () {
                        $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
              },
             success: function (dataRespuesta){
                    
                   $("#respuesta").html(dataRespuesta);
          
             }

     });


   
});
 
//-------------------------END FORM ALTA EMPLEADO--------------------------------

//------------------------ FORM COCHERAS-----------------------------------

$("#btninfo").click(function() {
               
     fecha = $("#fecha").val();

     $.ajax({

             url:'partesAdmin/nexo.php',
             type:'POST',
             data:{operacion:"verinfoxfecha",fecha: fecha},
             async: true,
             beforeSend: function () {
                        $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
              },
             success: function (dataRespuesta){
                    
                   $("#respuesta").html(dataRespuesta);
          
             }

     });


   
});

$("#btninfo2").click(function() {
               
     fechaDesde = $("#fecha1").val();
     fechaHasta = $("#fecha2").val();

     $.ajax({

             url:'partesAdmin/nexo.php',
             type:'POST',
             data:{operacion:"verinfoxlapso",fechaDesde: fechaDesde,fechaHasta: fechaHasta},
             async: true,
             beforeSend: function () {
                        $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
              },
             success: function (dataRespuesta){
                    
                   $("#respuesta").html(dataRespuesta);
          
             }

     });


   
});

//------------------------END FORM COCHERAS-------------------------------
//-------------------------FORM AUTOS ESTACIONADOS------------------------
$("#btninfoestacionados").click(function() {
               
     fecha = $("#fecha").val();

     $.ajax({

             url:'partesAdmin/nexo.php',
             type:'POST',
             data:{operacion:"verinfoautosestacionados",fecha: fecha},
             async: true,
             beforeSend: function () {
                        $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
              },
             success: function (dataRespuesta){
                    
                   $("#respuesta").html(dataRespuesta);
          
             }

     });


   
});

$("#btninfoestacionados2").click(function() {
               
     fechaDesde= $("#fecha1").val();
     fechaHasta = $("#fecha2").val();

     $.ajax({

             url:'partesAdmin/nexo.php',
             type:'POST',
             data:{operacion:"verinfoautosestacionados2",fechaDesde: fechaDesde,fechaHasta:fechaHasta},
             async: true,
             beforeSend: function () {
                        $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
              },
             success: function (dataRespuesta){
                    
                   $("#respuesta").html(dataRespuesta);
          
             }

     });


   
});

//--------------------------END FORM AUTOS ESTACIONADOS------------------
});