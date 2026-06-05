<?php
class GuardMiddleware {
    public function run($req) {
        //si esta logueado no hacemos nada, sino lo mandamos a loguearse
        if (!$req->user) {
            
            header("Location: ". BASE_URL . "mostrar_login");
            die(); 
        }
        
        // Si el usuario sí existe, lo dejamos pasar devolviendo la solicitud intacta
        return $req;
    }
}