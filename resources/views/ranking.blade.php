<x-app-layout>
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
                <!-- Contenedor  -->
                <span>Top 10 de la semana</span>
                <div id="lista-ranking"></div>
                <!-- Aquí puedes agregar contenido para el tercer contenedor -->
            </div>
        </div>
        <script>
            var allUrl           = '{{ url("/index/all") }}';
            var verRankingUrl = '{{ url("/ranking/verRanking") }}';
        </script>
        <script src="{{ asset('../public/js/rankings.js') }}"></script>
    </body>
    </html>
</x-app-layout>
