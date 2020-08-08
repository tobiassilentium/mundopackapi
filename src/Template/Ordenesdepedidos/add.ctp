<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ordenesdepedido $ordenesdepedido
 */
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Nueva orden de Pedido</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Nueva orden de Pedido</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">ORDEN DE PEDIDO N° 18</h3>
          </div>
          <!-- /.card-header -->
          <form>
          <div class="card-body">
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label>Selecciones un cliente:</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Pepe</option>
                    <option>Juan</option>
                    <option>Augusto</option>
                    <option>Luis</option>
                    <option>Tobias</option>
                    <option>Flor</option>
                    <option>Rosario</option>
                    <option>Antonia</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Medio de comunicación:</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">E-mail</option>
                    <option>Celular</option>
                    <option>Teléfono</option>
                    <option>Otro</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Fecha:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">AGREGAR ORDEN DE TRABAJO</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-sm-2">
                      <label for="">Cantidad:</label>
                      <input type="number" class="form-control" name="" value="">
                    </div>
                    <div class="col-sm-3">
                      <label for="">Material:</label>
                      <select class="form-control" name="">
                        <option value="" selected></option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <label for="">Tipo:</label>
                      <input type="text" class="form-control" name="" value="">
                    </div>
                    <div class="col-sm-2">
                      <label for="">Color:</label>
                      <input type="text" class="form-control" name="" value="">
                    </div>
                    <div class="col-sm-3">
                      <label for="">Fuelle:</label>
                      <input type="text" class="form-control" name="" value="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-2">
                      <label for="">Medida:</label>
                      <input type="text" class="form-control" name="" value="">
                    </div>
                    <div class="col-sm-2">
                      <label for="">Perf:</label>
                      <input type="text" class="form-control" name="" value="">
                    </div>
                    <div class="col-sm-3">
                      <label for="">Imp:</label>
                      <input type="text" class="form-control" name="" value="">
                    </div>
                    <div class="col-sm-5">
                      <label for="">Observación:</label>
                      <input type="text" class="form-control" name="" value="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12 text-center" style="margin-top:15px">
                      <button type="button" name="button" class="btn btn-primary"><i class="fas fa-search"></i> BUSCAR</button>
                      <button type="button" name="button" class="btn btn-success"><i class="fas fa-plus"></i> AGREGAR</button>
                      <button type="button" name="button" class="btn btn-danger"><i class="fas fa-trash"></i> QUITAR</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>

            <div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Órdenes de trabajo cargadas:</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Cant.</th>
              <th>Material</th>
              <th>Tipo</th>
              <th>Color</th>
              <th>Fuelle</th>
              <th>Medida</th>
              <th>Perf.</th>
              <th>Imp.</th>
              <th>Obs.</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>X</td>
              <td>Y</td>
              <td>Cualquiera</td>
              <td>ZZZ</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
            </tr>
            <tr>
              <td>X</td>
              <td>Y</td>
              <td>Cualquiera</td>
              <td>ZZZ</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
            </tr><tr>
              <td>X</td>
              <td>Y</td>
              <td>Cualquiera</td>
              <td>ZZZ</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
            </tr><tr>
              <td>X</td>
              <td>Y</td>
              <td>Cualquiera</td>
              <td>ZZZ</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
            </tr><tr>
              <td>X</td>
              <td>Y</td>
              <td>Cualquiera</td>
              <td>ZZZ</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
            </tr><tr>
              <td>X</td>
              <td>Y</td>
              <td>Cualquiera</td>
              <td>ZZZ</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
            </tr><tr>
              <td>X</td>
              <td>Y</td>
              <td>Cualquiera</td>
              <td>ZZZ</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
            </tr><tr>
              <td>X</td>
              <td>Y</td>
              <td>Cualquiera</td>
              <td>ZZZ</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
            </tr><tr>
              <td>X</td>
              <td>Y</td>
              <td>Cualquiera</td>
              <td>ZZZ</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
              <td>123</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<!-- /.row -->

          <div class="row">
            <div class="col-12 text-center">
              <button type="button" name="button" class="btn btn-secondary"><i class="fas fa-save"></i> GUARDAR</button>
            </div>
          </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
$(function () {
  $('#reservationdate').datetimepicker({
        format: 'L',
        locale: 'es'
    });
  $('.select2').select2()
});
</script>
