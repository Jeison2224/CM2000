<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    <table class='sinbordes'>
        <tr>
            <th class='sinbordes derecha mitad'>Nombre:</th>
            <td class='sinbordes mitad'>{{ $ranking->name }}</td>
        </tr>
        <tr>
            <th class='sinbordes derecha mitad'>Puntos:</th>
            <td class='sinbordes mitad'>{{ $ranking->point }}</td>
        </tr>
    </table>

    <br><br>
    <a href="{{ route('admin.ranking.index') }}" class='centrado'>Volver al listado</a>

    <br><br>
    <form action = "{{route('admin.menu')}}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
    </div>
</x-admin-layout>
