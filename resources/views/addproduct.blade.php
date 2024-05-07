<form action="{{ route('products.add') }}" method="POST">
    @csrf
    <label for="name">Product Name:</label>
    <input type="text" name="name" id="name" required><br>

    <label for="name">category:</label>
    <input type="text" name="category" id="name" required><br>

    <label for="name">details:</label>
    <input type="text" name="details" id="name" required><br>

    <label for="name">quantity:</label>
    <input type="text" name="quantity" id="name" required><br>

    <label for="name">warehouse staff Name:</label>
    <input type="text" name="warehouse_staff" id="name" required><br>

    <input type="date" name="date">
    
    <button type="submit">Submit</button>
</form>
