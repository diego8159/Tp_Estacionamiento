$(document).ready(function() {

    $('body').css('background', '#cee3f6');

    $("#entrarbtn").click(function() {
    
       $.ajax({

            url:'validarLogin.php',
            type:'POST',
            data:{usuario: $('#usuario').val(), password: $('#clave').val() , error: 'false',cookies: $('#recordarme').is(':checked')}, 
            async: true,
            beforeSend: function () {
                      
                        $("#respuesta").html("<img src='imagenes/spinner.gif'>"); 
            },
            success: function (dataRespuesta){
                        
                if(dataRespuesta == 'error')
                {
                    $("#respuesta").html("<b class= 'alert alert-danger'>No se pudo iniciar sesion,verifique los datos!.</b>");           
                }
                else{
                    window.location.href= "index.php";
                }
            }
        })
    });

        $("#resetbtn").click(function() {
        $('#usuario').val("");
        $('#clave').val("");
        $('#respuesta').empty(); 
        });

        $("#testUsuarioBTN").click(function() {
        $('#usuario').val("empleado1");
        $('#clave').val("1234");
        $('#respuesta').empty(); 
        });

        $("#testAdminBTN").click(function() {
        $('#usuario').val("admin");
        $('#clave').val("1234");
        $('#respuesta').empty(); 
        });
});

