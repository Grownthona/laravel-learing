<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Stock Request</th>
            <th>Date</th>
            <th>Request</th>
        </tr>
    </thead>
    <tbody> 
    
    @if($products)
        @foreach($products as $product)
        <tr>
        <form action="{{ route('request.product') }}" method="POST">
        @if($product->status == "Received")
            <td>{{ $product->id	}} <input id="demo" name="id" type="text" value ="{{ $product->id}}" hidden></td>
            <td>{{ $product->product_name }} <input name="name" type="text" value ="{{ $product->product_name}}" hidden></td>
            <td>{{ $product->category }} <input name="category" type="text" value ="{{ $product->category}}" hidden></td>
            <td>{{ $product->quantity }} <input name="quantity" type="text" value ="{{ $product->quantity}}" hidden></td>
            <td><input type="text" name="stock" value="0"></td>
            <td><input type="date" name="date"></td>
            <td><button type="submit">Add</button></td>
        @endif 
        </form>
        </tr>
        @endforeach
    @endif 
    
    </tbody>
</table>
