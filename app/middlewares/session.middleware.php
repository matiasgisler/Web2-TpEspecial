<?php
class SessionMiddleware {
    public function run($req) {
        
        session_start();
        
        // ver si tiene un id
        if (isset($_SESSION["id_admin"])) {
            $req->user = new StdClass();
            $req->user->id = $_SESSION["id_admin"];
            $req->user->nombre = $_SESSION["nombre"];
        } else {
            $req->user = null;
        }
        
        return $req;
    }
}