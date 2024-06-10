<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Productos</title>
    </head>
    <link rel="stylesheet" href="assets/css/design-instrumentos.css">    
    <script>
            function toggleMode() {
                const body = document.querySelector('body');
                const modeText = document.getElementById('mode-text');
                if (body.classList.contains('dark-mode')) {
                    body.classList.remove('dark-mode');
                    modeText.textContent = 'Modo Claro';
                } else {
                    body.classList.add('dark-mode');
                    modeText.textContent = 'Modo Oscuro';
                }
            }
        
            function openSidebar(sidebarId) {
                document.getElementById(sidebarId).style.display = "block";
                setTimeout(() => {
                    document.getElementById(sidebarId).style.width = "40%";
                    document.getElementById("overlay").style.display = "block";
                    document.getElementById("overlay").style.background = "rgba(0, 0, 0, 0.5)";
                    document.body.classList.add("dimmed");
                }, 10); // Breve retraso para activar la transición
            }
            
            function closeSidebar(sidebarId) {
                document.getElementById(sidebarId).style.width = "0";
                document.getElementById("overlay").style.background = "rgba(0, 0, 0, 0)";
                document.body.classList.remove("dimmed");
                setTimeout(() => {
                    document.getElementById("overlay").style.display = "none";
                    document.getElementById(sidebarId).style.display = "none";
                }, 500); // Coincidir con la duración de la transición
            }
            
            function closeAllSidebars() {
                const sidebars = document.querySelectorAll('.sidebar');
                sidebars.forEach(sidebar => {
                    sidebar.style.width = "0";
                });
                document.getElementById("overlay").style.background = "rgba(0, 0, 0, 0)";
                document.body.classList.remove("dimmed");
                setTimeout(() => {
                    document.getElementById("overlay").style.display = "none";
                    sidebars.forEach(sidebar => {
                        sidebar.style.display = "none";
                    });
                }, 500); // Coincidir con la duración de la transición
            }

            function procesarCompra(precioInicial, cantidadInputId, cantidadDisplayId) {
                const cantidadInput = document.getElementById(cantidadInputId);
                const cantidadDisplay = document.getElementById(cantidadDisplayId);
                let cantidad = parseInt(cantidadDisplay.innerText);
    
                const valorIngresado = parseInt(cantidadInput.value);
                if (isNaN(valorIngresado) || valorIngresado <= 0 || valorIngresado > 15) {
                    alert("Por Favor Ingrese Un Numero Valido");
                    return;
                }
    
                const resultado = precioInicial * valorIngresado;
                const continuar = confirm(`El total es $${resultado}. ¿Deseas proceder con la compra?`);
    
                if (continuar) {
                    cantidad -= valorIngresado;
                    if (cantidad <= 0) {
                        alert("Lo sentimos, el producto está agotado.");
                        cantidadDisplay.innerText = 0;
                    } else {
                        alert("Compra realizada");
                        cantidadDisplay.innerText = cantidad;
                    }
                } else {
                    alert("Compra cancelada");
                }
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

function getRandomHeight(max) {
            return Math.floor(Math.random() * max) + 1;
        }
        
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
        
        setInterval(animateLines, 1000);


        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(event) {
                const cantidadInput = this.querySelector('[name="cantidad"]');
                const cantidad = parseInt(cantidadInput.value, 10);

                if (cantidad <= 0) {
                    event.preventDefault();
                    alert('La cantidad debe ser mayor que 0.');
                }
            });
        });

        function procesarCompra(event, seccion) {
            event.preventDefault();
            const form = event.target;
            const cantidad = form.cantidad.value;

            fetch('comprar.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({
                    seccion: seccion,
                    cantidad: cantidad
                })
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                location.reload();
            })
            .catch(error => {
                alert('Hubo un error, inténtalo de nuevo.');
                location.reload();
            });
        }

        document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function(event) {
        const cantidadInput = this.querySelector('[name="cantidad"]');
        const cantidad = parseInt(cantidadInput.value, 10);

        if (cantidad <= 0) {
            event.preventDefault();
            alert('La cantidad debe ser mayor que 0.');
        }
    });
});

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

    function confirmarCierreSesion(event) {
            event.preventDefault(); // Prevenir la acción por defecto del enlace
            if (confirm("¿Estás seguro de que deseas cerrar sesión?  :c ")) {
                alert("Sesión cerrada :c");
                window.location.href = "inicio.php"; // Redireccionar a otra página
            } else {
                // Si el usuario cancela, no hacemos nada y el usuario permanece en la misma página
                return false;
            }
        }
</script>

        </script>
    <!--COMANDOS DE DISEÑO-->

    <body>
        <center>
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
                            document.write('Instrumentos Musicales en Venta / Compra de Instrumentos Musicales');
                        </script>
                    </center>
                </h3>                
                </div>
            </header>
        </center>
        <nav class="navbar">
            <ul class="navbar-list">
                <li class="navbar-item">
                    <a href="#" class="navbar-link"><h2>Inicio</h2></a>
                    <div class="submenu">
                        <p>Inicio</p>
                        <br>
                        <a href="ArLøpPaginaPrincipal.php" class="nav-link">Pagina Principal</a><br>
                        <br>
                        <a href="#" class="nav-link">Informacion Basica</a><br>
                        <br>
                        <a href="#" class="nav-link">Acerca de</a><br>
                        <br>
                        <a href="#" class="nav-link">Cuenta</a><br>
                        <br>
                        <a href="#" onclick="confirmarCierreSesion(event)" class="nav-link">Cerrar Sesión</a>

                    </div>
                </li>
                <li class="navbar-item">
                    <a href="#" class="navbar-link"><h2>Servicios</h2></a>
                    <div class="submenu">
                        <p>Servicios</p>
                        <br>
                        <a href="#acoustic-guitars-section" class="nav-link">Comprar Guitarras Acusticas</a><br>
                        <br>
                        <a href="#electric-guitars-section" class="nav-link">Comprar Guitarras Electricas</a><br>
                        <br>
                        <a href="#electric-bass-section" class="nav-link">Comprar Bajos Electricos</a><br>
                        <br>
                        <a href="#drums-section" class="nav-link">Comprar Baterias</a><br>
                        <br>
                        <a href="#acordions-section" class="nav-link">Comprar Acordeones</a><br>
                        <br>
                        <a href="#pedals-section" class="nav-link">Comprar Pedales</a><br>
                        <br>
                        <a href="#ArLøpBuyInstruments.php" class="nav-link">Vender Instrumentos</a><br>
                        
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
                </li>
                <li class="navbar-item">
                    <a href="#" class="navbar-link"><h2>Cuenta</h2></a>
                    <div class="submenu">
                        <p>Cuenta</p>
                        <a href="login.php" class="nav-link">Crear Otra Cuenta</a><br>
                        <br>
                        <a href="#" onclick="confirmarCierreSesion(event)" class="nav-link">Cerrar Sesión</a>
                    </div>
                </li>
            </ul>
        </nav>

        
        <div id="overlay" class="overlay" onclick="closeAllSidebars()"></div>

        <div id="sidebar1-a" class="sidebar">
            <center>
                <h2>Fender Cc-60s</h2>
                <br>
                <img src="https://media.auvisa.com/120921-home_default/fender-cc60s-all-mahogany-wn-guitarra-acustica-concierto-natural.jpg" alt="Imagen 1-a" onclick="openSidebar('sidebar1-a')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="guitarras_acusticas">
                    <input type="hidden" name="id_producto" value="1"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad1">Cantidad:</label>
                    <input type="number" id="cantidad1" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje1"></div>
            </center>
        </div>

        <div id="sidebar2-a" class="sidebar">
            <center>
                <h2>Fender Electroacustica Cc-60sce Color Madera Blanco</h2>
                <br>
                <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcTRlWxWsCBVNcnKXgr1VEJjnrUqdPZgEhthS6R4EGssqxooRg9LZ7ScFRm3Va-27cO8wYZJ-xqUnoEGOVJIo-M8TFnRfm2vhhS4KlI1Syu8&usqp=CAc" alt="Imagen 2-a" onclick="openSidebar('sidebar2-a')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="guitarras_acusticas">
                    <input type="hidden" name="id_producto" value="2"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad2">Cantidad:</label>
                    <input type="number" id="cantidad2" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje2"></div>
            </center>
            </div>
        </div>

        <div id="sidebar3-a" class="sidebar">
            <center>
                <h2>Fender Design Cc-60s Nogal</h2>            
                <br>
                <img src="https://m.media-amazon.com/images/I/5110xfPVTWL.jpg" alt="Imagen 3-a" onclick="openSidebar('sidebar3-a')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="guitarras_acusticas">
                    <input type="hidden" name="id_producto" value="3"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad3">Cantidad:</label>
                    <input type="number" id="cantidad3" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje3"></div>
            </center>
                
        </div>

        <div id="sidebar4-a" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar4-a')">&times;</a>
            <center>
                <h2>Guitarra electroacústica Taylor 814ce</h2>
                <br>
                <img src="https://www.musicanarias.com/8806-thickbox_default/guitarra-electroacustica-taylor-814ce.jpg" alt="Imagen 4-a" onclick="openSidebar('sidebar4-a')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="guitarras_acusticas">
                    <input type="hidden" name="id_producto" value="4"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad4">Cantidad:</label>
                    <input type="number" id="cantidad4" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje4"></div>
            </center>
        </div>

        <div id="sidebar5-a" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar5-a')">&times;</a>
            <center>
                <h2>Guitarra Acustica Clasica JMT AC851 Negra</h2>
                <br>
                <img src="https://i0.wp.com/marikomusic.com.mx/wp-content/uploads/2022/06/Guitarra-Acustica-Clasica-JMT-AC851-Negra.jpg?fit=1000%2C1000&ssl=1" alt="Imagen 5-a" onclick="openSidebar('sidebar5-a')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="guitarras_acusticas">
                    <input type="hidden" name="id_producto" value="5"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad5">Cantidad:</label>
                    <input type="number" id="cantidad5" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje5"></div>
            </center>
        </div>

        <div id="sidebar6-a" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar6-a')">&times;</a>
            <center>
            <h2>Guitarra Acústica Clásica Squier SA150N</h2>
                <br>
                <img src="https://i0.wp.com/marikomusic.com.mx/wp-content/uploads/2023/10/Guitarra-Acustica-Clasica-Squier-SA150N.jpg?fit=1000%2C1000&ssl=1" alt="Imagen 6-a" onclick="openSidebar('sidebar6-a')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="guitarras_acusticas">
                    <input type="hidden" name="id_producto" value="6"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad6">Cantidad:</label>
                    <input type="number" id="cantidad4" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje6"></div>
            </center>
        </div>

        <!--SEPARADOR DE INSTRUMENTOS-->

        <div id="overlay" class="overlay" onclick="closeAllSidebars()"></div>
    
        <div id="sidebar1-b" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar1-b')">&times;</a>
            <center>
                <h2>Fender Stratocaster</h2>
                <br>
                <img src="https://ss631.liverpool.com.mx/xl/1122438917.jpg" alt="Imagen 1-b" onclick="openSidebar('sidebar1-b')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="guitarras_electricas">
                    <input type="hidden" name="id_producto" value="1"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad1">Cantidad:</label>
                    <input type="number" id="cantidad1" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje1"></div>
            </center>
        </div>

        <div id="sidebar2-b" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar2-b')">&times;</a>
            <center>
                <h2>Fender Telecaster</h2>
                <br>
                <img src="https://ss631.liverpool.com.mx/xl/1119824318.jpg" alt="Imagen 2-b" onclick="openSidebar('sidebar2-b')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="guitarras_electricas">
                    <input type="hidden" name="id_producto" value="2"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad2">Cantidad:</label>
                    <input type="number" id="cantidad2" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje2"></div>
            </center>
        </div>

        <div id="sidebar3-b" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar3-b')">&times;</a>
            <center>
                <h2>Jackson Randy Rhoads</h2>
                <br>
                <img src="https://musicaltamayo.com/2953-large_default/jackson-rrx24-black.jpg" alt="Imagen 3-b" onclick="openSidebar('sidebar3-b')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="guitarras_electricas">
                    <input type="hidden" name="id_producto" value="3"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad3">Cantidad:</label>
                    <input type="number" id="cantidad3" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje3"></div>
            </center>
       </div>

        <div id="sidebar4-b" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar4-b')">&times;</a>
            <center>
                <h2>Gibson Les Paul</h2>
                <br>
                <img src="https://therocklab.mx/cdn/shop/files/static.gibson.com_product-images_USA_USAANM97_Satin_Cherry_Sunburst_LPTR00WSNH1_1_1024x1024.jpg?v=1698348985" alt="Imagen 4-b" onclick="openSidebar('sidebar3-b')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="guitarras_electricas">
                    <input type="hidden" name="id_producto" value="4"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad4">Cantidad:</label>
                    <input type="number" id="cantidad4" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje4"></div>
            </center>
        </div>

        <div id="sidebar5-b" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar5-b')">&times;</a>
            <center>
                <h2>Gibson Explorer</h2>
                <br>
                <img src="https://static.gibson.com/product-images/Custom/CUST9M301/Ebony/DSMXEBGH1E_Front1.jpg" alt="Imagen 5-b" onclick="openSidebar('sidebar5-b')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="guitarras_electricas">
                    <input type="hidden" name="id_producto" value="5"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad5">Cantidad:</label>
                    <input type="number" id="cantidad5" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje5"></div>
            </center>
        </div>

        <div id="sidebar6-b" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar6-b')">&times;</a>
            <center>
                <h2>Epiphone Flying V</h2>
                <br>
                <img src="https://ss631.liverpool.com.mx/xl/1137456211.jpg" alt="Imagen 6-b" onclick="openSidebar('sidebar6-b')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="guitarras_electricas">
                    <input type="hidden" name="id_producto" value="6"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad6">Cantidad:</label>
                    <input type="number" id="cantidad6" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje6"></div>
            </center>
        </div>

        <!--SEPARADOR DE INSTRUMENTOS-->

        <div id="overlay" class="overlay" onclick="closeAllSidebars()"></div>
    
        <div id="sidebar1-c" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar1-c')">&times;</a>
            <center>
                <h2>Bajo Electrico Squier Classic Vibe Jaguar</h2>
                <br>
                <img src="https://www.mrcdinstrumentos.com.mx/shared/productos/19395/0374560500.jpg" alt="Imagen 1-c" onclick="openSidebar('sidebar1-c')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="bajos_electricos">
                    <input type="hidden" name="id_producto" value="1"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad1">Cantidad:</label>
                    <input type="number" id="cantidad1" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje1"></div>
            </center>
        </div>

        <div id="sidebar2-c" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar2-c')">&times;</a>
            <center>
                <h2>Bajo Electrico Ibanez SR605E SR Series Cosmic Blue</h2>
                <br>
                <img src="https://i0.wp.com/takaguitars.mx/wp-content/uploads/2023/03/img_2700.png?fit=600%2C600&ssl=1" alt="Imagen 2-c" onclick="openSidebar('sidebar2-c')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="bajos_electricos">
                    <input type="hidden" name="id_producto" value="2"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad2">Cantidad:</label>
                    <input type="number" id="cantidad1" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje2"></div>
            </center>
        </div>

        <div id="sidebar3-c" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar3-c')">&times;</a>
            <center>
                <h2>Bajo Electrico Ibanez Sr300eb matte black</h2>
                <br>
                <img src="https://ss631.liverpool.com.mx/xl/1133012083.jpg" alt="Imagen 3-c" onclick="openSidebar('sidebar3-c')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="bajos_electricos">
                    <input type="hidden" name="id_producto" value="3"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad3">Cantidad:</label>
                    <input type="number" id="cantidad3" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje3"></div>
            </center>
        </div>

        <div id="sidebar4-c" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar4-c')">&times;</a>
            <center>
                <h2>Bajo Electrico Squier P-Bass Laurel Fingerboard</h2>
                <br>
                <img src="https://www.mrcdinstrumentos.com.mx/shared/productos/21469/0370127506-01.jpg" alt="Imagen 4-c" onclick="openSidebar('sidebar4-c')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="bajos_electricos">
                    <input type="hidden" name="id_producto" value="4"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad4">Cantidad:</label>
                    <input type="number" id="cantidad4" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje4"></div>
            </center>
        </div>

        <!--SEPARADOR DE INSTRUMENTOS-->

        <div id="overlay" class="overlay" onclick="closeAllSidebars()"></div>
        <div id="sidebar1-d" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar1-d')">&times;</a>
            <center>
                <h2>Baterias Acusticas Tama Imperialstar</h2>
                <br>
                <img src="https://www.mrcdinstrumentos.com.mx/shared/productos/19018/3001359.jpg" alt="Imagen 1-d" onclick="openSidebar('sidebar1-d')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="baterias">
                    <input type="hidden" name="id_producto" value="1"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad1">Cantidad:</label>
                    <input type="number" id="cantidad1" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje1"></div>
            </center>
        </div>

        <div id="sidebar2-d" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar2-d')">&times;</a>
            <center>
                <h2>Bateria Acustica Century Sencilla</h2>
                <br>
                <img src="https://audiomusic.mx/wp-content/uploads/2022/10/Bateria-Acustica-Century-CNBT066-Audio-Music.png" alt="Imagen 2-d" onclick="openSidebar('sidebar2-d')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="baterias">
                    <input type="hidden" name="id_producto" value="2"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad2">Cantidad:</label>
                    <input type="number" id="cantidad2" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje2"></div>
            </center>
        </div>

        <div id="sidebar3-d" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar3-d')">&times;</a>
            <center>
                <h2>Baterias Acustica MOD. RGE625l</h2>
                <br>
                <img src="https://www.mrcdinstrumentos.com.mx/shared/productos/28388/IPGRTRGE625IIBLX.jpg" alt="Imagen 3-d" onclick="openSidebar('sidebar3-d')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="baterias">
                    <input type="hidden" name="id_producto" value="3"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad3">Cantidad:</label>
                    <input type="number" id="cantidad3" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje3"></div>
            </center>    
        </div>

        <div id="sidebar4-d" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar4-d')">&times;</a>
            <center>
                <h2>Bateria Yamaha Black-Blue Drum set</h2>
                <br>
                <img src="https://mx.yamaha.com/es/files/Image-index_LCHO_1080x1080_8ff3e90e0a622c52bbf5a78fc0b2604d.jpg?impolicy=resize&imwid=396&imhei=396" alt="Imagen 4-d" onclick="openSidebar('sidebar4-d')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="baterias">
                    <input type="hidden" name="id_producto" value="4"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad4">Cantidad:</label>
                    <input type="number" id="cantidad4" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje4"></div>
            </center>    
        </div>

        <div id="sidebar5-d" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar5-d')">&times;</a>
            <center>
                <h2>Odery IR220 Inrock Bateria Acústica Natural</h2>
                <br>
                <img src="https://musicopolix.com/124910/ir220hwnd.jpg" alt="Imagen 5-d" onclick="openSidebar('sidebar5-d')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="baterias">
                    <input type="hidden" name="id_producto" value="5"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad5">Cantidad:</label>
                    <input type="number" id="cantidad5" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje5"></div>
            </center>  
        </div>

        <!--SEPARADOR DE INSTRUMENTOS-->

        <!-- SEPARADOR DE INSTRUMENTOS-->

        <div id="sidebar1-f" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar1-f')">&times;</a>
            <center>
                <h2>Acordeon Diatonico Hohner Negro</h2>
                <br>
                <img src="https://servimusic.mx/wp-content/uploads/2022/05/SM2205-600x600.png" alt="Imagen 1-f" onclick="openSidebar('sidebar1-f')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="acordeones">
                    <input type="hidden" name="id_producto" value="1"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad1">Cantidad:</label>
                    <input type="number" id="cantidad1" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje1"></div>
            </center>
        </div>

        <div id="sidebar2-f" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar2-f')">&times;</a>
            <center>
                <h2>Acordeon Diatonico Hohner Blanco</h2>
                <br>
                <img src="https://www.falymusic.com/images/detailed/51/A48431-1.jpeg" alt="Imagen 2-f" onclick="openSidebar('sidebar2-f')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="acordeones">
                    <input type="hidden" name="id_producto" value="2"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad2">Cantidad:</label>
                    <input type="number" id="cantidad1" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje2"></div>
            </center>
        </div>

        <div id="sidebar3-f" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar3-f')">&times;</a>
            <center>
                <h2>Acordeon Blanco Montanari 12 Bajos Standard</h2>
                <br>
                <img src="https://electromusic.com.mx/wp-content/uploads/2023/06/230627130835_82_MONTMGGWHFBE1.jpg" alt="Imagen 3-f" onclick="openSidebar('sidebar3-f')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="acordeones">
                    <input type="hidden" name="id_producto" value="3"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad3">Cantidad:</label>
                    <input type="number" id="cantidad3" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje3"></div>
            </center>
        </div>

        <div id="sidebar4-f" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar4-f')">&times;</a>
            <center>
                <h2>Acordeón Diatónico Hohner Rojo Con Funda</h2>
                <br>
                <img src="https://veerkamponline.com/cdn/shop/products/1000224_2.jpg?v=1560545319" alt="Imagen 4-f" onclick="openSidebar('sidebar4-f')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="acordeones">
                    <input type="hidden" name="id_producto" value="4"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad4">Cantidad:</label>
                    <input type="number" id="cantidad4" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje4"></div>
            </center>
        </div>

        <!--SEPARADOR DE INSTRUMENTOS-->

        <div id="sidebar1-e" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar1-e')">&times;</a>
            <center>
                <h2>Pedal Classic Delay Effect</h2>
                <br>
                <img src="https://http2.mlstatic.com/D_Q_NP_687726-MLA49043227794_022022-O.webp" alt="Imagen 1-e" onclick="openSidebar('sidebar1-e')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="pedales">
                    <input type="hidden" name="id_producto" value="1"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad1">Cantidad:</label>
                    <input type="number" id="cantidad1" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje1"></div>
            </center>
        </div>

        <div id="sidebar2-e" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar2-e')">&times;</a>
            <center>
                <h2>Pedal Heavy Metal Effect</h2>
                <br>
                <img src="https://www.guitargear.com.mx/tienda/images/detailed/38/hm-2w_D_gal.jpeg" alt="Imagen 2-e" onclick="openSidebar('sidebar2-e')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="pedales">
                    <input type="hidden" name="id_producto" value="2"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad2">Cantidad:</label>
                    <input type="number" id="cantidad2" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje2"></div>
            </center>
        </div>

        <div id="sidebar3-e" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar3-e')">&times;</a>
            <center>
                <h2>Pedal Distorsion Effect</h2>
                <br>
                <img src="https://gamamusic.com/cdn/shop/files/DS1W-1.jpg?v=1708127056&width=1000" alt="Imagen 3-e" onclick="openSidebar('sidebar3-e')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="pedales">
                    <input type="hidden" name="id_producto" value="3"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad3">Cantidad:</label>
                    <input type="number" id="cantidad3" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje3"></div>
            </center>
        </div>

        <div id="sidebar4-e" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar4-e')">&times;</a>
            <center>
                <h2>Pedal Reverb Effect</h2>
                <br>
                <img src="https://www.stratusmusicstore.com.mx/cdn/shop/products/RV.6.2.png?v=1614826762" alt="Imagen 4-e" onclick="openSidebar('sidebar4-e')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="pedales">
                    <input type="hidden" name="id_producto" value="4"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad4">Cantidad:</label>
                    <input type="number" id="cantidad4" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje4"></div>
            </center>
        </div>

        <div id="sidebar5-e" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar5-e')">&times;</a>
            <center>
                <h2>Pedal Octave Effect</h2>
                <br>
                <img src="https://http2.mlstatic.com/D_NQ_NP_699540-MLA49117861627_022022-O.webp" alt="Imagen 5-e" onclick="openSidebar('sidebar5-e')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="pedales">
                    <input type="hidden" name="id_producto" value="5"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad5">Cantidad:</label>
                    <input type="number" id="cantidad5" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje5"></div>
            </center>
        </div>

        <div id="sidebar6-e" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar6-e')">&times;</a>
            <center>
                <h2>Pedal Fuzz Effect</h2>
                <br>
                <img src="https://www.guitargear.com.mx/tienda/images/detailed/44/fz-1w_image2_gal.jpg" alt="Imagen 6-e" onclick="openSidebar('sidebar6-e')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="pedales">
                    <input type="hidden" name="id_producto" value="6"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad6">Cantidad:</label>
                    <input type="number" id="cantidad6" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje6"></div>
            </center>
        </div>

        <div id="sidebar7-e" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar('sidebar7-e')">&times;</a>
            <center>
                <h2>Pedal Overdrive Effect</h2>
                <br>
                <img src="https://www.musicalesdoris.com/cdn/shop/products/1021143-1_1280x.jpg?v=1574383306" alt="Imagen 7-e" onclick="openSidebar('sidebar7-e')">
                <br><br>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="seccion" value="pedales">
                    <input type="hidden" name="id_producto" value="7"> <!-- Producto 1 de guitarras acústicas -->
                    <label for="cantidad7">Cantidad:</label>
                    <input type="number" id="cantidad7" name="cantidad" min="1" required>
                    <button type="submit">Comprar</button>
                </form>
                <div id="mensaje7"></div>
            </center>
        </div>

        <div class="separator-elements-section">
            <div id="acoustic-guitars-section">
            <center>
                <h1>
                    <script>
                        document.write('Guitarras Acusticas');
                </script>
                </h1>
            </center>
        </div>
        </div>
        
        <br>
        <div class="acoustic-guitars-section">
            <div class="grid-container">
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://media.auvisa.com/120921-home_default/fender-cc60s-all-mahogany-wn-guitarra-acustica-concierto-natural.jpg" alt="Imagen 1-a" onclick="openSidebar('sidebar1-a')">
                            <h2>
                                <script>
                                    document.write('Fender Cc-60s');
                                </script>
                            </h2>
                        </center>
                            <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcTRlWxWsCBVNcnKXgr1VEJjnrUqdPZgEhthS6R4EGssqxooRg9LZ7ScFRm3Va-27cO8wYZJ-xqUnoEGOVJIo-M8TFnRfm2vhhS4KlI1Syu8&usqp=CAc" alt="Imagen 2-a" onclick="openSidebar('sidebar2-a')">
                            <h2>
                                <script>
                                    document.write('Fender Electroacustica Cc-60sce');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://m.media-amazon.com/images/I/5110xfPVTWL.jpg" alt="Imagen 3-a" onclick="openSidebar('sidebar3-a')">
                            <h2>
                                <script>
                                    document.write('Fender Design Cc-60s Nogal');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://www.musicanarias.com/8806-thickbox_default/guitarra-electroacustica-taylor-814ce.jpg" alt="Imagen 4-a" onclick="openSidebar('sidebar4-a')">
                            <h2>
                                <script>
                                    document.write('Guitarra electroacústica Taylor 814ce');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://i0.wp.com/marikomusic.com.mx/wp-content/uploads/2022/06/Guitarra-Acustica-Clasica-JMT-AC851-Negra.jpg?fit=1000%2C1000&ssl=1" alt="Imagen 5-a" onclick="openSidebar('sidebar5-a')">
                            <h2>
                                <script>
                                    document.write('Guitarra Acustica Clasica JMT AC851 Negra');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://i0.wp.com/marikomusic.com.mx/wp-content/uploads/2023/10/Guitarra-Acustica-Clasica-Squier-SA150N.jpg?fit=1000%2C1000&ssl=1" alt="Imagen 6-a" onclick="openSidebar('sidebar6-a')">
                            <h2>
                                <script>
                                    document.write('Guitarra Acústica Clásica Squier SA150N');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator-elements-section">
            <div id="electric-guitars-section">
                <center>
                    <h1>
                        <script>
                            document.write('Guitarras Electricas');
                        </script>
                    </h1>
                </center>
            </div>
        </div>
        <div class="electric-guitars-section">
            <div class="grid-container">
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://ss631.liverpool.com.mx/xl/1122438917.jpg" alt="Imagen 1-b" onclick="openSidebar('sidebar1-b')">
                            <h2>
                                <script>
                                    document.write('Fender Stratocaster');
                                </script>
                            </h2>
                        </center>
                            <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://ss631.liverpool.com.mx/xl/1119824318.jpg" alt="Imagen 2-b" onclick="openSidebar('sidebar2-b')">
                            <h2>
                                <script>
                                    document.write('Fender Telecaster');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://musicaltamayo.com/2953-large_default/jackson-rrx24-black.jpg" alt="Imagen 3-b" onclick="openSidebar('sidebar3-b')">
                            <h2>
                                <script>
                                    document.write('Jackson Randy Rhoads');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://therocklab.mx/cdn/shop/files/static.gibson.com_product-images_USA_USAANM97_Satin_Cherry_Sunburst_LPTR00WSNH1_1_1024x1024.jpg?v=1698348985" alt="Imagen 4-b" onclick="openSidebar('sidebar4-b')">
                            <h2>
                                <script>
                                    document.write('Gibson Les Paul');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://static.gibson.com/product-images/Custom/CUST9M301/Ebony/DSMXEBGH1E_Front1.jpg" alt="Imagen 5-b" onclick="openSidebar('sidebar5-b')">
                            <h2>
                                <script>
                                    document.write('Gibson Explorer');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://ss631.liverpool.com.mx/xl/1137456211.jpg" alt="Imagen 6-b" onclick="openSidebar('sidebar6-b')">
                            <h2>
                                <script>
                                    document.write('Epiphone Flying V');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator-elements-section">
            <div id="electric-bass-section">
                <center>
                    <h1>
                        <script>
                            document.write('Bajos Electricos');
                        </script>
                    </h1>
                </center>
            </div>
        </div>
        <br>
        <div class="electric-bass-section">
            <div class="grid-container">
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://www.mrcdinstrumentos.com.mx/shared/productos/19395/0374560500.jpg" alt="Imagen 1-c" onclick="openSidebar('sidebar1-c')">
                            <h2>
                                <script>
                                    document.write('Bajo Squier Classic Vibe Jaguar');
                                </script>
                            </h2>
                        </center>
                            <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://i0.wp.com/takaguitars.mx/wp-content/uploads/2023/03/img_2700.png?fit=600%2C600&ssl=1" alt="Imagen 2-c" onclick="openSidebar('sidebar2-c')">
                            <h2>
                                <script>
                                    document.write('Bajo Ibanez SR605E SR Series Cosmic Blue');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://ss631.liverpool.com.mx/xl/1133012083.jpg" alt="Imagen 3-c" onclick="openSidebar('sidebar3-c')">
                            <h2>
                                <script>
                                    document.write('Bajo Ibanez Sr300eb matte black');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://www.mrcdinstrumentos.com.mx/shared/productos/21469/0370127506-01.jpg" alt="Imagen 4-c" onclick="openSidebar('sidebar4-c')">
                            <h2>
                                <script>
                                    document.write('Bajo Squier P-Bass Laurel Fingerboard');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator-elements-section">
            <div id="drums-section">
                <center>
                    <h1>
                        <script>
                            document.write('Baterias');
                        </script>
                    </h1>
                </center>
            </div>
        </div>
        <br>
        <div class="drums-section">
            <div class="grid-container">
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://www.mrcdinstrumentos.com.mx/shared/productos/19018/3001359.jpg" alt="Imagen 1-d" onclick="openSidebar('sidebar1-d')">
                            <h2>
                                <script>
                                    document.write('Baterias Acusticas Tama Imperialstar');
                                </script>
                            </h2>
                        </center>
                            <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://audiomusic.mx/wp-content/uploads/2022/10/Bateria-Acustica-Century-CNBT066-Audio-Music.png" alt="Imagen 2-d" onclick="openSidebar('sidebar2-d')">
                            <h2>
                                <script>
                                    document.write('Bateria Acustica Century');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://www.mrcdinstrumentos.com.mx/shared/productos/28388/IPGRTRGE625IIBLX.jpg" alt="Imagen 3-d" onclick="openSidebar('sidebar3-d')">
                            <h2>
                                <script>
                                    document.write('Baterias Acustica MOD. RGE625');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://mx.yamaha.com/es/files/Image-index_LCHO_1080x1080_8ff3e90e0a622c52bbf5a78fc0b2604d.jpg?impolicy=resize&imwid=396&imhei=396" alt="Imagen 4-d" onclick="openSidebar('sidebar4-d')">
                            <h2>
                                <script>
                                    document.write('Bateria Yamaha Black-Blue Drum set');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://musicopolix.com/124910/ir220hwnd.jpg" alt="Imagen 5-d" onclick="openSidebar('sidebar5-d')">
                            <h2>
                                <script>
                                    document.write('Odery IR220 Inrock Bateria Acústica Natural');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator-elements-section">
            <div id="acordions-section">
                <center>
                    <h1>
                        <script>
                            document.write('Acordeones');
                        </script>
                    </h1>
                </center>
            </div>
        </div>
        <br>
        <div class="acordions-section">
            <div class="grid-container">
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://servimusic.mx/wp-content/uploads/2022/05/SM2205-600x600.png" alt="Imagen 1-f" onclick="openSidebar('sidebar1-f')">
                            <h2>
                                <script>
                                    document.write('Acordeon Diatonico Hohner Negro');
                                </script>
                            </h2>
                        </center>
                            <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://www.falymusic.com/images/detailed/51/A48431-1.jpeg" alt="Imagen 2-f" onclick="openSidebar('sidebar2-f')">
                            <h2>
                                <script>
                                    document.write('Acordeon Diatonico Hohner Blanco');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://electromusic.com.mx/wp-content/uploads/2023/06/230627130835_82_MONTMGGWHFBE1.jpg" alt="Imagen 3-f" onclick="openSidebar('sidebar3-f')">
                            <h2>
                                <script>
                                    document.write('Acordeon Blanco Montanari 12 Bajos Standard');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://veerkamponline.com/cdn/shop/products/1000224_2.jpg?v=1560545319" alt="Imagen 4-f" onclick="openSidebar('sidebar4-f')">
                            <h2>
                                <script>
                                    document.write('Acordeón Diatónico Hohner Rojo Con Funda');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator-elements-section">
            <div id="pedals-section">
                <center>
                    <h1>
                        <script>
                            document.write('Pedales');
                        </script>
                    </h1>
                </center>
            </div>
        </div>
        <div class="pedals-section">
            <div class="grid-container">
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://http2.mlstatic.com/D_Q_NP_687726-MLA49043227794_022022-O.webp" alt="Imagen 1-e" onclick="openSidebar('sidebar1-e')">
                            <h2>
                                <script>
                                    document.write('Pedal Classic Delay Effect');
                                </script>
                            </h2>
                        </center>
                            <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://www.guitargear.com.mx/tienda/images/detailed/38/hm-2w_D_gal.jpeg" alt="Imagen 2-e" onclick="openSidebar('sidebar2-e')">
                            <h2>
                                <script>
                                    document.write('Pedal Heavy Effect');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://gamamusic.com/cdn/shop/files/DS1W-1.jpg?v=1708127056&width=1000" alt="Imagen 3-e" onclick="openSidebar('sidebar3-e')">
                            <h2>
                                <script>
                                    document.write('Pedal Distorsion Effect');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://www.stratusmusicstore.com.mx/cdn/shop/products/RV.6.2.png?v=1614826762" alt="Imagen 4-e" onclick="openSidebar('sidebar4-e')">
                            <h2>
                                <script>
                                    document.write('Pedal Reverb Effect');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://http2.mlstatic.com/D_NQ_NP_699540-MLA49117861627_022022-O.webp" alt="Imagen 5-e" onclick="openSidebar('sidebar5-e')">
                            <h2>
                                <script>
                                    document.write('Pedal Octave Effect');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://www.guitargear.com.mx/tienda/images/detailed/44/fz-1w_image2_gal.jpg" alt="Imagen 6-e" onclick="openSidebar('sidebar6-e')">
                            <h2>
                                <script>
                                    document.write('Pedal Fuzz Effect');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
                <div class="element-separator">
                    <div class="image-container">
                        <center>
                            <img src="https://www.musicalesdoris.com/cdn/shop/products/1021143-1_1280x.jpg?v=1574383306" alt="Imagen 7-e" onclick="openSidebar('sidebar7-e')">
                            <h2>
                                <script>
                                    document.write('Pedal Overdrive Effect');
                                </script>
                            </h2>
                        </center>
                        <div class="overlay-text">Da Click Para Comprar</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separador-body-footer"></div>
        <center>
            <footer>
                <h3><br>
                <center>
                    <script>
                        document.write('Derechos de la Pagina pertenecientes al Alumno Arenas Lopez Jose Leonardo Daniel 2024-3025')
                    </script>
                </center>
                </h3>
                <h2>
                    <center>
                        <script>
                            document.write('Siguenos: ');
                        </script>
                    </center>
                </h2>
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
                    </a>
                </div>
            </footer> 
        </center>  
    </body>
</html>