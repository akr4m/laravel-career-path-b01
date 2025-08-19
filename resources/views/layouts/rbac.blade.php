<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>RBAC Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="p-6">
    <nav class="mb-4 flex gap-3">
        <a href="{{ route('posts.index') }}">Posts</a>
        @auth
            <span>| Logged in as: {{ auth()->user()->name }} ({{ auth()->user()->role ?? 'n/a' }})</span>
            @can('access-admin')
                <a href="{{ route('posts.pending') }}">Pending</a>
                <a href="{{ url('/dashboard') }}">Admin Dashboard</a>
            @endcan
        @endauth
    </nav>

    @if (session('status'))
        <div class="p-3 bg-green-100 border mb-4">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="p-3 bg-red-100 border mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</body>
</html>
