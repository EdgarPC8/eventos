  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Administración de Usuarios</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="inicio">Incio</a></li>
                          <li class="breadcrumb-item active">Usuarios</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-square"></i> Nuevo Usuario</button>
              </div>
              <div class="card-body">
                  <!-- Modal para guardar datos -->
                  <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">Crear Usuario</h4>
                              </div>
                              <div class="modal-body">
                                  <form method="post">
                                      <div class="card-body">
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="text" class="form-control" name="crearNombres" id="crearNombres" placeholder="Ingrese los nombres" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="text" class="form-control" name="crearApellidos" id="crearApellidos" placeholder="Ingrese los apellidos" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="text" class="form-control" name="crearUsuario" id="crearUsuario" placeholder="Ingrese el nombre de usuario" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="password" class="form-control" name="crearContrasenia" id="crearContrasenia" placeholder="Ingrese la contraseña" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Guardar</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                              <?php
                                $objUsuario = new contraladorUsuario();
                                $objUsuario->ctrlGuardarUsuario();
                                ?>
                              </form>
                          </div>
                      </div>
                  </div>

                  <!-- Modal para editar datos -->
                  <div class="modal fade" id="myModalEditar" role="dialog">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">Editar Usuario</h4>
                              </div>
                              <div class="modal-body">
                                  <form method="post">
                                      <div class="card-body">
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="text" class="form-control" name="editarNombres" id="editarNombres" placeholder="Ingrese los nombres" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="text" class="form-control" name="editarApellidos" id="editarApellidos" placeholder="Ingrese los apellidos" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="text" class="form-control" name="editarUsuario" id="editarUsuario" placeholder="Ingrese el nombre de usuario" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="password" class="form-control" name="editarContrasenia" id="editarContrasenia" placeholder="Ingrese la contraseña" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                              </div>
                              <input type="hidden" name="id_usuario" id="id_usuario">
                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Editar</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                              <?php
                                $objUsuario->ctrlActualizarDatos();
                                ?>
                              </form>
                          </div>
                      </div>
                  </div>

                  <!-- Tabla para presentar los datos de usuario -->
                  <table id="tableUsuarios" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>NOMBRES</th>
                              <th>APELLIDOS</th>
                              <th>USUARIO</th>
                              <th>CONTRASEÑA</th>
                              <th>ACCIONES</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $dataUsuarios = $objUsuario->ctrlCargarDatos(true, 0);
                            foreach ($dataUsuarios as $key => $value) {
                            ?>
                              <tr>
                                  <td><?php echo $value["id_usuario"]; ?></td>
                                  <td><?php echo $value["nombres"]; ?></td>
                                  <td><?php echo $value["apellidos"]; ?></td>
                                  <td><?php echo $value["usuario"]; ?></td>
                                  <td>********</td>
                                  <td>
                                      <div class="btn-group">
                                          <button class="btn btn-warning"><i class="fas fa-edit editarUsuarioTabla" data-toggle="modal" data-target="#myModalEditar" id_usuarios="<?php echo $value["id_usuario"]; ?>"></i></button>
                                          <button class="btn btn-danger"><i class="fas fa-trash-alt eliminarUsuarioTabla" style="color: rgb(0, 0, 0);" id_usuarios="<?php echo $value["id_usuario"]; ?>"></i></button>
                                      </div>
                                  </td>
                              </tr>
                          <?php } ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>ID</th>
                              <th>NOMBRES</th>
                              <th>APELLIDOS</th>
                              <th>USUARIO</th>
                              <th>CONTRASEÑA</th>
                              <th>ACCIONES</th>
                          </tr>
                      </tfoot>
                  </table>
              </div>
              <!-- /.card-body -->

          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
