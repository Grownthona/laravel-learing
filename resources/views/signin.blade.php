<form action="{{ route('signin.user') }}" method="POST">
    @csrf
    <label for="name">Staff Name:</label>
    <input type="text" name="name" id="name" required><br>
    
    <input type="password" name="password">
    
    <button type="submit">Submit</button>
</form>