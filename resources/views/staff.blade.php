<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Joining</th>

        </tr>
    </thead>
    <tbody> 
    
    @if($users)
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name	}}</td>
            <td>{{ $user->role	}}</td>
            <td>{{ $user->joining}}</td>
        </tr>
        @endforeach
    @endif 
    
    </tbody>
</table>