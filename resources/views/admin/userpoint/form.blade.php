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
                    <td class='sinbordes'>Valor:</td>
                    <td class='sinbordes'><input type="text" name="point" value="{{ $userpoint->point ?? '' }}" required></td>
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
                    <td class='sinbordes'><a href="{{ route('admin.userpoint.index') }}">Volver al listado</a></td>
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
