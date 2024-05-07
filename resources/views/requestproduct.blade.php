
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
            <th>Request</th>
        </tr>
    </thead>
    <tbody> 
    
    @if($requests)
        @foreach($requests as $request)
        <tr>
        <form action="{{ route('approve.store') }}" method="POST">
            <td>{{ $request->id	}} <input id="demo" name="id" type="text" value ="{{ $request->id}}" hidden></td>
            <td>{{ $request->name }}</td>
            <td>{{ $request->category }}</td>
            <td>{{ $request->quantity }} </td>
    
            <td>{{ $request->stock }}</td>
            <td>{{ $request->status }} </td>
            <td>{{ $request->date }}</td>
            <td><button name="accept" value="accept" type="submit">Accept</button></td>
            <td><button name="reject" value="reject" type="submit">Reject</button></td>
        </form>
        </tr>
        @endforeach
    @endif 
    
    </tbody>