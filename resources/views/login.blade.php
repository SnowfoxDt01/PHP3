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
        
        <H3>Đăng nhập</H3>
        @if(session('message'))
            <p class="text-danger">{{ session('message') }}</p>
        @endif
        <form action="{{ route('postLogin') }}" method="post">
            @csrf
            <div class="mt-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="email" name="email">
            </div>
            <div class="mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="password" name="password">
            </div>
            <div class="mt-3">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            <button class="btn btn-primary mt-3">Đăng nhập</button>
        </form>
        <a href="{{ route('register') }}" class="btn btn-success mt-2" >Đăng ký</a>
    </div>
    
@stack('scripts')
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>