<?php

class fleteVista {

    
    
    public function mostrarTabla($objetos, $req) {
        ?>
        <main class="container mt-5">
            
            <?php if ($req->user) { ?>
                <div class="alert alert-success d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Hola <?php echo $req->user->nombre; ?></h1>
                    </div>
                    <a href="<?= BASE_URL ?>nuevo_pedido" class="btn btn-success btn-sm">Agregar Nuevo Pedido</a>
                </div>
            <?php } else { ?>
                <div class="alert alert-secondary">
                    Estás navegando como invitado.
                    <a href="<?= BASE_URL ?>mostrar_login" class="btn btn-primary btn-sm">Iniciar Sesión</a>
                </div>
            <?php } ?>
            
            <section class="objetos row">
                <?php foreach ($objetos as $objeto) { ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Id Del Pedido: <?= $objeto->id_pedido ?></h5>
                                <h5 class="card-title">Estado Del Pedido: <?= $objeto->estado ?></h5>
                                
                                <hr> <a href="<?= BASE_URL ?>pedido/<?= $objeto->id_pedido ?>" class="btn btn-outline-primary btn-sm">Ver Pedido</a>
                                
                                <?php if ($req->user) { ?>
                                    <a href="<?= BASE_URL ?>editar_pedido/<?= $objeto->id_pedido ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="<?= BASE_URL ?>eliminar_pedido/<?= $objeto->id_pedido ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>
        </main>
        <?php  
    }
    public function MostrarPedido($pedido){
        ?>
        <main class="container mt-5">
            <section class="objetos">
                
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Nº Pedido</th>
                            <td><?= $pedido->id_pedido ?></td>
                        </tr>
                        <tr>
                            <th>Estado</th>
                            <td><?= $pedido->estado ?></td>
                        </tr>
                        <tr>
                            <th>Origen</th>
                            <td><?= $pedido->origen ?></td>
                        </tr>
                        <tr>
                            <th>Destino</th>
                            <td><?= $pedido->destino ?></td>
                        </tr>
                        <tr>
                            <th>Fecha de Entrega</th>
                            <td><?= $pedido->fechaentrega ?></td>
                        </tr>
                        <tr>
                            <th>Precio</th>
                            <td>$<?= $pedido->precio ?></td>
                        </tr>
                        <tr>
                            <th>ID Cliente</th>
                            <td><?= $pedido->id_cliente ?></td>
                        </tr>
                        
                    </tbody>
                </table>

            </section>
            <a href=<?= BASE_URL ?> >Volver al menu</a>
        </main>
        <?php
    }
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

                        <button type="submit" class="btn btn-success">Guardar Pedido</button>
                    </form>
                </div>
            </div>
        </main>
        <?php
    }
    public function Error(string $error){
        require_once 'Pagina/vistas/errorVista.php';
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

                        <button type="submit" class="btn btn-warning">Actualizar Pedido</button>
                        <a href="<?= BASE_URL ?>" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </main>
        <?php
    }
}