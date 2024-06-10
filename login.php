<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accesos</title>
        <link rel="stylesheet" href="assets/css/estilos.css">
        <script>
        function validateForm() {
            var name = document.forms["userForm"]["nombre_completo"].value;
            var email = document.forms["userForm"]["correo"].value;
            var username = document.forms["userForm"]["nombre_usuario"].value;
            var password = document.forms["userForm"]["contrasena"].value;
            if (name == "" || email == "" || username == "" || password == "") {
                alert("Ingrese Todos los Datos Por Favor");
                return false;
            }
            return true;
            }
        </script>
    </head>
    <body>
    <header>
            <h1>
                <center>
                    <script>
                        document.write('ArLøp');
                    </script>
                </center>
            </h1>
        </header>
        <main>
            <div class="contenedor__todo">

                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>Ya tienes una Cuenta?</h3>
                        <p>Inicia Sesion para Acceder en la Pagina Principal</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesion</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>Aun no Tienes Cuenta?</h3>
                        <p>Registrate para Poder Iniciar Sesion</p>
                        <button id="btn__registrarse">Registrarse</button>
                    </div>
                </div>

                <div class="contenedor__login-register">
                    <form action="sistemadelogin.php" method="post">
                        <label for="username">Usuario:</label>
                        <input type="text" id="username" name="username"><br><br>
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password"><br><br>
                        <input type="submit" value="Ingresar">
                    </form>
                        <script>
                            function validarFormulario() {
                                var nombre_usuario = document.getElementById("nombre_usuario").value;
                                var contrasena = document.getElementById("contrasena").value;

                                if (nombre_usuario === "" || contrasena === "") {
                                    alert("Por favor, Complete los Campos");
                                    return false;
                                }
                                return true;
                            }
                        </script>
                    </form>

                    <form action="insertar_usuario.php" method="post" class="formulario__register">
                        <h2>Registro de Usuario</h2>
                        <form name="userForm" action="insertar_usuario.php" method="post" onsubmit="return validateForm()">
                            <label for="nombre_completo">Nombre Completo:</label><br>
                            <input type="text" id="nombre_completo" name="nombre_completo"><br><br>
                            <label for="correo">Correo:</label><br>
                            <input type="email" id="correo" name="correo"><br><br>
                            <label for="nombre_usuario">Nombre de Usuario:</label><br>
                            <input type="text" id="nombre_usuario" name="nombre_usuario"><br><br>
                            <label for="contrasena">Contraseña:</label><br>
                            <input type="password" id="contrasena" name="contrasena"><br><br>
                            <input type="submit" value="Registrar">
                        </form>
                    </form>
                </div>
            </div>
        </main>
        <script src="assets/js/script.js"></script>        
    </body>
</html>