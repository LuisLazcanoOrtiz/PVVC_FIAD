<?php

require_once '../../../includes/conexion.php';

// CREAR USUARIO
if(!empty($_GET)) {//si el post es diferente de vacio
   
        $idusuario = $_GET['idusuario'];
        

        $sql = "SELECT * FROM empleados WHERE num_emp = ?";//verificamos que el usuario no exista
        $query = $pdo->prepare($sql);
        $query->execute(array($idusuario));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if(empty($result)) {
            $respuesta = array('status' => false, 'msg' => 'datos no encontrados');
        } else {
                $respuesta = array('status' => true, 'data' => $result);//retorna los datos al archivo usuarios.js del usuario si se encuentra el usuario
            } 
        }
    
    
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);

    ?>