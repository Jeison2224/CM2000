<x-app-layout>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clicker Master 2000</title>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        const csrfToken = '{{ csrf_token() }}';
    </script>
    <body class="bg-gray-900 text-white">
        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/3 bg-gray-800 rounded-lg shadow-lg m-4 p-6">
                <!-- Contenedor 1 -->
                <div class="mt-4" id="btncompras">
                    <button onclick="comprar(0);" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        1 click
                    </button>
                    <button onclick="comprar(1);" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded ml-2">
                        5 click
                    </button>
                    <button onclick="comprar(2);" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded ml-2">
                        10 click
                    </button>
                </div>
            </div>
            <div class="w-full md:w-1/3 bg-gray-800 rounded-lg shadow-lg m-4 p-6">
                <!-- Contenedor 2 -->
                <div id="areaClick" onclick="clic();"></div>
                <p id="puntuacion" class="text-xl font-bold">Puntuación: <span id="valorPuntuacion">0</span></p>
               <!-- <p id="nivel" class="text-xl font-bold">Nivel: <span id="valorNivel">1</span></p> -->
               <button type="submit" onclick="enviar()">Guardar datos</button>
               <form action = "{{route('index')}}" method="GET" class="centrado">
                    @csrf
                    <input type="submit" value="Guardar" class="grande" onclick="enviar()">
                </form>
            </div>
            <div class="w-full md:w-1/3 bg-gray-800 rounded-lg shadow-lg m-4 p-6">
                <!-- Contenedor 3 -->
                <div id="inventario"></div>
                <!-- Aquí puedes agregar contenido para el tercer contenedor -->
            </div>
        </div>
        <script src="{{ asset('../public/js/script.js') }}"></script>
    </body>
    </html>
</x-app-layout>
