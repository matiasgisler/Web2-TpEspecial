# Web2-TpEspecial
#Integrantes

Gisler Matias - 47089429 - matiasngisler@gmail.com
Cortés Marcelo - 45297121 - marianocortes1423@gmail.com

#Tematica 

Pagina web de fletes

#Descripcion

Un sistema dinamico que permite a los usuarios publicos el poder observar invidualmente la informacion de un producto, poder ver un listado o filtrarlos por categoria, los administradores ademas van a tener el privilegio del sistema ABM para los productos. 

Usuario publico
(Requerimiento A):
Listado y Detalle de Ítems: Ver lista de pedidos y poder ver individualmente cada pedido con su informacion
(Requerimiento B):
Listado y Filtro por Categoría: Ver lista de categorias y poder observar los pedidos correspondientes a una categoria seleccionada 

Usuario admin
(Requerimiento A):
Autenticación y Sesiones: Formulario de Login, procesamiento y control de accesos en el ruteo mediante middlewares según el nivel de usuario.
ABM de Perfumes: Sistema de ABM de la entidad Perfumes, permitiendo el alta con selección dinámica de categorías, edición y baja.
(Requerimiento B):
ABM de Categorías: ABM completo de la entidad Categorías para dar de alta, editar y borrar categorias de pedidos, protegiendo los datos mediante integridad referencial.
Cierre de Sesión: Funcionalidad de Logout para desloguearse de forma segura.

Cómo desplegar el sitio
Pasos:
Copiar el repositorio dentro de la carpeta htdocs de XAMPP.
Iniciar los servicios de Apache y MySQL desde el Panel de Control de XAMPP.
Entrar a la URL http://localhost/phpmyadmin/, crear una base de datos llamada "fletestransporte" y importar nuestra BD
Acceder desde el navegador a la URL del proyecto: http://localhost/TPESPECIALWEB2/Pagina/inicio (o reemplazar por el nombre asignado a la carpeta del repositorio).

Usuario administrador
Para poder utilizar el ABM de categorias y de pedidos debera utilizar el siguiente usuario:

Usuario: webadmin
Contraseña: admin
