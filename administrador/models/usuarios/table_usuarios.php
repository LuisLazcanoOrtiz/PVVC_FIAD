<?php
include_once '../../../includes/conexion.php';


$sql="SELECT * FROM empleados, cat_nivel_acad ,empleados_categorias WHERE `id_status` != 0 AND empleados.grado = cat_nivel_acad.id_nivel AND empleados.categoria=empleados_categorias.idcategorias";
$query=$pdo->prepare($sql);
$query->execute();
$consulta= $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0;$i < count($consulta);$i++) {
    if($consulta[$i]['id_status']==1) {//compara el campo estado
        $consulta[$i]['id_status'] = '<span class="badge badge-success">Activo</span>';
    } else {
        $consulta[$i]['id_status'] = '<span class="badge badge-danger">Inactivo</span>';
    }

    $consulta[$i]['acciones'] = '<div class="text-center">
        <button class="btn btn-primary btn-sm btnEditUser" onclick="editarUsuario('.$consulta[$i]['num_emp'].')" title="Editar"><i class="fas fa-pencil-alt"></i>Editar</button>
        <button class="btn btn-danger btn-sm btnDelUser" onclick="editarUsuario('.$consulta[$i]['num_emp'].')" title="Eliminar"><i class="fas fa-trash-alt"></i>Eliminar</button>                   
                               </div>';
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);//envia los datos a function-usuarios en formato json
?>