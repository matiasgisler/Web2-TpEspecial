<?php
require_once __DIR__ . '/./controladores/fleteControlador.phtml';
require_once __DIR__ . '/./controladores/loginControlador.phtml';
require_once __DIR__ . '/./vistas/vistaLogin.php';
require_once __DIR__ . '/./middlewares/session.middleware.php';
require_once __DIR__ . '/./middlewares/guard.middleware.php';
// Encendemos la sesion
session_start();
// define la base URL del sitio
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
// accion por default
$action = 'inicio';

// leo la accion que viene por parámetro
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$params = explode('/', $action);

$req = new StdClass();
$req = (new SessionMiddleware())->run($req);
// rutea según la acción
switch($params[0]){
    case 'inicio':
        $controlador=new Controlador();
        $controlador -> mostrarInicio($req);
        break;
    case 'pedido':
        $id = $params[1] ?? null;
        $fleteControlador = new Controlador();
        $fleteControlador->mostrarNoticia($id);
    break;
    case 'mostrar_login':
        $loginControlador = new LoginControlador();
        $loginControlador->mostrarFormulario();
    break;
    case 'login':
        $loginControlador = new LoginControlador();
        $loginControlador->procesarLogin();
        break;
    case 'nuevo_pedido':
        // verificar si esta logueado
        $req = (new GuardMiddleware())->run($req);
        
        $fleteControlador = new Controlador();
        $fleteControlador->mostrarFormularioAgregar($req);
        break;
    case 'guardar_pedido':
        // verificar si esta logueado
        $req = (new GuardMiddleware())->run($req);
        
        $fleteControlador = new Controlador();
        $fleteControlador->agregarPedido();
        break;
    case 'eliminar_pedido':
        // verificar si esta logueado
        $req = (new GuardMiddleware())->run($req);
        
        //id del pedido a eliminar
        $id = $params[1] ?? null;
        $fleteControlador = new Controlador();
        $fleteControlador->borrarPedido($id);
        break;
    case 'editar_pedido':
        // verificar si esta logueado
        $req = (new GuardMiddleware())->run($req);
        //id del pedido a editar
        $id = $params[1] ?? null;
        
        // 3. Llamamos al controlador
        $fleteControlador = new Controlador();
        $fleteControlador->mostrarFormularioEditar($id, $req);
        break;
    case 'actualizar_pedido':
        // verificar si esta logueado
        $req = (new GuardMiddleware())->run($req);
        
        //id del pedido a actualizar
        $id = $params[1] ?? null;
        
        $fleteControlador = new Controlador();
        $fleteControlador->editarPedido($id);
        break;
    default:
        echo '404 error';
        break;
}

