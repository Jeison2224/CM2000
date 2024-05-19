<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    @isset($logro)
        <br><br>
        <form action="{{ route('admin.logro.update', ['logro' => $logro->id]) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{ route('admin.logro.store') }}" method="POST">
    @endisset
            @csrf
            <br>
            <table class='sinbordes'>
                <tr>
                    <td class='sinbordes'>Nombre:</td>
                    <td class='sinbordes'><input type="text" name="name" value="{{ $logro->name ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>Descripcion:</td>
                    <td class='sinbordes'><input type="text" name="description" value="{{ $logro->description ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>Puntos:</td>
                    <td class='sinbordes'><input type="text" name="point" value="{{ $logro->point ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'><a href="{{ route('admin.logro.index') }}">Volver al listado</a></td>
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

