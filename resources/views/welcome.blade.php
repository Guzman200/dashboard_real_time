<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard real time</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        @include('include.navbar')

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) 
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>
                -->

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Buscar"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                @include('include.sidebar')
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="app">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard real time</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i
                                        class="fas fa-dollar-sign"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Ganancias</span>
                                    <span class="info-box-number">
                                        @{{ estadisticas.ganancias }}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i
                                        class="fas fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Clientes nuevos</span>
                                    <span class="info-box-number">@{{ estadisticas.clientes_nuevos }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Número de ventas</span>
                                    <span class="info-box-number">@{{ estadisticas.numero_ventas }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Número de clientes</span>
                                    <span class="info-box-number">@{{ estadisticas.numero_clientes }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Reporte de ventas por mes</h5>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-tool dropdown-toggle"
                                                data-toggle="dropdown">
                                                <i class="fas fa-wrench"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                <a href="#" class="dropdown-item">Action</a>
                                                <a href="#" class="dropdown-item">Another action</a>
                                                <a href="#" class="dropdown-item">Something else here</a>
                                                <a class="dropdown-divider"></a>
                                                <a href="#" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-center">
                                                <strong>Ventas: 1 de Enero, 2022 - 31 de Marzo, 2021</strong>
                                            </p>

                                            <div class="chart">
                                                <!-- Sales Chart Canvas -->
                                                <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                                            </div>
                                            <!-- /.chart-responsive -->
                                        </div>
                                        <!-- /.col -->

                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./card-body 
                                {{-- <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-3 col-6">
                                            <div class="description-block border-right">
                                                <span class="description-percentage text-success"><i
                                                        class="fas fa-caret-up"></i> 17%</span>
                                                <h5 class="description-header">$35,210.43</h5>
                                                <span class="description-text">TOTAL REVENUE</span>
                                            </div>
                                            <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i>
                                        0%</span>
                                    <h5 class="description-header">$10,390.90</h5>
                                    <span class="description-text">TOTAL COST</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                                        20%</span>
                                    <h5 class="description-header">$24,813.53</h5>
                                    <span class="description-text">TOTAL PROFIT</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block">
                                    <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>
                                        18%</span>
                                    <h5 class="description-header">1200</h5>
                                    <span class="description-text">GOAL COMPLETIONS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div> --}}

                    <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <div class="col-md-8">

                            <div class="row">
                                <div class="col-md-6">


                                    <!-- PRODUCT LIST -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Ultimos productos vendidos</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body p-0">
                                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                                <li class="item" v-for="(detalle, index) in ultimosProductosVendidos">
                                                    <div class="product-img">
                                                        <img src="dist/img/default-150x150.png" alt="Product Image"
                                                            class="img-size-50">
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="javascript:void(0)"
                                                            class="product-title">@{{ detalle.producto.nombre }}
                                                            <span
                                                                class="badge badge-warning float-right">$@{{ detalle.producto.precio_venta }}</span></a>
                                                        <span class="product-description">
                                                            @{{ detalle.producto.marca }}
                                                        </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer text-center">
                                            <a href="javascript:void(0)" class="uppercase">Ver todos los productos</a>
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                    <!-- /.card -->
                                    <!--/.direct-chat -->

                                </div>
                                <!-- /.col -->

                                <!-- CLIENTES CON MAS COMPRAS -->
                                <div class="col-md-6">
                                    <!-- USERS LIST -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Clientes con más compras</h3>

                                            <div class="card-tools">
                                                <span class="badge badge-danger">$</span>
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body p-0">
                                            <ul class="users-list clearfix">
                                                <li v-for="(item, index) in clientesConMasCompras">
                                                    <img :src="'dist/img/user' + incrementarIndex(index) + '-128x128.jpg'"
                                                        alt="User Image">
                                                    <a class="users-list-name"
                                                        href="#">@{{ item.cliente.nombre }}</a>
                                                    <span class="users-list-date">@{{ item.total_ventas }}
                                                        compras</span>
                                                </li>

                                            </ul>
                                            <!-- /.users-list -->
                                        </div>

                                    </div>
                                    <!--/.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- TABLE: LATEST ORDERS -->
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Ultimas ventas realizadas</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Cliente</th>
                                                    <th>Status</th>
                                                    <th>Forma de pago</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(venta, index) in ultimasVentas">
                                                    <td><a href="javascript:void(0)">0000-@{{ venta . id }}</a></td>
                                                    <td>@{{ venta . cliente . nombre }}</td>
                                                    <td><span class="badge badge-success">Pagada</span></td>
                                                    <td>
                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                            @{{ venta . forma_pago . descripcion }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>

                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-4">
                            <!-- Info Boxes Style 2 -->
                            <div class="info-box mb-3 bg-warning">
                                <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Costo en inventario</span>
                                    <span class="info-box-number">@{{ estadisticas2 . costo_inventario }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box mb-3 bg-success">
                                <span class="info-box-icon"><i class="far fa-heart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Productos en inventario</span>
                                    <span class="info-box-number">@{{ estadisticas2 . productos_inventario }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box mb-3 bg-danger">
                                <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total de ventas neto</span>
                                    <span class="info-box-number">@{{ estadisticas2 . ventas_neto }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box mb-3 bg-info">
                                <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total de ventas bruto</span>
                                    <span class="info-box-number">@{{ estadisticas2 . ventas_bruto }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Productos más vendidos</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="chart-responsive">
                                                <canvas id="pieChart" height="150"></canvas>
                                            </div>
                                            <!-- ./chart-responsive -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-4">
                                            <ul class="chart-legend clearfix" id="listProductodMasVendidos">
                                                <li><i class="far fa-circle text-danger"></i> Chrome</li>
                                                <li><i class="far fa-circle text-success"></i> IE</li>
                                                <li><i class="far fa-circle text-warning"></i> FireFox</li>
                                                <li><i class="far fa-circle text-info"></i> Safari</li>
                                                <li><i class="far fa-circle text-primary"></i> Opera</li>
                                                <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                                            </ul>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->

                                <!-- /.footer -->
                            </div>
                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Productos menos vendidos</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="chart-responsive">
                                                <canvas id="pieChart2" height="150"></canvas>
                                            </div>
                                            <!-- ./chart-responsive -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-4">
                                            <ul class="chart-legend clearfix" id="listProductodMenosVendidos">
                                                <li><i class="far fa-circle text-danger"></i> Chrome</li>
                                                <li><i class="far fa-circle text-success"></i> IE</li>
                                                <li><i class="far fa-circle text-warning"></i> FireFox</li>
                                                <li><i class="far fa-circle text-info"></i> Safari</li>
                                                <li><i class="far fa-circle text-primary"></i> Opera</li>
                                                <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                                            </ul>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->

                                <!-- /.footer -->
                            </div>
                            <!-- /.card -->


                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>


    <script>
        // Vue application
        const app = new Vue({
            el: '#app',
            data: {
                messages: [],
                estadisticas: {
                    clientes_nuevos: 0,
                    ganancias: 0,
                    numero_clientes: 0,
                    numero_ventas: 0
                },
                estadisticas2: {
                    costo_inventario: 0,
                    productos_inventario: 0,
                    ventas_neto: 0,
                    ventas_bruto: 0
                },
                ultimasVentas: [],
                ultimosProductosVendidos: [],
                clientesConMasCompras: []
            },
            mounted() {

                this.cargarDatos();

                // Enable pusher logging - don't include this in production
                Pusher.logToConsole = true;

                var pusher = new Pusher('e0ea4bf3b7146e6e24d9', {
                    cluster: 'us2'
                });

                let self = this;

                var channel = pusher.subscribe('my-channel');
                channel.bind('my-event', function(data) {
                    self.cargarDatos();
                });

            },
            methods: {
                async getEstadisticasGenerales() {

                    let peticion = await fetch('/api/estadisticasGenerales');

                    let response = await peticion.json();

                    this.estadisticas = response;

                },
                async getEstadisticasGenerales2() {

                    let peticion = await fetch('/api/estadisticasGenerales2');

                    let response = await peticion.json();

                    this.estadisticas2 = response;

                },
                async getUltimasVentas() {

                    let peticion = await fetch('/api/ultimasVentas');

                    let response = await peticion.json();

                    this.ultimasVentas = response;

                },
                async getultimosProductosVendidos() {

                    let peticion = await fetch('/api/ultimosProductosVendidos');

                    let response = await peticion.json();

                    this.ultimosProductosVendidos = response;
                },
                async getclientesConMasCompras() {

                    let peticion = await fetch('/api/clientesConMasCompras');

                    let response = await peticion.json();

                    this.clientesConMasCompras = response;
                },
                async getGraficaProductosMasVendidos() {

                    let peticion = await fetch('/api/productosMasVendidos');

                    let response = await peticion.json();

                    let pieChartCanvas = $('#pieChart').get(0).getContext('2d')

                    let labels = [];
                    let data = [];
                    let textColors = ['danger', 'success', 'warning', 'info', 'primary', 'secondary'];

                    let listProductodMasVendidos = document.getElementById('listProductodMasVendidos');
                    listProductodMasVendidos.innerHTML = '';

                    let i = 0;
                    for (let item of response) {
                        labels.push(item.producto.nombre);
                        data.push(item.total_ventas);

                        listProductodMasVendidos.innerHTML +=
                            `<li><i class="far fa-circle text-${textColors[i]}"></i> ${item.producto.nombre}</li>`;
                        i++;
                    }

                    let pieData = {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef',
                                '#3c8dbc', '#d2d6de'
                            ]
                        }]
                    }
                    let pieOptions = {
                        legend: {
                            display: false
                        }
                    }

                    if (window.productoMasVendidos) {
                        window.productoMasVendidos.clear();
                        window.productoMasVendidos.destroy();
                    }

                    // Create pie or douhnut chart
                    // You can switch between pie and douhnut using the method below.
                    // eslint-disable-next-line no-unused-vars
                    window.productoMasVendidos = new Chart(pieChartCanvas, {
                        type: 'doughnut',
                        data: pieData,
                        options: pieOptions
                    })

                },
                async getGraficaProductosMenossVendidos() {

                    let peticion = await fetch('/api/productosMenosVendidos');

                    let response = await peticion.json();

                    let pieChartCanvas2 = $('#pieChart2').get(0).getContext('2d')

                    let labels = [];
                    let data = [];
                    let textColors = ['danger', 'success', 'warning', 'info', 'primary', 'secondary'];

                    let listProductodMasVendidos = document.getElementById('listProductodMenosVendidos');
                    listProductodMasVendidos.innerHTML = '';

                    let i = 0;
                    for (let item of response) {
                        labels.push(item.producto.nombre);
                        data.push(item.total_ventas);

                        listProductodMasVendidos.innerHTML +=
                            `<li><i class="far fa-circle text-${textColors[i]}"></i> ${item.producto.nombre}</li>`;
                        i++;
                    }

                    let pieData = {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef',
                                '#3c8dbc', '#d2d6de'
                            ]
                        }]
                    }
                    let pieOptions = {
                        legend: {
                            display: false
                        }
                    }

                    if (window.productoMenosVendidos) {
                        window.productoMenosVendidos.clear();
                        window.productoMenosVendidos.destroy();
                    }

                    // Create pie or douhnut chart
                    // You can switch between pie and douhnut using the method below.
                    // eslint-disable-next-line no-unused-vars
                    window.productoMenosVendidos = new Chart(pieChartCanvas2, {
                        type: 'doughnut',
                        data: pieData,
                        options: pieOptions
                    })

                },
                incrementarIndex(index) {
                    return index + 1;
                },
                cargarDatos() {
                    this.getEstadisticasGenerales();
                    this.getEstadisticasGenerales2();
                    this.getUltimasVentas();
                    this.getultimosProductosVendidos();
                    this.getclientesConMasCompras();
                    this.getGraficaProductosMasVendidos();
                    this.getGraficaProductosMenossVendidos();

                }
            }
        });

    </script>
</body>

</html>
