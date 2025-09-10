@extends('layouts.app')

@section('title', 'Dashboard Principal')
@section('page-title', 'Panel de Control')

@section('content')
<div class="container-fluid">
    <!-- Cards de estadísticas -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Usuarios</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1,245</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Ventas del Mes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,800</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Productos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">856</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pedidos Pendientes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos y tablas -->
    <div class="row">
        <!-- Gráfico de ejemplo -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Resumen de Ventas</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <!-- Aquí iría tu gráfico -->
                        <canvas id="myAreaChart" height="120"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actividad reciente -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Actividad Reciente</h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-user-plus text-success"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Nuevo usuario registrado</h6>
                                <p class="mb-1 text-muted small">Juan Pérez se ha registrado</p>
                                <small>Hace 2 horas</small>
                            </div>
                        </div>
                        
                        <div class="list-group-item d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-shopping-cart text-info"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Nueva venta</h6>
                                <p class="mb-1 text-muted small">Pedido #12345 completado</p>
                                <small>Hace 3 horas</small>
                            </div>
                        </div>
                        
                        <div class="list-group-item d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-box text-warning"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Stock bajo</h6>
                                <p class="mb-1 text-muted small">Producto "Laptop HP" stock: 3</p>
                                <small>Hace 5 horas</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de datos -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Últimas Transacciones</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Producto</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>001</td>
                                    <td>María García</td>
                                    <td>Laptop Dell XPS</td>
                                    <td>2024/12/15</td>
                                    <td><span class="badge bg-success">Completado</span></td>
                                    <td>$1,299.99</td>
                                </tr>
                                <tr>
                                    <td>002</td>
                                    <td>Carlos López</td>
                                    <td>Mouse Logitech</td>
                                    <td>2024/12/14</td>
                                    <td><span class="badge bg-warning">Pendiente</span></td>
                                    <td>$45.99</td>
                                </tr>
                                <tr>
                                    <td>003</td>
                                    <td>Ana Rodríguez</td>
                                    <td>Teclado Mecánico</td>
                                    <td>2024/12/13</td>
                                    <td><span class="badge bg-success">Completado</span></td>
                                    <td>$89.99</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.border-left-primary {
    border-left: 0.25rem solid #4e73df !important;
}
.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}
.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}
.border-left-warning {
    border-left: 0.25rem solid #f6c23e !important;
}
.text-primary {
    color: #4e73df !important;
}
.text-success {
    color: #1cc88a !important;
}
.text-info {
    color: #36b9cc !important;
}
.text-warning {
    color: #f6c23e !important;
}
</style>
@endsection