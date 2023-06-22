<?php

require_once '../../../includes/conexion.php';

// CREAR USUARIO
if(!empty($_POST)) {//si el post es diferente de vacio
    //el post usa los names de los campos
    if(empty($_POST['emp_num']) || empty($_POST['nombre']) || empty($_POST['ap_paterno']) || empty($_POST['ap_materno']) || empty($_POST['curp']) || empty($_POST['rfc']) || empty($_POST['pass']) || empty($_POST['emp_grado']) || empty($_POST['emp_categoria']) || empty($_POST['emp_rol']) || empty($_POST['desc_grado']) || empty($_POST['Estado'])) {
        $respuesta = array('status' => false,'msg' => 'Todos los campos son necesarios');//respuesta del servidor json
    } else {
        $emp_num = $_POST['emp_num'];//aqui son los nombres de los campos de html
        $nombre = $_POST['nombre'];
        $ap_paterno = $_POST['ap_paterno'];
        $ap_materno = $_POST['ap_materno'];
        $fecha_naci = $_POST['fecha_nacimiento'];
        $curp_emp = $_POST['curp'];
        $rfc_emp = $_POST['rfc'];
        $email_emp = $_POST['emp_email'];
        $pass_emp = $_POST['pass'];
        $emp_grado = intval($_POST['emp_grado']);
        $emp_categoria = intval($_POST['emp_categoria']);
        $rol = intval($_POST['emp_rol']);
        $desc_grado = $_POST['desc_grado'];
        $status = intval($_POST['Estado']);

        $pass_emp = password_hash($pass_emp,PASSWORD_DEFAULT);//encriptamos la clave

        $sql = "SELECT * FROM empleados WHERE (email = ? || num_emp = ?)";//verificamos que el usuario no exista
        $query = $pdo->prepare($sql);
        $query->execute(array($email_emp,$emp_num));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result !=null) {
            $respuesta = array('status' => false, 'msg' => 'El Correo o numero de empleado ya existe');
        } else {
            
                $sql_insert = "INSERT INTO empleados (num_emp,nombre,ap_paterno,ap_materno,fecha_nac,curp,rfc,email,password,grado,categoria,id_rol,desc_grado,id_status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $query_insert = $pdo->prepare($sql_insert);
                $result_insert = $query_insert->execute(array($emp_num,$nombre,$ap_paterno,$ap_materno,$fecha_naci,$curp_emp,$rfc_emp,$email_emp,$pass_emp,$emp_grado,$emp_categoria,$rol,$desc_grado,$status));
                   
             
            if($result_insert) {//si hay registros
                
                    $respuesta = array('status' => true,'msg' => 'Usuario creado correctamente');
                } else {
                    $respuesta = array('status' => true,'msg' => 'Error al crear empleado');
                }   
            } 
        }
    }
    
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
   

