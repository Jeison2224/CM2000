<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    <table class='sinbordes'>
        <tr>
            <th>id</th><th>Nombre</th><th>Email</th><th class='sinbordes'></th><th class='sinbordes'></th>
        </tr>
    @foreach ($userList as $user)
        <tr>
            <td class="hover"><a href="{{route('admin.user.show', $user->id)}}" class="block">{{$user->id}}</a></td>
            <td>{{$user->name}}</td>
            <td class='derecha'>{{$user->email}}</td>
            <td class='sinbordes centrado'>
                <a href="{{route('admin.user.edit', $user->id)}}">Modificar</a>
            </td>
            <td class='sinbordes'>
                <form action = "{{route('admin.user.destroy', $user->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
    @endforeach
    </table><br>
    <a href="{{ route('admin.user.create') }}">Nuevo artículo</a>

    <br><br>
    <form action="{{route('admin.menu')}}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
    </div>
</x-admin-layout>