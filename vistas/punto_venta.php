<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Punto de Venta</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Punto de Venta</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- Sección de Datos Generales de Venta -->
      <div class="col-12 col-lg-4 mb-4">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-receipt mr-2"></i>Datos Generales de Venta
            </h3>
          </div>
          <div class="card-body">
            <form id="formDatosVenta">
              <div class="form-group mb-2">
                <label for="nombreUsuario" class="mb-1">Nombre del Usuario</label>
                <input type="text" class="form-control form-control-sm" id="nombreUsuario" placeholder="Nombre del usuario" required>
              </div>
              
              <div class="form-group mb-2">
                <label for="numeroNota" class="mb-1">Número de Nota de Venta</label>
                <input type="text" class="form-control form-control-sm" id="numeroNota" placeholder="Auto-generado" readonly>
              </div>
              
              <div class="form-group mb-2">
                <label for="cliente" class="mb-1">Buscar Cliente</label>
                <select class="form-control form-control-sm select2" id="cliente" required>
                  <option value="">Seleccione un cliente</option>
                  <option value="1">Cliente 1</option>
                  <option value="2">Cliente 2</option>
                </select>
              </div>
              
              <div class="form-group mb-2">
                <label for="vendedor" class="mb-1">Buscar Vendedor</label>
                <select class="form-control form-control-sm select2" id="vendedor" required>
                  <option value="">Seleccione un vendedor</option>
                  <option value="1">Juan Pérez</option>
                  <option value="2">María García</option>
                </select>
              </div>
              
              <div class="form-group mb-2">
                <label for="distribuidor" class="mb-1">Buscar Distribuidor</label>
                <select class="form-control form-control-sm select2" id="distribuidor">
                  <option value="">Seleccione un distribuidor</option>
                  <option value="1">Distribuidor 1</option>
                  <option value="2">Distribuidor 2</option>
                </select>
              </div>
              
              <div class="form-group mb-2">
                <label for="tipoPago" class="mb-1">Tipo de Pago</label>
                <select class="form-control form-control-sm" id="tipoPago" required>
                  <option value="">Seleccione tipo de pago</option>
                  <option value="contado">Contado</option>
                  <option value="credito">Crédito</option>
                  <option value="transferencia">Transferencia</option>
                </select>
              </div>
              
              <div class="form-group mb-2">
                <label for="tipoDocumento" class="mb-1">Tipo de Documento</label>
                <select class="form-control form-control-sm" id="tipoDocumento" required>
                  <option value="">Seleccione tipo de documento</option>
                  <option value="factura">Factura</option>
                  <option value="notaPago">Nota de Pago</option>
                </select>
              </div>
              
              <div class="form-group mb-2">
                <label for="fechaEntrega" class="mb-1">Fecha de Entrega</label>
                <input type="date" class="form-control form-control-sm" id="fechaEntrega" required>
              </div>
              
              <div class="form-group mb-2">
                <label for="fechaRegistro" class="mb-1">Fecha de Registro</label>
                <input type="text" class="form-control form-control-sm" id="fechaRegistro" readonly>
              </div>
              
              <div class="form-group mb-2">
                <label for="observaciones" class="mb-1">Observaciones</label>
                <textarea class="form-control form-control-sm" id="observaciones" rows="2" placeholder="Agregue observaciones de la venta"></textarea>
              </div>
              
              <button type="button" class="btn btn-info btn-sm btn-block" id="btnAgregarCliente">
                <i class="fas fa-user-plus mr-2"></i>Agregar Cliente
              </button>
            </form>
          </div>
        </div>
      </div>
      
      <!-- Sección de Productos a Vender -->
      <div class="col-12 col-lg-8 mb-4">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-shopping-cart mr-2"></i>Productos a Vender
            </h3>
          </div>
          <div class="card-body p-0">
            <!-- Tabla responsiva de productos -->
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <thead class="bg-light">
                  <tr>
                    <th style="width: 10%">Código</th>
                    <th style="width: 25%">Producto</th>
                    <th style="width: 12%">Precio</th>
                    <th style="width: 12%">Cantidad</th>
                    <th style="width: 15%">Total</th>
                    <th style="width: 10%">Acciones</th>
                  </tr>
                </thead>
                <tbody id="tablaProductos">
                  <tr>
                    <td colspan="6" class="text-center text-muted py-4">
                      <i class="fas fa-inbox mr-2"></i>No hay productos agregados
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-primary" id="btnAgregarProducto">
              <i class="fas fa-plus mr-2"></i>Agregar Producto
            </button>
          </div>
        </div>
        
        <!-- Resumen de Venta -->
        <div class="card card-outline card-info mt-3">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-6 col-sm-3">
                <div class="description-block border-right">
                  <h5 class="description-header">0</h5>
                  <span class="description-text">PRODUCTOS</span>
                </div>
              </div>
              <div class="col-6 col-sm-3">
                <div class="description-block border-right">
                  <h5 class="description-header">RD$ 0.00</h5>
                  <span class="description-text">SUBTOTAL</span>
                </div>
              </div>
              <div class="col-6 col-sm-3">
                <div class="description-block border-right">
                  <h5 class="description-header">RD$ 0.00</h5>
                  <span class="description-text">DESCUENTO</span>
                </div>
              </div>
              <div class="col-6 col-sm-3">
                <div class="description-block">
                  <h5 class="description-header text-success">RD$ 0.00</h5>
                  <span class="description-text">TOTAL</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Botones de Acción -->
        <div class="mt-3">
          <button type="button" class="btn btn-success btn-lg btn-block">
            <i class="fas fa-check mr-2"></i>Registrar Venta
          </button>
          <button type="button" class="btn btn-secondary btn-lg btn-block mt-2">
            <i class="fas fa-redo mr-2"></i>Limpiar
          </button>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Configurar fecha de registro automático con zona horaria de La Paz, Bolivia
  function actualizarFechaRegistro() {
    const opciones = {
      timeZone: 'America/La_Paz',
      year: 'numeric',
      month: '2-digit',
      day: '2-digit',
      hour: '2-digit',
      minute: '2-digit',
      second: '2-digit',
      hour12: false
    };
    
    const fechaLaPaz = new Date().toLocaleString('es-BO', opciones);
    document.getElementById('fechaRegistro').value = fechaLaPaz;
  }
  
  // Actualizar fecha al cargar la página
  actualizarFechaRegistro();
  
  // Actualizar fecha cada segundo
  setInterval(actualizarFechaRegistro, 1000);
  
  // Evento para agregar cliente
  document.getElementById('btnAgregarCliente').addEventListener('click', function(e) {
    e.preventDefault();
    // Aquí se puede abrir un modal o redirigir a un formulario para agregar cliente
    alert('Abrir formulario para agregar nuevo cliente');
  });
});
</script>