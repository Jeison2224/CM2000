<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    <table class='sinbordes'>
        <tr>
            <th class='sinbordes derecha mitad'>Item id:</th>
            <td class='sinbordes mitad'>{{ $inventario->item_id }}</td>
        </tr>
        <tr>
            <th class='sinbordes derecha mitad'>Usuario id:</th>
            <td class='sinbordes mitad'>{{ $inventario->user_id }}</td>
        </tr>
        <tr>
            <th class='sinbordes derecha mitad'>Cantidad:</th>
            <td class='sinbordes mitad'>{{ $inventario->cantidad }}</td>
        </tr>
    </table>

    <br><br>
    <a href="{{ route('admin.inventario.index') }}" class='centrado'>Volver al listado</a>

    <br><br>
    <form action = "{{route('admin.menu')}}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
    </div>
</x-admin-layout>