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
    <button type="button" class="btn btn-success" id="inscribirse" disabled>Inscribirse</button>
    <button type="button" class="btn btn-primary" id="volverAIntentar" disabled>Volver a intentar</button>
    <!-- resources/views/tu_vista.blade.php -->
    <form action="{{ route('downloadPDF') }}" method="get">
        <!-- Tonichan, aqui me tienes que poner los campos para que se impriman en la factura -->
        <input type="hidden" name="carrera" value="valor1">
        <input type="hidden" name="fechaCarrera" value="valor2">
        <input type="hidden" name="fechaInscripcion" value="valor1">
        <input type="hidden" name="nombre" value="valor2">
        <input type="hidden" name="dorsal" value="valor1">
        <input type="hidden" name="seguro" value="valor2">
        <input type="hidden" name="precio" value="valor2">
        <button type="submit" class="btn" id="pdf" disabled>Descargar PDF</button>
    </form>

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
                    document.getElementById("inscribirse").disabled = false;
                    document.getElementById("pdf").disabled = false;
                    document.getElementById("volverAIntentar").disabled = true;
                } else {
                    document.querySelector("h1").innerHTML = "Incorrecto, vuelva a inscribirse!";
                    document.getElementById("inscribirse").disabled = true;
                    document.getElementById("pdf").disabled = true;
                    document.getElementById("volverAIntentar").disabled = false;
                }
            }
        }

        // Añadir evento click al botón Inscribirse para realizar acciones cuando se haga clic
        document.getElementById("inscribirse").addEventListener("click", function() {
            // Aquí puedes realizar la acción de enviar los datos del formulario para la inscripción
            alert("Inscripción realizada con éxito!");
        });

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