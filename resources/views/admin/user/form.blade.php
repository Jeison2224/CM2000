<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    @isset($user)
        <br><br>
        <form action="{{ route('admin.user.update', ['user' => $user->id]) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{ route('admin.user.store') }}" method="POST">
    @endisset
            @csrf
            <br>
            <table class='sinbordes'>
                <tr>
                    <td class='sinbordes'>Nombre:</td>
                    <td class='sinbordes'><input type="text" name="name" value="{{ $user->name ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>Email:</td>
                    <td class='sinbordes'><input type="text" name="email" value="{{ $user->email ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>Contraseña:</td>
                    <td class='sinbordes'><input type="password" name="password" value="{{ $user->password ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'><a href="{{ route('admin.user.index') }}">Volver al listado</a></td>
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
