<?php

class PedidoModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=fletestransporte;charset=utf8', 'root', '');
    }

    public function conseguirPedidosPorCliente($id_cliente) {
        $query = $this->db->prepare(
            'SELECT p.*, c.nombre AS cliente_nombre 
             FROM pedidos p
             JOIN clientes c ON p.id_cliente = c.id_cliente
             WHERE p.id_cliente = ?'
        );
        $query->execute([$id_cliente]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function conseguirPedidoPorId($id) {
        $query = $this->db->prepare('SELECT * FROM pedidos WHERE id_pedido = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertarPedido($estado, $origen, $destino, $fechaentrega, $precio, $id_cliente) {
        $query = $this->db->prepare(
            'INSERT INTO pedidos(estado, origen, destino, fechaentrega, precio, id_cliente) 
             VALUES(?, ?, ?, ?, ?, ?)'
        );
        $query->execute([$estado, $origen, $destino, $fechaentrega, $precio, $id_cliente]);
    }

    public function editarPedido($id, $estado, $origen, $destino, $fechaentrega, $precio, $id_cliente) {
        $query = $this->db->prepare(
            'UPDATE pedidos 
             SET estado = ?, origen = ?, destino = ?, fechaentrega = ?, precio = ?, id_cliente = ? 
             WHERE id_pedido = ?'
        );
        $query->execute([$estado, $origen, $destino, $fechaentrega, $precio, $id_cliente, $id]);
    }

    public function eliminarPedido($id) {
        $query = $this->db->prepare('DELETE FROM pedidos WHERE id_pedido = ?');
        $query->execute([$id]);
    }
}