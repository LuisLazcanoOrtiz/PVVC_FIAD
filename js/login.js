$(document).ready(function(){//cuando el documento este listo se ejecuta una funcion
  $('#loginUsuario').on('click',function() {
    loginUsuario();
  });
  $('#loginProfesor').on('click',function() {
    loginProfesor();
  });
})
//funciones que se ejecutaran al hacer click
function loginUsuario() {
    //variables de los campos
    var login=$('#usuario').val();// se obtiene valores mediante el id
    var pass=$('#pass').val();

    $.ajax({
        url: './includes/loginUsuario.php',
        method: 'POST',//metodo de envio
        data: {//datos a recibir
            login:login,//login 'nombre de variable a enviar': login 'variable definida en el script'
            pass:pass
        },
        success: function(data){//data son los datos recibidos del archivo login.php
        $('#messageUsuario').html(data);
        if(data.indexOf('Redirecting') >=0){//devuelve un indice
          window.location= 'administrador/';
        }
        }
    })
}

function loginProfesor() {
    //variables de los campos
    var login=$('#usuarioProfesor').val();// se obtiene valores mediante el id
    var pass=$('#passProfesor').val();

    $.ajax({
        url: './includes/loginProfesor.php',
        method: 'POST',//metodo de envio
        data: {//datos a recibir
            loginProfesor:login,
            passProfesor:pass
        },
        success: function(data){//data son los datos recibidos del archivo login.php
        $('#messageProfesor').html(data);
        if(data.indexOf('Redirecting')>=0){//devuelve un indice
          window.location='profesor/';
        }
        }
    })
}