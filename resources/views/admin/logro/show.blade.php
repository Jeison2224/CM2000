    <table class='sinbordes'>
        <tr>
            <th class='sinbordes derecha mitad'>Nombre:</th>
            <td class='sinbordes mitad'>{{ $logro->name }}</td>
        </tr>
        <tr>
            <th class='sinbordes derecha mitad'>Descripcion:</th>
            <td class='sinbordes mitad'>{{ $logro->description }}</td>
        </tr>
        <tr>
            <th class='sinbordes derecha mitad'>Puntos:</th>
            <td class='sinbordes mitad'>{{ $logro->point }}</td>
        </tr>
    </table>

    <br><br>
    <a href="{{ route('admin.logro.index') }}" class='centrado'>Volver al listado</a>

    <br><br>
    <form action = "{{route('admin.menu')}}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
