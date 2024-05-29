<body>
<header>
        <div id="header" class="d-flex align-items-center justify-content-between px-3 py-2 bg-dark">
            <a href="{{ route('mostrarMenuPrincipal')}}
            "><img src="{{ asset('images/logo.png') }}" alt="Icono" class="me-3"></a>
            <h4>Desert WorldWide</h4>
            <div class="text-right"> <!-- Centra los elementos internos -->
                <a href="principal/carreras"><p>¡Todas las competiciones!</p></a>
                <a href="/register"><p>¡Hazte Socio!</p></a>
            </div>
           
        </div>
    </header>
<style>
   #header {
            height: 90px; /* Altura del encabezado ajustable */
            color: white; /* Color del texto */
        }
        #header img {
            height: 80px; /* Altura del logo ajustable */
            margin-right: 20px; /* Espacio entre el logo y los textos */
            vertical-align: middle; /* Alineación vertical del logo */
        }
        #header .text-right {
            display: flex;
            align-items: center; /* Alineación vertical de los textos */
            
            
            margin-left: auto;
        }
        #header p {
            margin: 0; /* Elimina el margen de los párrafos */
            padding: 10px 15px; /* Añade espacio interno */
            margin-left: 10px;
        }
        #header a {
            color: inherit; /* Hereda el color del texto del encabezado */
            text-decoration: none; /* Elimina la subrayado de los enlaces */
        }
        #header h4{
            margin: 0;
        }
        #header p:hover{
            background-color: orange;
            border-radius: 5px; /* Bordes redondeados */
            color: black;
        }
</style>