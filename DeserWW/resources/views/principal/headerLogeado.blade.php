<body>
<header>
        <div id="header" class="d-flex align-items-center justify-content-between px-3 py-2 bg-dark">
            <a href="{{ route('mostrarMenuPrincipal')}}"><img src="{{ asset('images/logo.png') }}" alt="Icono" class="me-3"></a>
            <h4>Desert WorldWide</h4>
            <div class="text-right"> 
                <a href="principal/carreras"><p>¡Todas las competiciones!</p></a>
                <div class="profile-dropdown">
                    <a href="{{ route('logout') }}"><span>Cerrar sesión</span></a>
                </div>
            </div>
           
        </div>
    </header>
<style>
   #header {
            height: 90px; 
            color: white; 
        }
        #header img {
            height: 80px; 
            margin-right: 20px; 
            vertical-align: middle; 
        }
        #header .text-right {
            display: flex;
            align-items: center; 
            
            
            margin-left: auto;
        }
        #header p {
            margin: 0; 
            padding: 10px 15px; 
            margin-left: 10px;
        }
        #header a {
            color: inherit; 
            text-decoration: none; 
        }
        #header h4{
            margin: 0;
        }
        #header p:hover{
            background-color: orange;
            border-radius: 5px; 
            color: black;
        }
        .profile-dropdown {
            position: relative;
            display: inline-block;
            text-align: center;
            text-decoration: none;
          
        }

        .profile-dropdown a {
            display: block;
            padding: 10px;
            color: black;
            text-decoration: none;
        }

        .profile-dropdown a:hover {
            background-color: orange;
            border-radius: 5px; /* Bordes redondeados */
            color: black;
        }
        .profile-dropdown a:hover span{
            background-color: orange;
            border-radius: 5px; /* Bordes redondeados */
            color: black;
        }

        .profile-dropdown a:last-child {
            border-radius: 5px;
            
        }

</style>