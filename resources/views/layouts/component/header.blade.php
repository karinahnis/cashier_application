<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <header>
        <nav class="bg-danger p-1 ">
            <div class="btn-group gap-1">
            <button type="button" class="btn btn-light">Karin</button>
            <button type="button" class="btn btn-light">Primary</button>
            <button type="button" class="btn btn-light">Primary</button>
            </div>      
        </nav>
    </header>
    
</body>
</html>