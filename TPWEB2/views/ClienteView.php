<?php

class ClienteView {
    public function mostrarClientes($clientes) {
    ?>
    <main class="container mt-5">
        <div class="d-flex justify-content-between">
            <h2>Gestión de Clientes (Categorías)</h2>
            <a href="<?= BASE_URL ?>formAgregarCliente" class="btn btn-success">Nuevo Cliente</a>
        </div>
        <hr>
        <div class="row">
            <?php foreach($clientes as $cliente): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <?php if(!empty($cliente->imagen_url)): ?>
                            <img src="<?= htmlspecialchars($cliente->imagen_url) ?>" class="card-img-top" alt="Imagen">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5><?= htmlspecialchars($cliente->nombre) ?></h5>
                            <h6 class="text-muted"><?= htmlspecialchars($cliente->empresa) ?></h6>
                            <p>Contacto: <?= htmlspecialchars($cliente->contacto) ?></p>
                            <a href="<?= BASE_URL ?>pedidosPorCliente/<?= $cliente->id_cliente ?>" class="btn btn-info">Ver Pedidos</a>
                            <a href="<?= BASE_URL ?>formEditarCliente/<?= $cliente->id_cliente ?>" class="btn btn-warning">Editar</a>
                            <a href="<?= BASE_URL ?>eliminarCliente/<?= $cliente->id_cliente ?>" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <?php
    }

    public function formAgregar() {
    ?>
    <main class="container mt-5">
        <h2>Agregar Cliente</h2>
        <form action="<?= BASE_URL ?>agregarCliente" method="POST">
            <input type="text" name="nombre" placeholder="Nombre completo" class="form-control mb-3" required>
            <input type="text" name="empresa" placeholder="Empresa" class="form-control mb-3" required>
            <input type="text" name="contacto" placeholder="Teléfono/Email" class="form-control mb-3" required>
            <input type="text" name="imagen_url" placeholder="URL de la imagen (Opcional)" class="form-control mb-3">
            <button class="btn btn-success">Guardar</button>
        </form>
    </main>
    <?php
    }

    public function formEditar($cliente) {
    ?>
    <main class="container mt-5">
        <h2>Editar Cliente</h2>
        <form action="<?= BASE_URL ?>editarCliente/<?= $cliente->id_cliente ?>" method="POST">
            <input type="text" name="nombre" class="form-control mb-3" value="<?= htmlspecialchars($cliente->nombre) ?>" required>
            <input type="text" name="empresa" class="form-control mb-3" value="<?= htmlspecialchars($cliente->empresa) ?>" required>
            <input type="text" name="contacto" class="form-control mb-3" value="<?= htmlspecialchars($cliente->contacto) ?>" required>
            <input type="text" name="imagen_url" class="form-control mb-3" value="<?= htmlspecialchars($cliente->imagen_url ?? '') ?>" placeholder="URL de la imagen (Opcional)">
            <button class="btn btn-primary">Actualizar</button>
        </form>
    </main>
    <?php
    }
}