<!-- Content Header (Page header) -->
<div class="content-header pb-1">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h2 class="m-0 fw-bold">ADMINISTRAR COMPRAS</h2>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active">Administrar Compras</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">

  <div class="container-fluid">

    <ul class="nav nav-tabs" id="tabs-compras-intentario-productos" role="tablist">

      <li class="nav-item">
        <a class="nav-link" id="content-perfiles-tab" data-bs-toggle="pill" href="#content-perfiles" role="tab"
          aria-controls="content-perfiles" aria-selected="false">Perfiles</a>
      </li>
      <!-- TAB REGISTRO DE COMPRAS -->
      <li class="nav-item">
        <a class="nav-link  my-0" id="registrar-compras-tab" data-toggle="pill" href="#registrar-compras" role="tab"
          aria-controls="registrar-compras" aria-selected="false"><i class="fas fa-file-signature"></i>
          Registrar Compra</a>
      </li>
      <!-- TAB LISTADO DE COMPRAS  -->
      <li class="nav-item">
        <a class="nav-link active my-0" id="listado-compras-tab" data-toggle="pill" href="#listado-compras" role="tab"
          aria-controls="listado-compras" aria-selected="true"><i class="fas fa-list"></i> Listado de
          Compras</a>
      </li>
    </ul>

    <div class="tab-content" id="tabsContent-compras-intentario-productos">

      <div class="tab-pane fade mt-4 px-4" id="content-perfiles" role="tabpanel" aria-labelledby="content-modulos-tab">
        <h4>Administrar Pefiles</h4>
      </div>

      <div class="tab-pane fade mt-4 px-4" id="registrar-compras" role="tabpanel" aria-labelledby="content-modulos-tab">
        <!-- --------------------------------------------------------- -->
        <!-- COMPROBANTE DE PAGO -->
        <!-- --------------------------------------------------------- -->
        <form id="frm-datos-registro-compras" class="needs-validation-registro-compras" novalidate>

          <input type="hidden" name="id_compra" id="id_compra" value="0">

          <div class="row mb-2">

            <!-- RUC PROVEEDOR -->
            <div class="col-12 col-md-5 col-lg-3">

              <div class="input-group mb-3">

                <div class="form-floating flex-grow-1">
                  <input class="mx-0" type="hidden" name="id_proveedor" id="id_proveedor" value="0">
                  <input type="text" class="form-control " name="proveedor" id="proveedor" required>
                  <label for="proveedor">RUC</label>
                  <div class="invalid-feedback">Ingrese al Proveedor </div>
                </div>

                <span class="input-group-text my-bg btnBuscarProveedor" style="cursor: pointer;max-height: 59px"
                  style="position: absolute">
                  <i class="fas fa-search fs-5 text-white  "></i>
                </span>

              </div>

            </div>

            <!-- RAZON SOCIAL PROVEEDOR -->
            <div class="col-12 col-md-7 col-lg-6">
              <div class="form-floating mb-2" style="position: relative;">
                <input type="text" id="razon_social" class="form-control" name="razon_social" readonly required>
                <label for="razon_social">Razón Social </label>
              </div>
            </div>

            <!-- FECHA DE COMPRA -->
            <div class="col-12 col-md-4 col-lg-3">
              <div class="input-group mb-3">

                <div class="form-floating flex-grow-1">
                  <input type="text" class="form-control form-control-sm datetimepicker-input" id="fecha_registro"
                    name="fecha_registro" required>
                  <label for="fecha_registro">Fecha Registro</label>
                  <div class="invalid-feedback">Ingrese Fecha de Registro</div>
                </div>
                <span class="input-group-text my-bg">
                  <i class=" fas fa-calendar-alt text-white fs-5" data-toggle="datetimepicker"
                    data-target="#fecha_registro"></i>
                </span>
              </div>
            </div>

            <!-- TIPO COMPROBANTE -->
            <div class="col-12 col-md-4 col-lg-3">
              <div class="form-floating mb-2">
                <select class="form-select select2" id="tipo_comprobante" name="tipo_comprobante"
                  aria-label="Floating label select example" required>
                </select>
                <label for="serie">Tipo de Comprobante</label>
                <div class="invalid-feedback">Seleccione Tipo de Comprobante</div>
              </div>
            </div>

            <!-- SERIE -->
            <div class="col-12 col-md-4 col-lg-3">
              <div class="form-floating mb-2">
                <input type="text" id="serie" class="form-control text-uppercase" maxlength="4" name="serie" required>
                <label for="serie">Serie</label>
                <div class="invalid-feedback">Ingrese la serie</div>
              </div>
            </div>

            <!-- CORRELATIVO -->
            <div class="col-12 col-md-4 col-lg-3">
              <div class="form-floating mb-2">
                <input type="number" id="correlativo" class="form-control" maxlength="8" name="correlativo" required>
                <label for="correlativo">Correlativo *(Referencial)</label>
                <div class="invalid-feedback">Ingrese el correlativo</div>
              </div>
            </div>

            <!-- MONEDA -->
            <div class="col-12 col-md-4 col-lg-3">
              <input type="hidden" name="simbolo_moneda" id="simbolo_moneda" value="">
              <div class="form-floating mb-2">
                <select class="form-select select2" id="moneda" name="moneda" aria-label="Floating label select example"
                  required>
                </select>
                <label for="moneda">Moneda</label>
                <div class="invalid-feedback">Seleccione la moneda</div>
              </div>
            </div>

            <!-- BUSCAR PRODUCTO -->
            <div class="col-12 col-md-6 col-lg-3 my-lg-3">
              <!-- <a class="btn btn-info  w-100 rounded btnBuscarProducto">
                                            BUSCAR PRODUCTOS
                                            <i class="fas fa-search fs-5 mx-2"></i>
                                        </a> -->

              <a class="btn btn-info w-100 fw-bold btnBuscarProducto" style="position: relative;">
                <span class="text-button">BUSCAR PRODUCTOS</span>
                <span class="btn fw-bold icon-btn-custom">
                  <i class="fas fa-search fs-5"></i>
                </span>
              </a>
            </div>

            <!-- BOTONES: CANCELAR - GUARDAR -->
            <div class="col-lg-9 text-right mt-3 ">
              <a class="btn btn-danger w-25 fw-bold" id="btnCancelarCompra" style="position: relative;">
                <span class="text-button">CANCELAR</span>
                <span class="btn fw-bold icon-btn-danger">
                  <i class="fas fa-times-circle fs-5"></i>
                </span>
              </a>

              <a class="btn btn-success w-25 fw-bold" id="btnGuardarCompra" style="position: relative;">
                <span class="text-button">GUARDAR</span>
                <span class="btn fw-bold icon-btn-success">
                  <i class="fas fa-save fs-5"></i>
                </span>
              </a>
            </div>

          </div>

        </form>

        <!-- --------------------------------------------------------- -->
        <!--LISTADO DE PRODUCTOS -->
        <!-- --------------------------------------------------------- -->
        <div class="row mb-3">

          <!--LISTADO DE PRODUCTOS COMPRADOS -->
          <div class="col-md-12">
            <table id="tbl_ListadoProductos" class="table  w-100 shadow border border-secondary">
              <thead class="bg-main text-left">
                <th></th>
                <th>Cod Producto</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Cantidad Temp</th>
                <th>Costo Unit.</th>
                <th>Costo Unit. Temp</th>
                <th>Descuento</th>
                <th>Descuento Temp</th>
                <th>SubTotal</th>
                <th>Impuesto</th>
                <th>Total</th>
                <th>Tipo Afectacion</th>
                <th>Factor Igv</th>
                <th>% Igv</th>
              </thead>
            </table>
          </div>

        </div>

        <!-- --------------------------------------------------------- -->
        <!--RESUMEN DE LA COMPRA -->
        <!-- --------------------------------------------------------- -->
        <div class="row">

          <div class="col-12 offset-md-6 col-md-6 offset-lg-8 col-lg-4">

            <div class="card card-gray shadow float-right">

              <div class="card-header">
                <h3 class="card-title fs-6">RESUMEN</h3>
              </div> <!-- ./ end card-header -->

              <div class="card-body py-2">

                <div class="row fw-bold">

                  <!-- OP. GRAVADAS -->
                  <div class="col-12">
                    <span>OP. GRAVADAS</span>
                    <span class="float-right" id="resumen_opes_gravadas">S/ 0.00</span>
                  </div>

                  <!-- OP. INAFECTAS -->
                  <div class="col-12">
                    <span>OP. INAFECTAS</span>
                    <span class="float-right" id="resumen_opes_inafectas">S/ 0.00</span>
                  </div>

                  <!-- OP. EXONERADAS -->
                  <div class="col-12">
                    <span>OP. EXONERADAS</span>
                    <span class="float-right" id="resumen_opes_exoneradas">S/
                      0.00</span>
                  </div>

                  <!-- SUBTOTAL -->
                  <div class="col-12">
                    <span>SUBTOTAL</span>
                    <span class="float-right" id="resumen_subtotal">S/ 0.00</span>
                  </div>

                  <!-- IGV -->
                  <div class="col-12">
                    <span>IGV</span>
                    <span class="float-right" id="resumen_total_igv">S/ 0.00</span>
                  </div>

                  <!-- DESCUENTO -->
                  <div class="col-12 text-danger">
                    <span>DESCUENTO</span>
                    <span class="float-right" id="resumen_total_descuento">S/ 0.00</span>
                    <hr class="m-1" />
                  </div>

                  <!-- TOTAL -->
                  <div class="col-12 fs-5">
                    <span>TOTAL</span>
                    <span class="float-right" id="resumen_total_venta">S/ 0.00</span>
                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>
      </div>
      <!-- TAB CONTENT LISTADO DE COMPRAS -->
      <div class="tab-pane fade active show mt-4 px-4" id="listado-compras" role="tabpanel"
        aria-labelledby="listado-compras-tab">
        <div class="row">

          <!--LISTADO DE BOLETAS -->
          <div class="col-md-12">

            <div class="card card-info card-outline shadow">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list"></i> Listado de Compras</h3>
              </div>

              <div class="card-body">
                <table id="tbl_perfiles_asignar" class="display nowrap table-striped w-100 shadow rounded">
                  <thead class="bg-info text-left">
                    <th></th>
                    <th>Id</th>
                    <th>Id Proveedor</th>
                    <th>Proveedor</th>
                    <th>Fec. Compra</th>
                    <th>Id Tipo Comprobante</th>
                    <th>Comprobante</th>
                    <th>Serie</th>
                    <th>Correlativo</th>
                    <th>Moneda</th>
                    <th>Ope Gravadas</th>
                    <th>Ope Exoneradas</th>
                    <th>Ope Inafectas</th>
                    <th>Total IGV</th>
                    <th>Descuento</th>
                    <th>Total Compra</th>
                    <th>Estado</th>
                  </thead>

                  <tbody class="small text left">
                  </tbody>

                </table>
              </div>

            </div>
          </div>

        </div>

      </div>

    </div>


  </div><!-- /.container-fluid -->

</div>
<!-- /.content -->