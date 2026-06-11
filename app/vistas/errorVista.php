<?php 

class errorVista {
    
    public function mostrarError(String $error) {
        ?>
        <main class="container">
            <h4>Error!</h4>
            <p><?= $error ?? 'Ocurrió un error inesperado.' ?></    p>
            <hr>
            <a href=<?= BASE_URL ?> >Volver al menu</a>
        </main>
        <?php
    }
}