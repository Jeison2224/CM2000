<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    @isset($inventario)
        <br><br>
        <form action="{{ route('admin.inventario.update', ['inventario' => $inventario->item_id]) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{ route('admin.inventario.store') }}" method="POST">
    @endisset
            @csrf
            <br>
            <table class='sinbordes'>
                <tr>
                    <td class='sinbordes'>Item Id:</td>
                    <td class='sinbordes'><input type="text" name="item_id" value="{{ $user->item_id ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>Usuario Id:</td>
                    <td class='sinbordes'><input type="text" name="user_id" value="{{ $user->user_id ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>cantidad:</td>
                    <td class='sinbordes'><input type="text" name="cantidad" value="{{ $user->cantidad ?? '' }}" required></td>
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
                    <td class='sinbordes'><a href="{{ route('admin.inventario.index') }}">Volver al listado</a></td>
                    <td class='sinbordes'><input type="submit"></td>
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
