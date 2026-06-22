<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Mail Password</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, sans-serif;
        }

        body{
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .card{
            width:100%;
            max-width:450px;
            background:#fff;
            padding:30px;
            border-radius:12px;
            box-shadow:0 5px 20px rgba(0,0,0,0.15);
        }

        .card-header{
            text-align:center;
            margin-bottom:25px;
        }

        .card-header h2{
            color:#333;
        }

        .form-group{
            margin-bottom:20px;
        }

        .form-group label{
            display:block;
            margin-bottom:8px;
            font-weight:600;
            color:#555;
        }

        .form-control{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:6px;
            font-size:15px;
            outline:none;
            transition:0.3s;
        }

        .form-control:focus{
            border-color:#0d6efd;
            box-shadow:0 0 5px rgba(13,110,253,0.4);
        }

        .btn{
            width:100%;
            padding:12px;
            background:#0d6efd;
            color:#fff;
            border:none;
            border-radius:6px;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        .btn:hover{
            background:#0b5ed7;
        }

        .error{
            color:red;
            font-size:14px;
            margin-top:5px;
        }

        .success{
            background:#d1e7dd;
            color:#0f5132;
            padding:10px;
            border-radius:5px;
            margin-bottom:15px;
        }
    </style>
</head>
<body>

    <div class="card">

        <div class="card-header">
            <h2>Verify Mail Password</h2>
        </div>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.change.password') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Mail Password</label>
                <input
                    type="password"
                    name="mail_password"
                    class="form-control"
                    placeholder="Enter your mail password"
                    required
                >

                @error('mail_password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Confirm Mail Password</label>
                <input
                    type="password"
                    name="confirm_mail_password"
                    class="form-control"
                    placeholder="Confirm your mail password"
                    required
                >

                @error('confirm_mail_password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">
                Verify Password
            </button>

        </form>

    </div>

</body>
</html>