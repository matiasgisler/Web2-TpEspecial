<?php

session_start();
// No debe haber NADA antes de <?php
require_once __DIR__ . '/helpers/AuthHelper.php';
require_once __DIR__ . '/models/ClienteModel.php';
require_once __DIR__ . '/models/PedidoModel.php';
require_once __DIR__ . '/views/ClienteView.php';
require_once __DIR__ . '/views/PedidoView.php';
require_once __DIR__ . '/controllers/ClienteController.php';
require_once __DIR__ . '/controllers/PedidoController.php';
require_once __DIR__ . '/controllers/AuthController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$params = explode('/', $_GET['action'] ?? 'clientes');
$accion = $params[0];
$id = $params[1] ?? null;

switch ($accion) {
    case 'clientes':
        $controlador = new ClienteController(new ClienteModel(), new ClienteView());
        $controlador->listar();
        break;
    case 'formAgregarCliente':
        $controlador = new ClienteController(new ClienteModel(), new ClienteView());
        $controlador->mostrarFormularioAgregar();
        break;
    case 'agregarCliente':
        $controlador = new ClienteController(new ClienteModel(), new ClienteView());
        $controlador->agregar();
        break;
    case 'formEditarCliente':
        $controlador = new ClienteController(new ClienteModel(), new ClienteView());
        $controlador->mostrarFormularioEditar($id);
        break;
    case 'editarCliente':
        $controlador = new ClienteController(new ClienteModel(), new ClienteView());
        $controlador->editar($id);
        break;
    case 'eliminarCliente':
        $controlador = new ClienteController(new ClienteModel(), new ClienteView());
        $controlador->eliminar($id);
        break;
    case 'pedidosPorCliente':
        if ($id) {
            $controlador = new PedidoController(new PedidoModel(), new PedidoView());
            $controlador->listarPorCliente($id);
        } else {
            header('Location: ' . BASE_URL . 'clientes');
        }
        break;
    case 'formAgregarPedido':
        $controlador = new PedidoController(new PedidoModel(), new PedidoView());
        $controlador->mostrarFormularioAgregar();
        break;
    case 'agregarPedido':
        $controlador = new PedidoController(new PedidoModel(), new PedidoView());
        $controlador->agregar();
        break;
    case 'formEditarPedido':
        $controlador = new PedidoController(new PedidoModel(), new PedidoView());
        $controlador->mostrarFormularioEditar($id);
        break;
    case 'editarPedido':
        $controlador = new PedidoController(new PedidoModel(), new PedidoView());
        $controlador->editar($id);
        break;
    case 'eliminarPedido':
        $controlador = new PedidoController(new PedidoModel(), new PedidoView());
        $controlador->eliminar($id);
        break;
    case 'login':
        $controlador = new AuthController();
        $controlador->mostrarLogin();
        break;
    case 'autenticar':
        $controlador = new AuthController();
        $controlador->autenticar();
        break;
    case 'logout':
        $controlador = new AuthController();
        $controlador->logout();
        break;
    default:
        header('Location: ' . BASE_URL . 'clientes');
        break;
}