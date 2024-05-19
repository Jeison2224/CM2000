<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
        <table class='sinbordes'>
            <tr>
                <th>id</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>Cantidad</th><th class='sinbordes'></th><th class='sinbordes'></th>
            </tr>
        @foreach ($itemList as $item)
            <tr>
                <td class="hover"><a href="{{route('admin.item.show', $item->id)}}" class="block">{{$item->id}}</a></td>
                <td>{{$item->name}}</td>
                <td class='derecha'>{{$item->description}}</td>
                <td class='derecha'>{{$item->precio}}</td>
                <td class='derecha'>{{$item->cantidadclics}}</td>
                <td class='sinbordes centrado'>
                    <a href="{{route('admin.item.edit', $item->id)}}">Modificar</a>
                </td>
                <td class='sinbordes'>
                    <form action = "{{route('admin.item.destroy', $item->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
        @endforeach
        </table><br>
    <a href="{{ route('admin.item.create') }}">Nuevo item</a>
    <br><br>
    <form action="{{route('admin.menu')}}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
</div>
</x-admin-layout>