<?php
class vistaLoginAdmin{
    
    public function mostrarVistaDelLogin(){
        ?>
        <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <title>Login Administrador</title>
            </head>
            <body>

                <h2>Ingreso para Administradores</h2>

                <form method="POST" action="login">
                    
                    <label>Nombre de Usuario:</label>
                    <input type="text" name="nombre" required>
                    <br><br>

                    <label>Contraseña:</label>
                    <input type="password" name="contrasenia" required>
                    <br><br>

                    <button type="submit">Iniciar Sesión</button>

                </form>

            </body>
            </html>
            <?php
    }
        

}
