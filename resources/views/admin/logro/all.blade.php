<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    <table class='sinbordes'>
        <tr>
            <th>id</th><th>Nombre</th><th>Descripcion</th><th>Puntos</th><th class='sinbordes'></th><th class='sinbordes'></th>
        </tr>
    @foreach ($logroList as $logro)
        <tr>
            <td class="hover"><a href="{{route('admin.logro.show', $logro->id)}}" class="block">{{$logro->id}}</a></td>
            <td>{{$logro->name}}</td>
            <td class='derecha'>{{$logro->description}}</td>
            <td>{{$logro->point}}</td>
            <td class='sinbordes centrado'>
                <a href="{{route('admin.logro.edit', $logro->id)}}">Modificar</a>
            </td>
            <td class='sinbordes'>
                <form action = "{{route('admin.logro.destroy', $logro->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
    @endforeach
    </table><br>
    <a href="{{ route('admin.logro.create') }}">Nuevo artículo</a>

    <br><br>
    <form action="{{route('admin.menu')}}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
    </div>
</x-admin-layout>