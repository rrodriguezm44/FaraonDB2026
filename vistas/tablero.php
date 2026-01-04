<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tablero Principal</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Tablero Principal</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <!-- Info boxes -->

    <!-- CUADROS INFORMATIVOS -->
    <div class="row">

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">
              Productos
            </span>
            <span class=" info-box-number" id="totalProductos"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">
              Ofertas
            </span>
            <span class="info-box-number" id="totalOfertas"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <!-- <div class="clearfix hidden-md-up"></div> -->

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">
              Ventas Mes
            </span>
            <span class="info-box-number" id="totalVentas"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">
              Clientes
            </span>
            <span class="info-box-number" id="totalClientes"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

    </div>
    <!-- GRAFICO ESTADISTICO -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <!-- Sales Chart Canvas -->
              <canvas id="barChart" style="min-height: 250px; height: 300px; max-height: 350px; width: 100%;"></canvas>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<script>
  $(document).ready(function() {
    //alert('joder')
    // cuadro de informacion
    $.ajax({
      url: "ajax/tablero.ajax.php",
      method: 'POST',
      dataType: "json",
      success: function(response) {
        console.log("respuesta", response)
        $("#totalProductos").html(response[0]['totalProductos']);
        $("#totalOfertas").html(response[0]['totalOfertas']);
        $("#totalClientes").html(response[0]['totalClientes']);
        $("#totalVentas").html('Bs. ' + response[0]['totalVentas'].replace(/\d(?=(\d{3})+\.)/g, "$&,"));
      }
    });

    //grafico por mes

    $.ajax({
      url: "ajax/tablero.ajax.php",
      method: 'POST',
      data: {
        'accion': 1 //parametro para obtener las ventas del mes
      },
      dataType: 'json',
      success: function(response) {
        console.log("respuesta 2", response);
        let fecha_venta = [];
        let total_venta = [];
        //let total_ventas_mes = 0;
        total_venta_mes = 0;

        for (let i = 0; i < response.length; i++) {

          fecha_venta.push(response[i]['fecha_venta']);
          total_venta.push(response[i]['total_venta']);
          total_venta_mes = (parseFloat(total_venta_mes) + parseFloat(response[i]['total_venta'])).toFixed(2);

        }

        //$(".card-title").html('Ventas del Mes: Bs.' + parseFloat(total_venta_mes));
        $(".card-title").html('Ventas del Mes: Bs. ' + total_venta_mes.toString().replace(/\d(?=(\d{3})+\.)/g,
          "$&,"));

        let barChartCanvas = $("#barChart").get(0).getContext('2d');

        let areaChartData = {
          labels: fecha_venta,
          datasets: [{
            label: 'Ventas del Mes',
            backgroundColor: 'rgba(60,141,188,0.9)',
            data: total_venta
          }]
        }

        var barChartData = $.extend(true, {}, areaChartData);
        var temp0 = areaChartData.datasets[0];
        barChartData.datasets[0] = temp0;

        var barChartOptions = {
          maintainAspectRatio: false,
          responsive: true,
          events: false,
          legend: {
            display: true
          },
          animation: {
            duration: 500,
            easing: "easeOutQuart",
            onComplete: function() {
              var ctx = this.chart.ctx;
              ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart
                .defaults.global.defaultFontFamily);
              ctx.textAlign = 'center';
              ctx.textBaseline = 'bottom';

              this.data.datasets.forEach(function(dataset) {
                for (var i = 0; i < dataset.data.length; i++) {
                  var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                    scale_max = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._yScale.maxHeight;
                  ctx.fillStyle = '#444';

                  var y_pos = model.y - 5;

                  // Make sure data value does not get overFlow and hidden
                  // When the bar's value is too clase to max value of scale
                  // Note: The y value is reverse, it counts from top down

                  if ((scale_max - model.y) / scale_max >= 0.93) {
                    y_pos = model.y + 20;
                  }

                  ctx.fillText(dataset.data[i], model.x, y_pos);
                }
              });
            }
          }
        }

        new Chart(barChartCanvas, {
          type: 'bar',
          data: barChartData,
          options: barChartOptions
        })
      }
    });
  });
</script>