<?php 
session_start();
if(!empty($_POST)){
    if(empty($_POST['login']) || empty($_POST['pass']) ){
        echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"></button>Todos los campos son necesarios</div>';
    }
    else {
        require_once 'conexion.php';
        //creamos las variables de la base de datos
        $login=$_POST['login'];
        $pass=$_POST['pass'];

        $sql= 'SELECT * FROM empleados,roles WHERE email= ? AND empleados.id_rol=roles.id_rol';
        $query= $pdo->prepare($sql);
        $query->execute(array($login));
        $result= $query->fetch(PDO::FETCH_ASSOC);//ARREGLO DE LA TABLA RETORNADA

        if($query->rowCount()>0){
           if(password_verify($pass,$result['password'])){//comparamos la clave ingresada con la de la tabla
 //if(strcmp($result['password'],$pass) === 0){
                if(strcmp($result['nombre_rol'],'admin') === 0){
                   //variables de sesion

                 if($result['id_status']==1)  {
                $_SESSION['active']=true;
                $_SESSION['id_usuario']=$result['num_emp'];
                $_SESSION['nombre']=$result['nombre'];
                $_SESSION['rol']=$result['id_rol'];
                $_SESSION['nombre_rol']=$result['nombre_rol'];
                $_SESSION['email']=$result['email'];
                echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"></button>Redirecting</div>';
                 }else{
                    echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"></button>Tu usuario esta inactivo, comuniquese con el administrador</div>';
                 }
                }else{
                    echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"></button>No eres admin</div>';
                }
                
            } else{
                echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"></button>Usuario o contraseña incorrectos</div>'. $result['email'];
                
            }
        }
        else{
            echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"></button>Usuario o clave incorrectos</div>';
        }
    } 

    
}

?>

