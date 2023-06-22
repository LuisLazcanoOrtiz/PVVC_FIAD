 <!-- MODAL DE USUARIOS/DOCENTES -->
<div class="modal fade" id="ModalUsuarios" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="TituloModal">Nuevo Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form id="formUsuario" name="formUsuario">
         
      <div class="form-group">
            <label for="control-label" >Numero de empleado</label>
            <input type="number" class="form-control" name="emp_num" id="emp_num">
          </div>

          <div class="form-group">
            <label for="control-label" >Nombres:</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
          </div>
          
          <div class="form-group">
            <label for="control-label" >Apellido Paterno:</label>
            <input type="text" class="form-control" name="ap_paterno" id="ap_paterno">
          </div>

          <div class="form-group">
            <label for="control-label" >Apellido Materno:</label>
            <input type="text" class="form-control" name="ap_materno" id="ap_materno">
          </div>

          <div class="form-group">
            <label for="control-label" >Fecha Nacimiento:</label>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento">
          </div>

          <div class="form-group">
            <label for="control-label" >CURP</label>
            <input type="text" class="form-control" name="curp" id="curp">
          </div>

          <div class="form-group">
            <label for="control-label" >RFC</label>
            <input type="text" class="form-control" name="rfc" id="rfc">
          </div>

          <div class="form-group">
            <label for="control-label" >Email</label>
            <input type="email" class="form-control" name="emp_email" id="emp_email">
          </div>

          <div class="form-group">
            <label for="control-label" >Password</label>
            <input type="password" class="form-control" name="pass" id="pass">
          </div>
<!-- CODIGO PARA OBTENER LISTA DE GRADOS EN UN COMBO BOX CON MYSQL-->
          <div class="form-group">
            <label for="grado">Grado </label>
            <select class="form-control" name="emp_grado" id="emp_grado">
              <?php
              // Conexión a la base de datos
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "sistema_uabc";

              $conn = new mysqli($servername, $username, $password, $dbname);

              // Verificar la conexión
              if ($conn->connect_error) {
                  die("Error de conexión a la base de datos: " . $conn->connect_error);
              }

              // Obtener los valores de la base de datos
              $sql = "SELECT * FROM cat_nivel_acad";
              $result = $conn->query($sql);

              // Generar las opciones del combo box
              if ($result && $result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      $id_grado = $row["id_nivel"];
                      $grado = $row["descripcion_nivel_academico"];
                      echo "<option value='$id_grado'>$grado</option>";
                  }
              } else {
                  echo "<option value=''>No hay opciones disponibles</option>";
              }

              $conn->close();
              ?>
  </select>
</div>


              <!-- CODIGO PARA OBTENER LISTA DE CATEGORIAS DE EMPLEADOS EN UN COMBO BOX CON MYSQL-->
          <div class="form-group">
            <label for="grado">Categoria </label>
            <select class="form-control" name="emp_categoria" id="emp_categoria">
              <?php
              // Conexión a la base de datos
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "sistema_uabc";

              $conn = new mysqli($servername, $username, $password, $dbname);

              // Verificar la conexión
              if ($conn->connect_error) {
                  die("Error de conexión a la base de datos: " . $conn->connect_error);
              }

              // Obtener los valores de la base de datos
              $sql = "SELECT * FROM empleados_categorias";
              $result = $conn->query($sql);

              // Generar las opciones del combo box
              if ($result && $result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      $id_categorias_emp = $row["idcategorias"];
                      $descripcion = $row["descripcion_emp_categoria"];
                      echo "<option value='$id_categorias_emp'>$descripcion</option>";
                  }
              } else {
                  echo "<option value=''>No hay opciones disponibles</option>";
              }

              $conn->close();
              ?>
  </select>
</div>

               <!-- CODIGO PARA OBTENER los roles DE  EMPLEADOS EN UN COMBO BOX CON MYSQL-->
          <div class="form-group">
            <label for="grado">Rol </label>
            <select class="form-control" name="emp_rol" id="emp_rol">
              <?php
              // Conexión a la base de datos
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "sistema_uabc";

              $conn = new mysqli($servername, $username, $password, $dbname);

              // Verificar la conexión
              if ($conn->connect_error) {
                  die("Error de conexión a la base de datos: " . $conn->connect_error);
              }

              // Obtener los valores de la base de datos
              $sql = "SELECT * FROM roles";
              $result = $conn->query($sql);

              // Generar las opciones del combo box
              if ($result && $result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      $id_rol = $row["id_rol"];
                      $nombre_rol = $row["nombre_rol"];
                      echo "<option value='$id_rol'>$nombre_rol</option>";
                  }
              } else {
                  echo "<option value=''>No hay opciones disponibles</option>";
              }

              $conn->close();
              ?>
  </select>
</div>
            <!-- CODIGO PARA CAMPO DESC_GRADO-->
          <div class="form-group">
            <label for="control-label" >DESC_GRADO</label>
            <input type="text" class="form-control" name="desc_grado" id="desc_grado">
          </div>
           <!-- CODIGO PARA CAMPO STATUS-->
          <div class="form-group">
          <label for="Estado">Status</label>
          <select class="form-control" name="Estado" id="Estado">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
            <!-- Agrega más opciones aquí -->
          </select>
        </div>
         <!-- BOTONES -->
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" >Guardar</button>  <!-- type="submit" -->
      </div>
        </form>
     
      </div>
     
    </div>
  </div>
</div>