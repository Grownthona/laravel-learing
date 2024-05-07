<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>quantity</th>
            <th>Stock</th>
            <th>Add Amount</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody> 
    
    @if($requests)
        @foreach($requests as $request)
        <tr>
        <form action="{{ route('request.update') }}" method="POST">
            <td>{{ $request->id	}} <input name="id" type="text" value ="{{ $request->id}}" hidden></td>
            <td>{{ $request->name }}</td>
            <td>{{ $request->quantity }}</td>
            <td>{{ $request->status }}</td>
            <td>{{ $request->date}}</td>
            <td><button name="action1" type="submit" value="save"> Approve</button></td>
            <td><button name="action2" type="submit" value="preview">Reject</button></td>
            </form>
        </tr>
        @endforeach
    @endif 
    
    </tbody>
</table>