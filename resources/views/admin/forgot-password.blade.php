<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            background:#f4f6f9;
        }

        .box{
            width:380px;
            background:#fff;
            padding:30px;
            border-radius:10px;
            box-shadow:0 10px 30px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        input{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:5px;
            margin-bottom:15px;
        }

        button{
            width:100%;
            padding:12px;
            background:#007bff;
            color:white;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }

        button:hover{
            background:#0056b3;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Forgot Password</h2>

    <form action="{{ route('admin.forgot.password.post') }}" method="POST">
        @csrf

        <input type="email"
               name="email"
               placeholder="Enter your registered email"
               required>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>