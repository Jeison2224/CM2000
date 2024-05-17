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
            <div class="w-full md:w-1/3 bg-gray-800 rounded-lg shadow-lg m-4 p-6 mid">
                <!-- Contenedor -->
                <div id="lista-logros">

                </div>
            </div>
        </div>
        <script>
            var verLogroUrl = '{{ url("/logro/verLogro") }}';
        </script>
        <script src="{{ asset('../public/js/logros.js') }}"></script>
    </body>
    </html>
</x-app-layout>
