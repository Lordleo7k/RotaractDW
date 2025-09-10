@extends('layouts.app')

@section('title', 'Ver Miembro')
@section('page-title', 'Detalles del Miembro')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detalles del Miembro</h1>
        <div>
            <a href="{{ route('members.edit', $member) }}" class="btn btn-warning me-2">
                <i class="fas fa-edit me-2"></i>Editar
            </a>
            <a href="{{ route('members.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Volver a Lista
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Información Principal -->
        <div class="col-xl-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-user me-2"></i>Información Personal
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <label class="info-label">
                                    <i class="fas fa-user text-primary me-2"></i>Nombre Completo
                                </label>
                                <p class="info-value">{{ $member->name }}</p>
                            </div>
                            
                            <div class="info-item mb-3">
                                <label class="info-label">
                                    <i class="fas fa-envelope text-primary me-2"></i>Email
                                </label>
                                <p class="info-value">
                                    <a href="mailto:{{ $member->email }}" class="text-decoration-none">
                                        {{ $member->email }}
                                    </a>
                                </p>
                            </div>
                            
                            <div class="info-item mb-3">
                                <label class="info-label">
                                    <i class="fas fa-phone text-primary me-2"></i>Teléfono
                                </label>
                                <p class="info-value">
                                    @if($member->phone)
                                        <a href="tel:{{ $member->phone }}" class="text-decoration-none">
                                            {{ $member->phone }}
                                        </a>
                                    @else
                                        <span class="text-muted">No especificado</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <label class="info-label">
                                    <i class="fas fa-briefcase text-primary me-2"></i>Posición/Cargo
                                </label>
                                <p class="info-value">
                                    <span class="badge bg-info fs-6">{{ $member->position }}</span>
                                </p>
                            </div>
                            
                            <div class="info-item mb-3">
                                <label class="info-label">
                                    <i class="fas fa-calendar text-primary me-2"></i>Fecha de Ingreso
                                </label>
                                <p class="info-value">{{ $member->join_date->format('d/m/Y') }}</p>
                            </div>
                            
                            <div class="info-item mb-3">
                                <label class="info-label">
                                    <i class="fas fa-toggle-on text-primary me-2"></i>Estado
                                </label>
                                <p class="info-value">
                                    @if($member->status == 'active')
                                        <span class="badge bg-success fs-6">
                                            <i class="fas fa-check me-1"></i>Activo
                                        </span>
                                    @else
                                        <span class="badge bg-secondary fs-6">
                                            <i class="fas fa-pause me-1"></i>Inactivo
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    @if($member->notes)
                        <div class="info-item">
                            <label class="info-label">
                                <i class="fas fa-sticky-note text-primary me-2"></i>Notas Adicionales
                            </label>
                            <div class="notes-box p-3 bg-light rounded">
                                <p class="mb-0">{{ $member->notes }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Panel Lateral -->
        <div class="col-xl-4">
            <!-- Avatar y Resumen -->
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <div class="avatar-large mx-auto mb-3">
                        {{ strtoupper(substr($member->name, 0, 2)) }}
                    </div>
                    <h5 class="mb-1">{{ $member->name }}</h5>
                    <p class="text-muted mb-3">{{ $member->position }}</p>
                    
                    <div class="d-grid gap-2">
                        <a href="mailto:{{ $member->email }}" class="btn btn-primary">
                            <i class="fas fa-envelope me-2"></i>Enviar Email
                        </a>
                        @if($member->phone)
                            <a href="tel:{{ $member->phone }}" class="btn btn-outline-primary">
                                <i class="fas fa-phone me-2"></i>Llamar
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Información Adicional -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-info-circle me-2"></i>Información Adicional
                    </h6>
                </div>
                <div class="card-body">
                    <div class="stat-item mb-3">
                        <i class="fas fa-clock text-muted me-2"></i>
                        <strong>Tiempo en la organización:</strong><br>
                        <span class="text-muted">
                            {{ $member->join_date->diffForHumans() }}
                        </span>
                    </div>
                    
                    <div class="stat-item mb-3">
                        <i class="fas fa-calendar-plus text-muted me-2"></i>
                        <strong>Registrado el:</strong><br>
                        <span class="text-muted">
                            {{ $member->created_at->format('d/m/Y H:i') }}
                        </span>
                    </div>
                    
                    @if($member->updated_at != $member->created_at)
                        <div class="stat-item">
                            <i class="fas fa-edit text-muted me-2"></i>
                            <strong>Última actualización:</strong><br>
                            <span class="text-muted">
                                {{ $member->updated_at->format('d/m/Y H:i') }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Acciones -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-cogs me-2"></i>Acciones
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('members.edit', $member) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Editar Información
                        </a>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                            <i class="fas fa-trash me-2"></i>Eliminar Miembro
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmación para eliminar -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro que deseas eliminar a <strong>{{ $member->name }}</strong>? 
                Esta acción no se puede deshacer.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('members.destroy', $member) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.info-item {
    margin-bottom: 1rem;
}

.info-label {
    font-weight: 600;
    color: #5a5c69;
    font-size: 14px;
    display: block;
    margin-bottom: 5px;
}

.info-value {
    font-size: 16px;
    color: #3a3b45;
    margin-bottom: 0;
}

.avatar-large {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 24px;
}

.notes-box {
    border-left: 4px solid #4e73df;
}

.stat-item {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.stat-item:last-child {
    border-bottom: none;
}
</style>

<script>
function confirmDelete() {
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endsection