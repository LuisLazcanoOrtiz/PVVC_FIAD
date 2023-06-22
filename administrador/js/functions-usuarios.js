$('#TableUsuarios').DataTable();//llamamos al dataTable
var tableusuarios;
document.addEventListener('DOMContentLoaded',function(){
tableusuarios=$('#TableUsuarios').DataTable({

    "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": "./models/usuarios/table_usuarios.php",//link que envia como dato un objeto json
            "dataSrc":""
        },
        "columns": [//poner campos justo como en la base de datos
            {"data":"acciones"},
            {"data":"num_emp"},
            {"data":"nombre"},
            {"data":"ap_paterno"},
            {"data":"email"}, 
            {"data":"descripcion_nivel_academico"},
            {"data":"descripcion_emp_categoria"},
            {"data":"id_rol"},
            {"data":"id_status"},
            {"data":"tipo"}  
        ],
        "resonsieve": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0,"asc"]]
});
//desde aqui empieza el codigo para insertar registros 
var formUsuario=document.querySelector('#formUsuario');
formUsuario.onsubmit = function(e){//esto sucedera al hacer submit en el form
    e.preventDefault();//evita que se recargue la pagina

    //EXTRAEMOS LOS DATOS DEL FORMULARIO
    var numero_empleado = document.querySelector('#emp_num').value;
    var nombres = document.querySelector('#nombre').value;
    var ap_paterno = document.querySelector('#ap_paterno').value;
    var ap_materno = document.querySelector('#ap_materno').value;
    var fecha_nac = document.querySelector('#fecha_nacimiento').value;
    var curp_usuarios = document.querySelector('#curp').value;
    var rfc_usuario = document.querySelector('#rfc').value;
    var email_usuario = document.querySelector('#emp_email').value;
    var password = document.querySelector('#pass').value;
    var emp_grado = document.querySelector('#emp_grado').value;
    var emp_categoria = document.querySelector('#emp_categoria').value;
    var id_rol = document.querySelector('#emp_rol').value;
    var desc_grado = document.querySelector('#desc_grado').value;
    var estado_usuario = document.querySelector('#Estado').value;

    //COMPROBAMOS SI LOS DATOS VIENEN VACIOS
    if(numero_empleado== '' || nombres=='' || ap_paterno=='' || ap_materno=='' || fecha_nac=='' || curp_usuarios=='' || rfc_usuario=='' || email_usuario==''  || emp_grado=='' || emp_categoria=='' || id_rol=='' || desc_grado=='' || estado_usuario==''){
        swal("Atencion","Todos los campos son necesarios","error");//notificacion de error
        return false;
    }
    
    //implementamos el metodo de request 
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'); //XMLHttpRequest() es para nuevos navegadores ActiveXObject('Microsoft.XMLHTTP') es para viejos navegadores
    var ajaxUrl = './models/usuarios/ajax-usuarios.php';//creamos el archivo que se comunicara con la base de datos y dara respuesta al usuario
    var form = new FormData(formUsuario); //se enviarian los datos del formulario de manera encapsulada
    request.open('POST',ajaxUrl,true);//metodo de envio de los datos al archivo correspondiente
    request.send(form);//se envian los datos 

    request.onreadystatechange = function() {
        if(request.readyState == 4 && request.status == 200) { // 4 significa que  todos los datos son correctos y 200 significa que todo esta bien
            var objData = JSON.parse(request.responseText); //se almacenan los datos en un json
            if(objData.status) {
                $('#ModalUsuarios').modal('hide');// se oculta el modal si todo esta bien
                formUsuario.reset();//se resetea el formulario 
                swal('Usuario',objData.msg,'success');
                tableusuarios.ajax.reload();//se actualiza la tabla
            } else {
                swal('Atencion',objData.msg,'error');
            }
        }
    }


}
})
//creamos funcion para abrir modals
function openModal() {
    $('#ModalUsuarios').modal('show');
}

function editarUsuario(id){
var idusuario=id;
 //implementamos ajax 
 var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'); //XMLHttpRequest() es para nuevos navegadores ActiveXObject('Microsoft.XMLHTTP') es para viejos navegadores
 var ajaxUrl = './models/usuarios/edit-usuarios.php?idusuario='+idusuario;//creamos el archivo que se comunicara con la base de datos y dara respuesta al usuario
 request.open('GET',ajaxUrl,true);//metodo de envio de los datos al archivo correspondiente
 request.send();//se envian los datos 
 request.onreadystatechange = function() {
     if(request.readyState == 4 && request.status == 200) { // 4 significa que  todos los datos son correctos y 200 significa que todo esta bien
         var objData = JSON.parse(request.responseText); //se almacenan los datos en un json
         if(objData.status) {
            document.querySelector('#emp_num').value=objData.data.num_emp; //objdata: es creado en esta funcion , data: data retornado en edit-usuarios.php , num_emp : nombre del campo en bd
            document.querySelector('#nombre').value=objData.data.nombre;
            document.querySelector('#ap_paterno').value=objData.data.ap_paterno;
            document.querySelector('#ap_materno').value=objData.data.ap_materno;
            document.querySelector('#fecha_nacimiento').value=objData.data.fecha_nac;
            document.querySelector('#curp').value=objData.data.curp;
            document.querySelector('#rfc').value=objData.data.rfc;
            document.querySelector('#emp_email').value=objData.data.email;
            //document.querySelector('#pass').value=objData.data.password;
            document.querySelector('#emp_grado').value=objData.data.grado;
            document.querySelector('#emp_categoria').value=objData.data.categoria;
            document.querySelector('#emp_rol').value=objData.data.id_rol;
            document.querySelector('#desc_grado').value=objData.data.desc_grado;
            document.querySelector('#Estado').value=objData.data.id_status;
            //llamamos al modal
            $('#ModalUsuarios').modal('show');
         } else {
             swal('Atencion',objData.msg,'error');
         }
     }
 }
}