<?php

class PedidoView {
    public function mostrarPedidos($pedidos) {
    ?>
    <main class="container mt-5">
        <div class="d-flex justify-content-between">
            <h2>Pedidos</h2>
            <a href="<?= BASE_URL ?>formAgregarPedido" class="btn btn-success">Nuevo Pedido</a>
        </div>
        <hr>
        <div class="row">
            <?php foreach($pedidos as $pedido): ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Pedido #<?= $pedido->id_pedido ?></h5>
                            <h6 class="text-primary">Cliente: <?= htmlspecialchars($pedido->cliente_nombre) ?></h6>
                            <p><strong>Origen:</strong> <?= htmlspecialchars($pedido->origen) ?></p>
                            <p><strong>Destino:</strong> <?= htmlspecialchars($pedido->destino) ?></p>
                            <p><strong>Fecha Entrega:</strong> <?= htmlspecialchars($pedido->fechaentrega) ?></p>
                            <p><strong>Precio:</strong> $<?= htmlspecialchars($pedido->precio) ?></p>
                            <p><strong>Estado:</strong> <span class="badge bg-secondary"><?= htmlspecialchars($pedido->estado) ?></span></p>
                            <a href="<?= BASE_URL ?>formEditarPedido/<?= $pedido->id_pedido ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="<?= BASE_URL ?>eliminarPedido/<?= $pedido->id_pedido ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="<?= BASE_URL ?>clientes" class="btn btn-secondary mt-3">Volver a Clientes</a>
    </main>
    <?php
    }

    public function formAgregar($clientes) {
    ?>
    <main class="container mt-5">
        <h2>Agregar Pedido</h2>
        <form action="<?= BASE_URL ?>agregarPedido" method="POST">
            <select name="id_cliente" class="form-control mb-3" required>
                <option value="">Seleccione un Cliente</option>
                <?php foreach($clientes as $cliente): ?>
                    <option value="<?= $cliente->id_cliente ?>"><?= htmlspecialchars($cliente->nombre) ?></option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="origen" placeholder="Origen" class="form-control mb-3" required>
            <input type="text" name="destino" placeholder="Destino" class="form-control mb-3" required>
            <input type="date" name="fechaentrega" class="form-control mb-3" required>
            <input type="number" name="precio" placeholder="Precio" class="form-control mb-3" required>
            <select name="estado" class="form-control mb-3" required>
                <option value="Pendiente">Pendiente</option>
                <option value="En transito">En transito</option>
                <option value="Enviado">Enviado</option>
            </select>
            <button class="btn btn-success">Guardar</button>
        </form>
    </main>
    <?php
    }

    public function formEditar($pedido, $clientes) {
    ?>
    <main class="container mt-5">
        <h2>Editar Pedido</h2>
        <form action="<?= BASE_URL ?>editarPedido/<?= $pedido->id_pedido ?>" method="POST">
            <select name="id_cliente" class="form-control mb-3" required>
                <?php foreach($clientes as $cliente): ?>
                    <option value="<?= $cliente->id_cliente ?>" <?= $cliente->id_cliente == $pedido->id_cliente ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cliente->nombre) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="origen" class="form-control mb-3" value="<?= htmlspecialchars($pedido->origen) ?>" required>
            <input type="text" name="destino" class="form-control mb-3" value="<?= htmlspecialchars($pedido->destino) ?>" required>
            <input type="date" name="fechaentrega" class="form-control mb-3" value="<?= htmlspecialchars($pedido->fechaentrega) ?>" required>
            <input type="number" name="precio" class="form-control mb-3" value="<?= htmlspecialchars($pedido->precio) ?>" required>
            <select name="estado" class="form-control mb-3" required>
                <option value="Pendiente" <?= $pedido->estado == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                <option value="En transito" <?= $pedido->estado == 'En transito' ? 'selected' : '' ?>>En transito</option>
                <option value="Enviado" <?= $pedido->estado == 'Enviado' ? 'selected' : '' ?>>Enviado</option>
            </select>
            <button class="btn btn-primary">Actualizar</button>
        </form>
    </main>
    <?php
    }
}