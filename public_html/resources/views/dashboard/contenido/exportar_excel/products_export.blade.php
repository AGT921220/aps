<table>
        <thead>
        <tr>
            <th width="10" height="25">Nombre</th>
            <th width="50" height="25">Descripcion</th>
            <th width="20" height="25">Precio</th>
            <th width="20" height="25">Cantidad</th>
            <th width="20" height="25">Imágen</th>
        </tr>
        </thead>

        <tbody>
        @foreach($products as $product)
            <tr>
                <th width="10" height="25">{{ $product->name }}</th>
                <th width="50" height="25">{{ $product->description }}</th>
                <th width="20" height="25">${{ $product->precio }}</th>
                <th width="20" height="25">{{ $product->cantidad }}</th>
                <th width="20" height="25"><img src="{{ trim($product->imagen) }}" width="30%" alt="logo"></th>
            </tr>
        @endforeach
        </tbody>
</table>
