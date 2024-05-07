<form action="{{ route('add.user') }}" method="POST">
    @csrf
    <label for="name">Staff Name:</label>
    <input type="text" name="name" id="name" required><br>

    <select name="role">
        <option value="Admin">Admin</option>
        <option value="Store Manager">Store Managers</option>
        <option value="Warehouse Staff">Warehouse Staff</option>
    </select>

    <input type="date" name="joining">
    <input type="password" name="password">
    
    <button type="submit">Submit</button>
</form>
