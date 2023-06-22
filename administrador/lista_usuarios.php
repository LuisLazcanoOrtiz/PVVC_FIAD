<?php
require_once 'includes/header.php';
require_once 'includes/modals/modals.php';
?>


<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Lista de Usuarios</h1>
          <button class="btn btn-success" type="button" onClick="openModal()">Nuevo Usuario</button>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Lista de Usuarios</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="TableUsuarios" name="TableUsuarios">
                  <thead>
                    <tr>
                      <th>ACCIONES</th>
                      <th>ID Empleado</th>
                      <th>Nombre</th>
                      <th>Apellido Paterno</th>
                      <th>Email</th>
                      <th>Nivel Academico</th>
                      <th>Categoria</th>
                      <th>Rol</th>
                      <th>Estado</th>
                      <th>Tipo</th>
                    </tr>
                  </thead>
                  
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>



<?php
require_once 'includes/footer.php'
?>