<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM Management</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('ukm.index') }}">UKM Kampus</a>

        @auth
        <form action="{{ route('logout') }}" method="POST" class="d-inline ms-auto">
            @csrf
            <button type="submit" class="btn btn-sm btn-light">Logout</button>
        </form>
        @endauth

        @guest
        <a href="{{ route('login') }}" class="btn btn-sm btn-light ms-auto">Login</a>
        @endguest
    </div>
</nav>


    <main>
        @yield('content')
    </main>

    <!-- Optional JS Bootstrap (jika butuh interaktivitas) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
