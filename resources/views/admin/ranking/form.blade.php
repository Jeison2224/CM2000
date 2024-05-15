<x-admin-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}">
    </head>
    <div class="contenedor">
    @isset($ranking)
        <br><br>
        <form action="{{ route('admin.ranking.update', ['ranking' => $ranking->id]) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{ route('admin.ranking.store') }}" method="POST">
    @endisset
            @csrf
            <br>
            <table class='sinbordes'>
                <tr>
                    <td class='sinbordes'>Nombre:</td>
                    <td class='sinbordes'><input type="text" name="name" value="{{ $ranking->name ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>clics:</td>
                    <td class='sinbordes'><input type="text" name="point" value="{{ $ranking->point ?? '' }}" required></td>
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
                    <td class='sinbordes'><a href="{{ route('admin.ranking.index') }}">Volver al listado</a></td>
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

