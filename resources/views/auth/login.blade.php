<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f3f4f6; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-card { max-width: 400px; width: 100%; background: #fff; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.08); padding: 2rem; }
        .form-control:focus { box-shadow: 0 0 0 2px #4361ee33; border-color: #4361ee; }
        .btn-primary { background: linear-gradient(135deg, #4361ee 0%, #4895ef 100%); border: none; }
        .btn-primary:hover { background: linear-gradient(135deg, #4895ef 0%, #4361ee 100%); }
    </style>
</head>
<body>
    <div class="login-card">
        <h2 class="mb-4 text-center">Login</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>
