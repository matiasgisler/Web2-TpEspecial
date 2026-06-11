<?php

class formularioVista{
    public function mostrarFormularioFlete($clientes, $req) {
        
        ?>
        <main class="container mt-5">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Agregar Nuevo Pedido/Flete</h5>
                </div>
                <div class="card-body">
                    
                    <form method="POST" action="<?= BASE_URL ?>guardar_pedido">
                        
                        <div class="mb-3">
                            <label>Estado del Pedido:</label>
                            <select name="estado" class="form-select" required>
                                <option value="Pendiente">Pendiente</option>
                                <option value="En transito">En transito</option>
                                <option value="Enviado">Enviado</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Origen:</label>
                            <input type="text" name="origen" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Destino:</label>
                            <input type="text" name="destino" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Fecha de Entrega:</label>
                            <input type="date" name="fechaentrega" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Precio ($):</label>
                            <input type="number" name="precio" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="text-danger fw-bold">Cliente Asociado (Categoría):</label>
                            <select name="id_cliente" class="form-select" required>
                                <option value="">Seleccione un cliente...</option>
                                
                                <?php foreach ($clientes as $cliente) { ?>
                                    <option value="<?= $cliente->id_cliente ?>"><?= $cliente->nombre ?> (De: <?= $cliente->ciudad ?>)</option>
                                <?php } ?>
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>URL de la Imagen (Opcional):</label>
                            <input type="url" name="imagen_url" class="form-control" placeholder="https://ejemplo.com/imagen.jpg">
                        </div>
                        <button type="submit" class="btn btn-success">Guardar Pedido</button>
                    </form>
                </div>
            </div>
        </main>
        <?php
    }
        public function mostrarFormularioEditar($pedido, $clientes, $req) {

        ?>
        <main class="container mt-5">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Editar Pedido #<?= $pedido->id_pedido ?></h5>
                </div>
                <div class="card-body">
                    
                    <form method="POST" action="<?= BASE_URL ?>actualizar_pedido/<?= $pedido->id_pedido ?>">
                        
                        <div class="mb-3">
                            <label>Estado del Pedido:</label>
                            <select name="estado" class="form-select" required>
                                <option value="Pendiente" <?= ($pedido->estado == 'Pendiente') ? 'selected' : '' ?>>Pendiente</option>
                                <option value="En transito" <?= ($pedido->estado == 'En transito') ? 'selected' : '' ?>>En transito</option>
                                <option value="Enviado" <?= ($pedido->estado == 'Enviado') ? 'selected' : '' ?>>Enviado</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Origen:</label>
                            <input type="text" name="origen" class="form-control" value="<?= $pedido->origen ?>" required>
                        </div>

                        <div class="mb-3">
                            <label>Destino:</label>
                            <input type="text" name="destino" class="form-control" value="<?= $pedido->destino ?>" required>
                        </div>

                        <div class="mb-3">
                            <label>Fecha de Entrega:</label>
                            <input type="date" name="fechaentrega" class="form-control" value="<?= $pedido->fechaentrega ?>" required>
                        </div>

                        <div class="mb-3">
                            <label>Precio ($):</label>
                            <input type="number" name="precio" class="form-control" value="<?= $pedido->precio ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="text-danger fw-bold">Cliente Asociado (Categoría):</label>
                            <select name="id_cliente" class="form-select" required>
                                <?php foreach ($clientes as $cliente) { ?>
                                    <option value="<?= $cliente->id_cliente ?>" <?= ($cliente->id_cliente == $pedido->id_cliente) ? 'selected' : '' ?>>
                                        <?= $cliente->nombre ?> (De: <?= $cliente->ciudad ?>)
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>URL de la Imagen (Opcional):</label>
                            <input type="url" name="imagen_url" class="form-control" value="<?= $pedido->imagen_url ?? '' ?>" placeholder="https://ejemplo.com/imagen.jpg">
                        </div>
                        <button type="submit" class="btn btn-warning">Actualizar Pedido</button>
                        <a href="<?= BASE_URL ?>" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </main>
        <?php
       
    }
}
