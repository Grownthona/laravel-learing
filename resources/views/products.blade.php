<?php
$stock = 0;
?>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody> 
    
    @if($products)
        @foreach($products as $product)
        <tr>
        <form action="{{ route('update.product') }}" method="POST">
            <td>{{ $product->id	}} <input id="demo" name="id" type="text" value ="{{ $product->id}}" hidden></td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->status }}</td>
            <td><button type="submit">Accept</button></td>
        </form>
        </tr>
        @endforeach
    @endif 
    
    </tbody>
</table>
