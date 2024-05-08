<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Stock</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody> 
    
    @if($requests)
        @foreach($requests as $request)
        <tr>
        
            <td>{{ $request->id	}} </td>
            <td>{{ $request->name }}</td>
            <td>{{ $request->category }}</td>
            <td>{{ $request->quantity }} </td>
    
            <td>{{ $request->stock }}</td>
            <td>{{ $request->status }} </td>
            <td>{{ $request->date }}</td>
        </form>
        </tr>
        @endforeach
    @endif 
    
    </tbody>