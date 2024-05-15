<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    <table class='sinbordes'>
        <tr>
            <th>Id</th><th>Id Item</th><th>Id usuario</th><th>Cantidad</th><th class='sinbordes'></th><th class='sinbordes'></th>
        </tr>
    @foreach ($inventarioList as $inventario)
        <tr>
            <td class="hover"><a href="{{route('admin.inventario.show', $inventario->id)}}" class="block">{{$inventario->id}}</a></td>
            <td>{{$inventario->item_id}}</td>
            <td class='derecha'>{{$inventario->user_id}}</td>
            <td class='derecha'>{{$inventario->cantidad}}</td>
            <td class='sinbordes centrado'>
                <a href="{{route('admin.inventario.edit', $inventario->id)}}">Modificar</a>
            </td>
            <td class='sinbordes'>
                <form action = "{{route('admin.inventario.destroy', $inventario->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
    @endforeach
    </table><br>
    <a href="{{ route('admin.inventario.create') }}">Nuevo artículo</a>

    <br><br>
    <form action="{{route('admin.menu')}}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
    </div>
</x-admin-layout>