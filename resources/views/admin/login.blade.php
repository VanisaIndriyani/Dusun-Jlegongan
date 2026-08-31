<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Admin | Dusun Jlegongan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #059669 0%, #064e3b 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            padding: 20px;
        }
        .login-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 430px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }
        .brand-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #059669, #047857);
            border-radius: 18px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin: 0 auto 20px;
        }
        .btn-primary { background: #059669; border-color: #059669; }
        .btn-primary:hover { background: #047857; border-color: #047857; }
        .form-control {
            border-radius: 12px;
            padding: 12px 16px;
            border: 1.5px solid #e5e7eb;
        }
        .form-control:focus {
            border-color: #059669;
            box-shadow: 0 0 0 4px rgba(5,150,105,0.1);
        }
        .form-label {
            font-weight: 600;
            font-size: 0.9rem;
            color: #374151;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-4">
            <div class="brand-icon"><i class="bi bi-tree-fill"></i></div>
            <h3 class="fw-bold mb-1" style="color: #047857;">Dusun Jlegongan</h3>
            <p class="text-muted mb-0">Masuk ke Panel Admin</p>
        </div>

        @if($errors->any())
        <div class="alert alert-danger small rounded-3 mb-4">
            {{ $errors->first('email') }}
        </div>
        @endif

        <form method="POST" action="{{ route('admin.authenticate') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="admin@dusunjlegongan.id" required autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-3 fw-semibold rounded-3">
                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
            </button>
        </form>

      
    </div>
</body>
</html>
