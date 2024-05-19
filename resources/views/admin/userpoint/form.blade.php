<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    @isset($userpoint)
        <br><br>
        <form action="{{ route('admin.userpoint.update', ['userpoint' => $userpoint->id]) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{ route('admin.userpoint.store') }}" method="POST">
    @endisset
            @csrf
            <br>
            <table class='sinbordes'>
                <tr>
                    <td class='sinbordes'>User_id:</td>
                    <td class='sinbordes'><input type="text" name="user_id" value="{{ $userpoint->user_id ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>Puntos:</td>
                    <td class='sinbordes'><input type="text" name="point" value="{{ $userpoint->point ?? '' }}" required></td>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td class='sinbordes'><a href="{{ route('admin.userpoint.index') }}">Volver al listado</a></td>
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
