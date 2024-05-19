<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    <table class='sinbordes'>
        <tr>
            <th>id</th><th>user_id</th><th>puntos</th><th class='sinbordes'></th><th class='sinbordes'></th>
        </tr>
    @foreach ($userpointList as $userpoint)
        <tr>
            <td class="hover"><a href="{{route('admin.userpoint.show', $userpoint->id)}}" class="block">{{$userpoint->id}}</a></td>
            <td>{{$userpoint->user_id}}</td>
            <td class='derecha'>{{$userpoint->point}}</td>
            <td class='sinbordes centrado'>
                <a href="{{route('admin.userpoint.edit', $userpoint->id)}}">Modificar</a>
            </td>
            <td class='sinbordes'>
                <form action = "{{route('admin.userpoint.destroy', $userpoint->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
    @endforeach
    </table><br>
    <a href="{{ route('admin.userpoint.create') }}">Nuevos puntos de usuario</a>

    <br><br>
    <form action="{{route('admin.menu')}}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
    </div>
</x-admin-layout>