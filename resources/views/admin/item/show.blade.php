<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    <table class='sinbordes'>
        <tr>
            <th class='sinbordes derecha mitad'>Nombre:</th>
            <td class='sinbordes mitad'>{{ $item->name }}</td>
        </tr>
        <tr>
            <th class='sinbordes derecha mitad'>Descripcion:</th>
            <td class='sinbordes mitad'>{{ $item->description }}</td>
        </tr>
        <tr>
            <th class='sinbordes derecha mitad'>Precio:</th>
            <td class='sinbordes mitad'>{{ $item->precio }}</td>
        </tr>
        <tr>
            <th class='sinbordes derecha mitad'>Cantidad de clics:</th>
            <td class='sinbordes mitad'>{{ $item->cantidadclics }}</td>
        </tr>
    </table>

    <br><br>
    <a href="{{ route('admin.item.index') }}" class='centrado'>Volver al listado</a>

    <br><br>
    <form action = "{{route('admin.menu')}}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
    </div>
</x-admin-layout>