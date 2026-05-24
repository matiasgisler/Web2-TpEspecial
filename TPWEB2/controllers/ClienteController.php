<?php

require_once __DIR__ . '/../helpers/AuthHelper.php';

class ClienteController {
    private $modelo;
    private $vista;

    public function __construct($modelo, $vista) {
        $this->modelo = $modelo;
        $this->vista = $vista;
    }

    public function listar() {
        $clientes = $this->modelo->conseguirClientes();
        $this->vista->mostrarClientes($clientes);
    }

    public function mostrarFormularioAgregar() {
        AuthHelper::verificarLogin();
        $this->vista->formAgregar();
    }

    public function agregar() {
        AuthHelper::verificarLogin();
        
        $nombre = $_POST['nombre'];
        $empresa = $_POST['empresa'];
        $contacto = $_POST['contacto'];
        $imagen_url = $_POST['imagen_url'] ?? ''; 

        $this->modelo->insertarCliente($nombre, $empresa, $contacto, $imagen_url);
        header('Location: ' . BASE_URL . 'clientes');
    }

    public function mostrarFormularioEditar($id) {
        AuthHelper::verificarLogin();
        $cliente = $this->modelo->conseguirClientePorId($id);

        if ($cliente) {
            $this->vista->formEditar($cliente);
        } else {
            header('Location: ' . BASE_URL . 'clientes');
        }
    }

    public function editar($id) {
        AuthHelper::verificarLogin();
        
        $nombre = $_POST['nombre'];
        $empresa = $_POST['empresa'];
        $contacto = $_POST['contacto'];
        $imagen_url = $_POST['imagen_url'] ?? '';

        $this->modelo->editarCliente($id, $nombre, $empresa, $contacto, $imagen_url);
        header('Location: ' . BASE_URL . 'clientes');
    }

    public function eliminar($id) {
        AuthHelper::verificarLogin();
        $this->modelo->eliminarCliente($id);
        header('Location: ' . BASE_URL . 'clientes');
    }
}