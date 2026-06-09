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


    <form action="{{ route('register.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $data->name }}">
        <br>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $data->email }}">
        <br>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password">
        <br>
        <br>
        <label for="phone">Phone</label>
        <input type="number" name="phone" value="{{ $data->phone }}">
        <br>
        <br>
        <label for="image">Image</label>
        <input type="file" name="image">
        <br>
        <br>
        <label for="multiple_image">Images</label>
        <input type="file" name="multiimage[]" accept="image/*" multiple>
        <br>
        <br>

        <button type="submit">Update</button>


    </form>

</body>



</html>
