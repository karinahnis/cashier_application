<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <!-- Display error message if any -->
    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <!-- Login form -->
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <!-- Email field -->
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required autofocus>
        </div>

        <!-- Password field -->
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <!-- Login button -->
        <button type="submit">Login</button>
    </form>

</body>
</html>
