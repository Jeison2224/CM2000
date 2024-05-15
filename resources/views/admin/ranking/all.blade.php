<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    <table class='sinbordes'>
        <tr>
            <th>id</th><th>Nombre</th><th>Email</th><th class='sinbordes'></th><th class='sinbordes'></th>
        </tr>
    @foreach ($rankingList as $ranking)
        <tr>
            <td class="hover"><a href="{{route('admin.ranking.show', $ranking->id)}}" class="block">{{$ranking->id}}</a></td>
            <td>{{$ranking->name}}</td>
            <td class='derecha'>{{$ranking->point}}</td>
            <td class='sinbordes centrado'>
                <a href="{{route('admin.ranking.edit', $ranking->id)}}">Modificar</a>
            </td>
            <td class='sinbordes'>
                <form action = "{{route('admin.ranking.destroy', $ranking->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
    @endforeach
    </table><br>
    <a href="{{ route('admin.ranking.create') }}">Nuevo artículo</a>

    <br><br>
    <form action="{{route('admin.menu')}}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
    </div>
</x-admin-layout>