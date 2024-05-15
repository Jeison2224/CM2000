
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
                   {{-- <td class='sinbordes'>Proveedor:</td>
                    <td class='sinbordes'>
                        <select name="supplier_id">
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}"
                                    @if( $supplier->id == ($product->supplier_id ?? ""))
                                        selected
                                    @endif
                                >{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </td> --}}
                </tr>
                <tr>
                    <td class='sinbordes'><a href="{{ route('admin.logro.index') }}">Volver al listado</a></td>
                    <td class='sinbordes'><input type="submit"></td>
                </tr>
            </table>
        </form>

        <br><br>
        <form action = "{{route('admin.menu')}}" method="GET" class="centrado">
            @csrf
            <input type="submit" value="MENÚ PRINCIPAL">
        </form>

