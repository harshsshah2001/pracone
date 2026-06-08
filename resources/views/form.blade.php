<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('form.submit') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <br>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br>
        <br>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone">
        <br>
        <br>
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="100">
<br>
<br>
        <button type="submit">Pay</button>
    </form>
</body>
</html>