<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody> 
    
    @if($products)
        @foreach($products as $product)
        <tr>

            <td>{{ $product->id	}}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->status }}</td>
            
        </form>
        </tr>
        @endforeach
    @endif 
    
    </tbody>
</table>
