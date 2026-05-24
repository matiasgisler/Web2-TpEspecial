<?php

class ClienteModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=fletestransporte;charset=utf8', 'root', '');
    }

    public function conseguirClientes() {
        $query = $this->db->prepare('SELECT * FROM clientes');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function conseguirClientePorId($id) {
        $query = $this->db->prepare('SELECT * FROM clientes WHERE id_cliente = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertarCliente($nombre, $empresa, $contacto, $imagen_url) {
        $query = $this->db->prepare('INSERT INTO clientes(nombre, empresa, contacto, imagen_url) VALUES(?, ?, ?, ?)');
        $query->execute([$nombre, $empresa, $contacto, $imagen_url]);
    }

    public function editarCliente($id, $nombre, $empresa, $contacto, $imagen_url) {
        $query = $this->db->prepare('UPDATE clientes SET nombre = ?, empresa = ?, contacto = ?, imagen_url = ? WHERE id_cliente = ?');
        $query->execute([$nombre, $empresa, $contacto, $imagen_url, $id]);
    }

    public function eliminarCliente($id) {
        $query = $this->db->prepare('DELETE FROM clientes WHERE id_cliente = ?');
        $query->execute([$id]);
    }
}