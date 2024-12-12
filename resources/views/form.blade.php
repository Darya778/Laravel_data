<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <h1>Submit your data</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="/form" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Submit</button>
    </form>
</body>
</html>
