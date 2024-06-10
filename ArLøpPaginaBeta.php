<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Previsualizacion</title>
        <link rel="stylesheet" href="assets/css/designmainmenu.css">
        <script>
            alert("Bienvenido/a de Vuelta :D");
        </script>
    </head>

    <!--COMANDOS DEL SISTEMA-->

    <script>
            
    </script>

    <!--COMANDOS DEL SISTEMA-->

    <body>
    <center>
        <script>
            function animateLines() {
            const line1 = document.querySelector('.line-1');
            const line2 = document.querySelector('.line-2');
            const line3 = document.querySelector('.line-3');
            const line4 = document.querySelector('.line-4');
        
            line1.style.height = `${getRandomHeight(30)}px`;
            line2.style.height = `${getRandomHeight(50)}px`;
            line3.style.height = `${getRandomHeight(80)}px`;
            line4.style.height = `${getRandomHeight(50)}px`;
        }
        
        function getRandomHeight(max) {
            return Math.floor(Math.random() * max) + 1;
        }

        document.addEventListener('DOMContentLoaded', () => {
    const navbarItems = document.querySelectorAll('.navbar-item');

    navbarItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            const submenu = item.querySelector('.submenu');
            submenu.style.display = 'block';
            setTimeout(() => {
                submenu.style.opacity = '1';
                submenu.style.transform = 'translateY(0)';
            }, 10);
        });

        item.addEventListener('mouseleave', () => {
            const submenu = item.querySelector('.submenu');
            submenu.style.opacity = '0';
            submenu.style.transform = 'translateY(-10px)';
            setTimeout(() => {
                submenu.style.display = 'none';
            }, 300);
        });
    });
});

        setInterval(animateLines, 1000);

        function mostrarModal(id) {
        document.getElementById(id).style.display = "flex"; // Modificado para usar flexbox
    }

    function cerrarModal(id) {
        document.getElementById(id).style.display = "none";
    }

    window.onclick = function(event) {
        var modals = document.getElementsByClassName('modal');
        for (var i = 0; i < modals.length; i++) {
            var modal = modals[i];
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
        </script>
            <header>
                <div class="line-container">
                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                    <div class="line line-3"></div>
                    <div class="line line-4"></div>
                </div>
                <h1>
                    <div class="logo">
                        <script>
                            document.write('ArLøp');
                        </script>
                    </div>
                </h1>
                <h3>
                    <center>
                        <script>
                            document.write('Compra Instrumentos Musicales de tu Gusto y desde donde sea');
                        </script>
                    </center>
                </h3>                
                </div>
            </header>
        </center>

        <nav class="navbar">
            <ul class="navbar-list">
                <li class="navbar-item">
                    <a href="#" class="navbar-link"><h2>Servicios</h2></a>
                    <div class="submenu">
                        <p>Servicios</p>
                        <br>
                        <a href="RecordatoriodeIniciodeIniciodeSesion.html" class="nav-link">Comprar Guitarras Acusticas</a><br>
                        <br>
                        <a href="RecordatoriodeIniciodeIniciodeSesion.html" class="nav-link">Comprar Guitarras Electricas</a><br>
                        <br>
                        <a href="RecordatoriodeIniciodeIniciodeSesion.html" class="nav-link">Comprar Bajos Electricos</a><br>
                        <br>
                        <a href="RecordatoriodeIniciodeIniciodeSesion.html" class="nav-link">Comprar Baterias</a><br>
                        <br>
                        <a href="RecordatoriodeIniciodeIniciodeSesion.html" class="nav-link">Comprar Acordeones</a><br>
                        <br>
                        <a href="RecordatoriodeIniciodeIniciodeSesion.html" class="nav-link">Comprar Pedales</a><br>
                        <br>                        
                    </div>
                </li>
                <li class="navbar-item">
                    <a href="#" class="navbar-link"><h2>Informacion Basica</h2></a>
                    <div class="submenu">
                        <p>Informacion Basica</p>

                        <a href="#" onclick="mostrarModal('modal1')" class="nav-link">Informacion del Creador</a>
                        <br><br>
                        <a href="#" onclick="mostrarModal('modal2')" class="nav-link">Bases de Inspiracion</a>

                        <div id="modal1" class="modal">
                            <div class="modal-content">
                                <span class="close" onclick="cerrarModal('modal1')">&times;</span>
                                <h3>Informacion del Creador:</h3>
                                <p>Pagina creada, diseñada y desarrollada por Arenas Lopez Jose Leonardo Daniel, Alumno del Centro de Bachillerato Tecnologico Industrial y de Servicios N°225</p>
                            </div>
                        </div>

                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <span class="close" onclick="cerrarModal('modal2')">&times;</span>
                                <h3>Bases de Inspiracion</h3>
                                <p>Diseño inspirado en el desarrollo web moderno.</p>
                                <br>
                                <p>Estructura de la pagina inspirada en la estructura de la pagina web de Paruno:  <a href="https://paruno.com/pages/tienda-paruno" class="nav-link" style="font-family: sans-serif;">https://paruno.com/pages/tienda-paruno</a></p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="navbar-item">
                    <a href="#" class="navbar-link"><h2>Acerca de </h2></a>
                    <div class="submenu">
                        <p>Acerca de</p>

                        <a href="#" onclick="mostrarModal('modal3')" class="nav-link">Proposito de la Pagina</a>
                        <br><br>
                        <a href="#" onclick="mostrarModal('modal4')" class="nav-link">Creditos</a>

                        <div id="modal3" class="modal">
                            <div class="modal-content">
                                <span class="close" onclick="cerrarModal('modal3')">&times;</span>
                                <h3>Proposito de la Pagina:</h3>
                                <p>La pagina es un proyecto de fin semestral de la materia de especialidad, mostrando el problema planteado como la dificultad para comprar instrumentos musicales en linea, asi mismo mostrando solo una base de reprecentacion visual de una pagina que pueda ayudar </p>
                            </div>
                        </div>

                        <div id="modal4" class="modal">
                            <div class="modal-content">
                                <span class="close" onclick="cerrarModal('modal4')">&times;</span>
                                <h3>Creditos:</h3>
                                <h4>Creador y Fundador del proyecto:</h4>
                                <p1>Arenas Lopez Jose Leonardo Daniel</p1>
                                <h4>Desarrollador:</h4>
                                <p1>Arenas Lopez Jose Leonardo Daniel</p1>
                                <h4>Diseñador:</h4>
                                <p1>Arenas Lopez Jose Leonardo Daniel</p1>
                                <h4>Fuentes de Inspiracion:</h4>
                                <p1>paruno.com</p1>
                                <h4>Herramientas del Desarrollo:</h4>
                                <p1>Visual Studio Code</p1>
                                <p1>XAMPP</p1>
                                <br>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="navbar-item">
                    <a href="#" class="navbar-link"><h2>Registrarse</h2></a>
                    <div class="submenu">
                        <p>Cuenta</p>
                        <a href="login.php" class="nav-link">Registrarse</a><br>
                        <br>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="section">
            <div class="small-container">
                <a href="ArLøpInstrumentosBeta.php#electric-guitars-section" class="box small" style="background-image: url('https://images.unsplash.com/photo-1564186763535-ebb21ef5277f?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Z3VpdGFyfGVufDB8fDB8fHww');">
                    <div class="content">Guitarras Electricas</div>
                </a>
                <a href="ArLøpInstrumentosBeta.php#acoustic-guitars-section" class="box small" style="background-image: url('https://wallpapercave.com/wp/6coseCd.jpg');">
                    <div class="content">Guitarras Acusticas</div>
                </a>
            </div>
                <a href="ArLøpInstrumentosBeta.php#electric-bass-section" class="box large" style="background-image: url('https://toppng.com/uploads/preview/guitars-bass-guitar-electric-guitar-musical-instruments-11570026616qvrhkdaq6f.jpg');">
                <div class="content">Bajos Electricos</div>
                </a>
            </div>
            <div class="section">
                <a href="ArLøpInstrumentosBeta.php#drums-section" class="box large" style="background-image: url('https://img.freepik.com/free-photo/drums-conceptual-image_1204-197.jpg');">
                <div class="content">Baterias</div>
                </a>
            <div class="small-container">
                <a href="ArLøpInstrumentosBeta.php#acordions-section" class="box small" style="background-image: url('https://bluestarbiz.com/wp-content/uploads/2023/04/midjourney-ai-photograph_blue_accordion.png');">
                    <div class="content">Acordeones</div>
                </a>
                <a href="ArLøpInstrumentosBeta.php#pedals-section" class="box small" style="background-image: url('https://c0.wallpaperflare.com/preview/630/905/103/united-states-rancho-cucamonga-abundant-living-family-church-bass.jpg');">
                    <div class="content">Pedales</div>
                </a>
            </div>
        </div>
        <div class="separador-body-footer"></div>
        <footer>
            <h4><br>
            <center>
                <script>
                    document.write('Derechos de la Pagina pertenecientes al Alumno Arenas Lopez Jose Leonardo Daniel 2024-3025')
                </script>
            </center>
            </h4>
            <h3>
                <center>
                    <script>
                        document.write('Siguenos: ');
                    </script>
                </center>
            </h3>
            <div class="footer-images">
                <a href="https://x.com">
                    <img src="https://img.freepik.com/vector-gratis/twitter-nuevo-logotipo-2023-x-vector-fondo-blanco_1017-45422.jpg?size=338&ext=jpg&ga=GA1.1.44546679.1716854400&semt=ais_user.pgn" target="_blank">
                </a>
                <a href="https://www.instagram.com">
                    <img src="https://st3.depositphotos.com/19462672/31775/v/450/depositphotos_317755034-stock-illustration-camera-icon-design-flat-vector.jpg" target="_blank">
                </a>
                <a href="https://www.whatsapp.com" target="_blank">
                    <img src="https://i.pinimg.com/736x/48/6f/ed/486fed864a0f026cd42d1177db0ba680.jpg">
                </a>
                <a href="https://www.youtube.com" target="_blank">
                    <img src="https://img.freepik.com/vector-premium/icono-logotipo-youtube-logotipo-youtube-contorno-negro_197792-4748.jpg?w=2000">
            </div>
        </footer> 
    </body>
</html>