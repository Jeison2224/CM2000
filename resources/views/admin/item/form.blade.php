<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    @isset($item)
        <br><br>
        <form action="{{ route('admin.item.update', ['item' => $item->id]) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{ route('admin.item.store') }}" method="POST">
    @endisset
            @csrf
            <br>
                <table class='sinbordes'>
                    <tr>
                        <td class='sinbordes'>Nombre:</td>
                        <td class='sinbordes'><input type="text" name="name" value="{{ $item->name ?? '' }}" required></td>
                    </tr>
                    <tr>
                        <td class='sinbordes'>Descripcion:</td>
                        <td class='sinbordes'><input type="text" name="description" value="{{ $item->description ?? '' }}" required></td>
                    </tr>
                    <tr>
                        <td class='sinbordes'>Precio:</td>
                        <td class='sinbordes'><input type="text" name="precio" value="{{ $item->precio ?? '' }}" required></td>
                    </tr>
                    <tr>
                        <td class='sinbordes'>Cantidad de clics:</td>
                        <td class='sinbordes'><input type="text" name="cantidadclics" value="{{ $item->cantidadclics ?? '' }}" required></td>
                    </tr>
                    <tr>
                        <td class='sinbordes'><a href="{{ route('admin.item.index') }}">Volver al listado</a></td>
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

