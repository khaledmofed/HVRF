<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login — HVRF</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; min-height: 100vh; display: flex; align-items: center; background: #0d1117; }
        .login-card { background: #1a1f2e; border: 1px solid rgba(255,255,255,0.07); border-radius: 16px; padding: 2.5rem; width: 100%; max-width: 420px; box-shadow: 0 20px 60px rgba(0,0,0,0.5); }
        .form-control { background: rgba(255,255,255,0.05); border-color: rgba(255,255,255,0.1); color: #fff; }
        .form-control:focus { background: rgba(255,255,255,0.08); border-color: #4ECDC4; box-shadow: 0 0 0 0.2rem rgba(78,205,196,0.2); color: #fff; }
        .btn-login { background: #4ECDC4; color: #fff; border: none; padding: 0.75rem; font-weight: 600; border-radius: 8px; width: 100%; transition: background 0.3s; }
        .btn-login:hover { background: #2AA39B; color: #fff; }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="login-card">
            <div class="text-center mb-4">
                <img src="/images/logo-hvrf.png" alt="HVRF" style="height: 60px; width: 60px; border-radius: 50%; object-fit: cover; ">
                <h4 class="mt-3 mb-1" style="font-family: 'Playfair Display', serif;">HVRF Admin</h4>
                <p class="text-muted small">Sign in to manage your foundation</p>
            </div>
            @if($errors->any())
            <div class="alert alert-danger small py-2">{{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Email Address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="mb-4">
                    <label class="form-label small fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-4 d-flex align-items-center gap-2">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input m-0">
                    <label for="remember" class="form-check-label small">Remember me</label>
                </div>
                <button type="submit" class="btn-login btn">Sign In <i class="bi bi-arrow-right ms-2"></i></button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
