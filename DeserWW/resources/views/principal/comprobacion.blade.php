<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    img {
        width: 10vw;
        height: 15vh;
    }

    .box {
        width: 10vw;
        height: 15vh;
        border: 2px solid black;
    }
</style>

<body>
    <h1>Arrastra donde corresponde!</h1>
    <div class="container">
        <img src="{{ asset('images/coche.png') }}" alt="Imagen de un coche" draggable="true" ondragstart="drag(event)" id="coche">
        <img src="{{ asset('images/desierto.png') }}" alt="Imagen de un desierto" draggable="true" ondragstart="drag(event)" id="desierto">
        <img src="{{ asset('images/meta.png') }}" alt="Imagen de una meta" draggable="true" ondragstart="drag(event)" id="meta">
    </div>
    <div class="containes">
        <div class="figura">
            <div class="box" id="0" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <h2>Desierto</h2>
        </div>
        <div class="figura">
            <div class="box" id="1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <h2>Meta</h2>
        </div>
        <div class="figura">
            <div class="box" id="2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <h2>Coche</h2>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Inscribirse</button>
    <?php
    var_dump($_GET);
    ?>

    <script>
        let arreglo = ["", "", ""];

        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            if (arreglo[parseInt(ev.target.id)] == "") {
                var data = ev.dataTransfer.getData("text");
                arreglo[parseInt(ev.target.id)] = data;
                ev.target.appendChild(document.getElementById(data));
            }
            if (arreglo[0] != "" && arreglo[1] != "" && arreglo[2] != "") {
                if (arreglo[0] == "desierto" && arreglo[1] == "meta" && arreglo[2] == "coche") {
                    document.querySelector("h1").innerHTML = "Verificacion correcta!";
                    // Aqui:

                } else {
                    document.querySelector("h1").innerHTML = "Incorrecto, vuelva a inscribirse!";
                }
            }
        }
    </script>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script src="https://www.paypal.com/sdk/js?client-id=Afb7Pf6VOC-Xum8-A3sLFZ37rBBWd-aaQ6dlld30-_IQDxXejIuA3lVcXicaLrPYkJZQ0KIHHeYekAGy&currency=EUR"></script>
</head>
<style>
    img {
        width: 10vw;
        height: 15vh;
    }

    .box {
        width: 10vw;
        height: 15vh;
        border: 2px solid black;
    }
</style>

<body>
    @csrf
    <p id="precio" >{{$precio}}</p>
    <p id="carreraId" style="display: none" >{{$carrera->id}}</p>
    <p id="corredorId" style="display: none">{{$corredor->id}}</p>
    <p id="seguro" style="display: none">{{$seguro->precio}}</p>
    <p id="seguroId" style="display: none">{{$seguro->id}}</p>
    <p id="precioInscripcion" style = 'display: none' >{{$seguro->precio + $precio}}</p>
    <h1>Arrastra donde corresponde!</h1>
    <div class="container">
        <img src="{{ asset('images/coche.png') }}" alt="Imagen de un coche" draggable="true" ondragstart="drag(event)" id="coche">
        <img src="{{ asset('images/desierto.png') }}" alt="Imagen de un desierto" draggable="true" ondragstart="drag(event)" id="desierto">
        <img src="{{ asset('images/meta.png') }}" alt="Imagen de una meta" draggable="true" ondragstart="drag(event)" id="meta">
    </div>
    <div class="containes">
        <div class="figura">
            <h2>Desierto</h2>
            <div class="box" id="0" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            
        </div>
        <div class="figura">
            <h2>Meta</h2>
            <div class="box" id="1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            
        </div>
        <div class="figura">
            <h2>Coche</h2>
            <div class="box" id="2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            
        </div>
    </div>
    
    <button type="button" class="btn btn-primary" id="volverAIntentar" disabled>Volver a intentar</button>
    <!-- resources/views/tu_vista.blade.php -->
    <form action="{{ route('downloadPDF') }}" method="get">
        <!-- Tonichan, aqui me tienes que poner los campos para que se impriman en la factura -->
        <input type="hidden" name="carrera" value="{{$carrera->nombre}}">
        <input type="hidden" name="fechaCarrera" value="{{$carrera->fecha_inicio}}">
        <input type="hidden" name="dorsal" value="{{ isset($finalDOR) ? $finalDOR : '' }}">
        <input type="hidden" name="seguro" value="{{$seguro->nombre}}">
        <input type="hidden" name="precio" value="{{$seguro->precio + $precio}}">
        <button type="submit" class="btn" id="pdf" disabled>Descargar PDF</button>
    </form>
    
        <script src="{{ asset('js/paypal.js') }}"></script>
        <div id="paypal-button-container" style="display: none;"></div>
    <script>
        let arreglo = ["", "", ""];

        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            if (arreglo[parseInt(ev.target.id)] == "") {
                var data = ev.dataTransfer.getData("text");
                arreglo[parseInt(ev.target.id)] = data;
                ev.target.appendChild(document.getElementById(data));
            }
            if (arreglo[0] != "" && arreglo[1] != "" && arreglo[2] != "") {
                if (arreglo[0] == "desierto" && arreglo[1] == "meta" && arreglo[2] == "coche") {
                    document.querySelector("h1").innerHTML = "Verificacion correcta!";
                    document.getElementById("paypal-button-container").style.display = 'block';
                    document.getElementById("volverAIntentar").disabled = true;
                } else {
                    document.querySelector("h1").innerHTML = "Incorrecto, vuelva a inscribirse!";
                    document.getElementById("paypal-button-container").style.display = 'none';
                    document.getElementById("volverAIntentar").disabled = false;
                }
            }
        }


        // Añadir evento click al botón Volver a intentar para restablecer el juego
        document.getElementById("volverAIntentar").addEventListener("click", function() {
            // Aquí puedes restablecer el juego, limpiar el arreglo y resetear el estado de los elementos
            // arreglo = ["", "", ""];
            // document.querySelector("h1").innerHTML = "Arrastra donde corresponde!";
            // document.getElementById("inscribirse").disabled = true;
            // document.getElementById("volverAIntentar").disabled = true;
            // También puedes restablecer la posición de las imágenes si es necesario
            location.reload();

        });
    </script>
</body>

</html>