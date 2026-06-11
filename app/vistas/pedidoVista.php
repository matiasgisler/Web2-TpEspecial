<?php

class pedidoVista {

    
    
    public function listaPedidos($objetos, $nombre = null ) {
        
        ?>
        
        <main class="container mt-5">
            <div class="alert alert-success d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Bienvenido <?= $nombre  ?></h1>
                    </div>
            </div>
            <?php if (isset($nombre)) { ?>
                <div class="alert alert-success d-flex justify-content-between align-items-center">
                    <a href="<?= BASE_URL ?>nuevo_pedido" class="btn btn-success btn-sm">Agregar Nuevo Pedido</a>
                    <a href="<?= BASE_URL ?>cerrar_sesion" class="btn btn-outline-danger btn-sm">Cerrar Sesión</a>
                </div>
            <?php } else { ?>
                <div class="alert alert-secondary">
                    <h1>Estás navegando como invitado.</h1>
                    <a href="<?= BASE_URL ?>mostrar_login" class="btn btn-primary btn-sm">Iniciar Sesión</a>
                </div>
            <?php } ?>
            
            <section class="objetos row">
                <?php foreach ($objetos as $objeto) { ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <hr> <a href="<?= BASE_URL ?>pedido/<?= $objeto->id_pedido ?>" class="btn btn-outline-primary btn-sm">Ver Pedido</a>
                                <h5 class="card-title">Id Del Pedido: <?= $objeto->id_pedido ?></h5>
                                <h5 class="card-title">Estado Del Pedido: <?= $objeto->estado ?></h5>
                                <?php if (isset($nombre)) { ?>
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
    public function mostrarPedido($pedido){
       
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
                        <?php if (!empty($pedido->imagen_url)): ?>
                        <tr>
                            <th>Imagen</th>
                            <td><img src="<?= $pedido->imagen_url ?>" alt="Imagen del pedido" style="max-width: 300px; border-radius: 8px;"></td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </section>
            <a href=<?= BASE_URL ?> >Volver al menu</a>
        </main>
        <?php
        
    }
    
    public function Error(string $error){
        require_once 'Pagina/vistas/errorVista.php';
    }

}