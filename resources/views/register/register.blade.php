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


    <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name">
        <br>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email">
        <br>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password">
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
        <input type="file" name="multiimage[]" accept="image/*" multiple>
        <br>
        <br>

        <button type="submit">Register</button>


    </form>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        img {
            border-radius: 5px;
        }
    </style>

    <table>
        <thead>
            <tr>
                {{-- <th>ID</th> --}}
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Gallery Images</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                @foreach ($data as $data)
                    <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>
                    <img src="{{ asset('storage/'.$data->image) }}" width="80">    
                    </td>                  

                    <td>
                        @foreach ($data->images as $image)
                            <img src="{{ asset('storage/'.$image->image) }}" width="60">
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('register.edit', $data->id) }}">Edit</a>
                        <form action="{{ route('register.delete', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tr>
        </tbody>
    </table>
</body>



</html>