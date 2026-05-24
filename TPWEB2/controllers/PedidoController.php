<?php

require_once __DIR__ . '/../helpers/AuthHelper.php';
require_once __DIR__ . '/../models/ClienteModel.php';

class PedidoController {
    private $modelo;
    private $vista;

    public function __construct($modelo, $vista) {
        $this->modelo = $modelo;
        $this->vista = $vista;
    }

    public function listarPorCliente($id_cliente) {
        $pedidos = $this->modelo->conseguirPedidosPorCliente($id_cliente);
        $this->vista->mostrarPedidos($pedidos);
    }

    public function mostrarFormularioAgregar() {
        AuthHelper::verificarLogin(); 
        $clienteModel = new ClienteModel();
        $clientes = $clienteModel->conseguirClientes(); 
        $this->vista->formAgregar($clientes);
    }

    public function agregar() {
        AuthHelper::verificarLogin();
        
        $origen = $_POST['origen'];
        $destino = $_POST['destino'];
        $fechaentrega = $_POST['fechaentrega'];
        $precio = $_POST['precio'];
        $estado = $_POST['estado']; 
        $id_cliente = $_POST['id_cliente']; 

        $this->modelo->insertarPedido($estado, $origen, $destino, $fechaentrega, $precio, $id_cliente);
        header('Location: ' . BASE_URL . 'pedidosPorCliente/' . $id_cliente);
    }

    public function mostrarFormularioEditar($id) {
        AuthHelper::verificarLogin();
        $pedido = $this->modelo->conseguirPedidoPorId($id);
        
        if ($pedido) {
            $clienteModel = new ClienteModel();
            $clientes = $clienteModel->conseguirClientes(); 
            $this->vista->formEditar($pedido, $clientes);
        } else {
            header('Location: ' . BASE_URL . 'clientes');
        }
    }

    public function editar($id) {
        AuthHelper::verificarLogin();
        
        $origen = $_POST['origen'];
        $destino = $_POST['destino'];
        $fechaentrega = $_POST['fechaentrega'];
        $precio = $_POST['precio'];
        $estado = $_POST['estado'];
        $id_cliente = $_POST['id_cliente']; 

        $this->modelo->editarPedido($id, $estado, $origen, $destino, $fechaentrega, $precio, $id_cliente);
        header('Location: ' . BASE_URL . 'pedidosPorCliente/' . $id_cliente);
    }

    public function eliminar($id) {
        AuthHelper::verificarLogin();
        $pedido = $this->modelo->conseguirPedidoPorId($id);

        if ($pedido) {
            $this->modelo->eliminarPedido($id);
            header('Location: ' . BASE_URL . 'pedidosPorCliente/' . $pedido->id_cliente);
        } else {
            header('Location: ' . BASE_URL . 'clientes');
        }
    }
}