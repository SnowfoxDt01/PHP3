<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @stack('styles')
</head>
<body>
    <div class="container">
        
        <H3>Đăng ký</H3>
        @if(session('message'))
            <p class="text-danger">{{ session('message') }}</p>
        @endif
        <form action="{{ route('postRegister') }}" method="post">
            @csrf
            <div class="mt-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="name" name="name">
            </div>
            <div class="mt-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="email" name="email">
            </div>
            <div class="mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="password" name="password">
            </div>
            
            <button class="btn btn-success mt-3">Đăng ký</button>
        </form>
        <a href="{{ route('login') }}" class="btn btn-primary mt-2">Đăng nhập</a>
    </div>
    
@stack('scripts')
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>