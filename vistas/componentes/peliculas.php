  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Administración de Películas</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href=inicio">Incio</a></li>
                          <li class="breadcrumb-item active">Peliculas</li>
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
                  <!-- Trigger the modal with a button -->
                  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-square"></i> Nueva Película</button>


              </div>
              <div class="card-body">
                  <!-- Modal para guardar datos -->
                  <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">

                                  <h4 class="modal-title">Crear Película</h4>
                              </div>
                              <div class="modal-body">
                                  <form method="post">
                                      <div class="card-body">
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="text" class="form-control" name="crearPelicula" id="crearPelicula" placeholder="Ingrese el nombre de la película" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <select name="crearGenero" id="crearGenero" class="form-control" required>
                                                          <option value="0">[Seleccione un género]</option>
                                                          <?php
                                                            $objGeneroPeliculas = new ControladorGeneroPeliculas();
                                                            $dataGeneroPelucilas = $objGeneroPeliculas->cargarGeneroPelulas();
                                                            
                                                            foreach ($dataGeneroPelucilas as $key => $value) {
                                                                
                                                            ?>

                                                              <option value="<?php echo $value["id_genero"];  ?>"><?php echo $value["nombres"];  ?></option>

                                                          <?php } ?>
                                                      </select>

                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-photo-video"></i></span>
                                                      </div>
                                                  </div>
                                              </div>

                                          </div>
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <select name="crearLenguaje" id="crearLenguaje" class="form-control" required>
                                                          <option value="0">[Seleccione el lenguaje]</option>
                                                          <option value="Español">Español</option>
                                                          <option value="Castellano">Castellano</option>
                                                          <option value="Ingles">Ingles</option>
                                                          <option value="Frances">Frances</option>
                                                      </select>

                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="text" class="form-control" name="crearActor" id="crearActor" placeholder="Ingrese nombre de actor" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-person-booth"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="number" class="form-control" name="crearAnio" id="crearAnio" placeholder="2026" max="2040" min="1900" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <select name="crearDoblado" id="crearDoblado" class="form-control" required>
                                                          <option value="0">[Seleccione]</option>
                                                          <option value="SI">SI</option>
                                                          <option value="No">No</option>

                                                      </select>

                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
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
                                $objPelicula  = new ControladorPersona();
                                $objPelicula->ctrlGuardarPersona();
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

                                  <h4 class="modal-title">Editar Película</h4>
                              </div>
                              <div class="modal-body">
                                  <form method="post">
                                      <div class="card-body">
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="text" class="form-control" name="editarPelicula" id="editarPelicula" placeholder="Ingrese el nombre de la película" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <select name="editarGenero" id="editarGenero" class="form-control" required>
                                                          <option value="0">[Seleccione un género]</option>
                                                          <?php
                                                            $objGeneroPeliculas = new ControladorGeneroPeliculas();
                                                            $dataGeneroPelucilas = $objGeneroPeliculas->cargarGeneroPelulas();
                                                            
                                                            foreach ($dataGeneroPelucilas as $key => $value) {
                                                                
                                                            ?>

                                                              <option value="<?php echo $value["id_genero"];  ?>"><?php echo $value["nombres"];  ?></option>

                                                          <?php } ?>
                                                      </select>

                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-photo-video"></i></span>
                                                      </div>
                                                  </div>
                                              </div>

                                          </div>
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <select name="editarLenguaje" id="editarLenguaje" class="form-control" required>
                                                          <option value="0">[Seleccione el lenguaje]</option>
                                                          <option value="Español">Español</option>
                                                          <option value="Castellano">Castellano</option>
                                                          <option value="Ingles">Ingles</option>
                                                          <option value="Frances">Frances</option>
                                                      </select>

                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="text" class="form-control" name="editarActor" id="editarActor" placeholder="Ingrese nombre de actor" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-person-booth"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="number" class="form-control" name="editarAnio" id="editarAnio" placeholder="2026" max="2040" min="1900" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <select name="editarDoblado" id="editarDoblado" class="form-control" required>
                                                          <option value="0">[Seleccione]</option>
                                                          <option value="SI">SI</option>
                                                          <option value="No">No</option>

                                                      </select>

                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>

                              </div>
                              <input type="hidden" name="id_pelicula" id="id_pelicula">

                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Editar</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                              <?php
                                $objPelicula->ctrlActualizarDatos();
                                ?>
                              </form>
                          </div>
                      </div>
                  </div>

                  <!-- Tabla para presentar los datos de película -->
                  <table id="tablePeliculas" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>NOMBRE</th>
                              <th>GÉNERO</th>
                              <th>LENGUAJE</th>
                              <th>ACTOR</th>
                              <th>AÑO</th>
                              <th>DOBLADA</th>
                              <th>ACCIONES</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $dataPeliculas = $objPelicula->ctrlCargarDatos(true,0);
                            foreach ($dataPeliculas as $key => $value) {
                            ?>
                              <tr>
                                  <td><?php echo $value["id_pelicula"];  ?></td>
                                  <td><?php echo $value["nombre"];  ?></td>
                                  <td><?php echo $value["genero"];  ?></td>
                                  <td><?php echo $value["lenguaje"];  ?></td>
                                  <td><?php echo $value["actor"];  ?></td>
                                  <td><?php echo $value["anio"];  ?></td>
                                  <td><?php echo $value["doblada"];  ?></td>
                                  <td>
                                      <div class="btn-group">
                                          <button class="btn btn-warning"><i class="fas fa-edit editarPeliculaTabla" data-toggle="modal" data-target="#myModalEditar" id_peliculas= "<?php echo $value["id_pelicula"]; ?>"></i></button>
                                          <button class="btn btn-danger"><i class="fas fa-trash-alt eliminarPeliculaTabla" style="color: rgb(0, 0, 0);" id_peliculas= "<?php echo $value["id_pelicula"]; ?>"></i></button>
                                      </div>
                                  </td>
                              </tr>
                          <?php }  ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>ID</th>
                              <th>NOMBRE</th>
                              <th>GÉNERO</th>
                              <th>LENGUAJE</th>
                              <th>ACTOR</th>
                              <th>AÑO</th>
                              <th>DOBLADA</th>
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