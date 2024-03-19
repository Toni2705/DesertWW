<body>
<header>
        <div id="header" class="d-flex align-items-center justify-content-between px-3 py-2 bg-dark">
            <img src="{{ asset('images/logo.png') }}" alt="Icono" class="me-3">
            <h4>Desert WorldWide</h4>
            <div class="text-right"> <!-- Centra los elementos internos -->
                <a href="principal/carreras"><p>¡Próximas Competiciones!</p></a>
                <a href="principal/perfil"><svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24"width="40"height="40"fill="none"stroke="currentColor"stroke-width="2"stroke-linecap="round"stroke-linejoin="round"><circle cx="12" cy="7" r="4" /><path d="M5 21v-2a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v2" /></svg></a>
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