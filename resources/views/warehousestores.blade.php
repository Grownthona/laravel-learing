<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Quantity</th>

            <th>Stock</th>
            <th>Status</th>
            <th>Date</th>
            <th>Approve</th>
        </tr>
    </thead>
    <tbody> 
    
    @if($stores)
        @foreach($stores as $store)
        <tr>
        <form action="{{ route('approve.warehouse') }}" method="POST">
            <td>{{ $store->id	}} <input id="demo" name="id" type="text" value ="{{ $store->id}}" hidden></td>
            <td>{{ $store->name }}</td>
            <td>{{ $store->quantity }}</td>
            <td>{{ $store->stock }} </td>
            <td>{{ $store->status }} </td>
            <td>{{ $store->date }}</td>
            <td><button name="accept" value="ship" type="submit">Ship</button></td>
            <td><button name="reject" value="reject" type="submit">Reject</button></td>
        </form>
        </tr>
        @endforeach
    @endif 
    
    </tbody>