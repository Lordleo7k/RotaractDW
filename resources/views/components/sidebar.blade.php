<div class="sidebar bg-dark text-white" style="height: 100vh; position: fixed; width: 250px; overflow-y: auto;">
    <div class="sidebar-header p-3">
        <h4>Mi Dashboard</h4>
    </div>
    
    <!-- Dashboard -->
    <div class="menu-item">
        <a href="{{ route('dashboard') }}" class="menu-link p-2 d-block text-white text-decoration-none">
            <i class="fas fa-tachometer-alt me-2"></i>
            Dashboard
        </a>
    </div>
    
    <!-- Módulo: Gestión de Miembros -->
    <div class="module-section">
        <div class="module-title p-2 bg-secondary mt-2">
            <i class="fas fa-users me-2"></i>
            <strong>Gestión de Miembros</strong>
        </div>
        
        <div class="menu-items">
            <!-- Menú con submenús -->
            <div class="menu-item">
                <a href="#miembrosSubmenu" class="menu-link p-2 d-block text-white text-decoration-none" data-bs-toggle="collapse">
                    <i class="fas fa-user-friends me-2"></i>
                    Miembros
                    <i class="fas fa-chevron-down float-end mt-1"></i>
                </a>
                <div class="collapse" id="miembrosSubmenu">
                    <a href="{{ route('members.index') }}" class="submenu-item d-block p-2 ps-4 text-white-50 text-decoration-none">
                        <i class="fas fa-list me-2"></i>Lista de Miembros
                    </a>
                    <a href="{{ route('members.create') }}" class="submenu-item d-block p-2 ps-4 text-white-50 text-decoration-none">
                        <i class="fas fa-plus me-2"></i>Agregar Miembro
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.sidebar .menu-link:hover {
    background-color: #495057 !important;
}

.sidebar .submenu-item:hover {
    background-color: #343a40 !important;
    color: white !important;
}

.sidebar .module-title {
    border-left: 4px solid #007bff;
}

.sidebar .menu-link.active {
    background-color: #007bff !important;
}
</style>