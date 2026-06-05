<?php
class SessionMiddleware {
    public function run($req) {
        // Vemos si tiene un id
        if (isset($_SESSION["id_admin"])) {
            // si esta creo un objeto con los datos del admin
            $req->user = new StdClass();
            $req->user->id = $_SESSION["id_admin"];
            $req->user->nombre = $_SESSION["nombre"];
        } else {
            $req->user = null;
        }
        //devuelvo el usuario
        return $req;
    }
}