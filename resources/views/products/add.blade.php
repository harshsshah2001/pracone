<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>

<body>
    @if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div style="color:green;">
        {{ session('success') }}
    </div>
    @endif


    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name">
        <br>
        <br>
        <label for="description">Description</label>
        <input type="text" name="description">
        <br>
        <br>
        <label for="price">Price</label>
        <input type="number" name="price" step="0.01">

        <br>
        <br>
        <label for="phone">Phone</label>
        <input type="number" name="phone">
        <br>
        <br>
        <label for="image">Image</label>
        <input type="file" name="image">
        <br>
        <br>
        <label for="multiple_image">Images</label>
        <input type="file" name="multiimages[]" accept="image/*" multiple>
        <br>
        <br>

        <button type="submit">Add Product</button>


    </form>


</body>



</html>
