<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    @isset($inventario)
        <br><br>
        <form action="{{ route('admin.inventario.update', ['inventario' => $inventario->item_id]) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{ route('admin.inventario.store') }}" method="POST">
    @endisset
            @csrf
            <br>
            <table class='sinbordes'>
                <tr>
                    <td class='sinbordes'>Item Id:</td>
                    <td class='sinbordes'><input type="text" name="item_id" value="{{ $inventario->item_id ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>Usuario Id:</td>
                    <td class='sinbordes'><input type="text" name="user_id" value="{{ $inventario->user_id ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>cantidad:</td>
                    <td class='sinbordes'><input type="text" name="cantidad" value="{{ $inventario->cantidad ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'><a href="{{ route('admin.inventario.index') }}">Volver al listado</a></td>
                    <td class='sinbordes'><input type="submit" value="Guardar"></td>
                </tr>
            </table>
        </form>
        <br><br>
        <form action = "{{route('admin.menu')}}" method="GET" class="centrado">
            @csrf
            <input type="submit" value="MENÚ PRINCIPAL">
        </form>
        </div>
</x-admin-layout>
