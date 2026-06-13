<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Buah Nusantara</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Lato', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #1A3A2A 0%, #2D6A4F 60%, #52B788 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            padding: 3rem 2.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.3);
        }

        .login-brand {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .login-brand .icon { font-size: 3rem; margin-bottom: 0.5rem; }

        .login-brand h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: #1A3A2A;
        }

        .login-brand p {
            font-size: 0.8rem;
            color: #999;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 0.2rem;
        }

        .alert-error {
            background: #FFEBEE;
            color: #C62828;
            border-left: 4px solid #E63946;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.2rem;
            font-size: 0.875rem;
        }

        .form-group { margin-bottom: 1.3rem; }

        label {
            display: block;
            font-size: 0.8rem;
            font-weight: 700;
            color: #1A3A2A;
            margin-bottom: 0.4rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input[type=email],
        input[type=password] {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-family: 'Lato', sans-serif;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s;
            color: #1A3A2A;
        }

        input:focus { border-color: #2D6A4F; }

        .btn-login {
            width: 100%;
            padding: 0.95rem;
            background: linear-gradient(135deg, #1A3A2A, #2D6A4F);
            color: white;
            border: none;
            border-radius: 10px;
            font-family: 'Lato', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.2s;
            margin-top: 0.5rem;
            letter-spacing: 0.5px;
        }

        .btn-login:hover { opacity: 0.9; }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.85rem;
            color: #999;
            text-decoration: none;
        }

        .back-link:hover { color: #2D6A4F; }

        .demo-box {
            margin-top: 1.8rem;
            padding: 1rem;
            background: #F0F9F4;
            border-radius: 10px;
            border: 1px dashed #2D6A4F;
            font-size: 0.82rem;
            color: #2D6A4F;
        }

        .demo-box strong { display: block; margin-bottom: 0.4rem; color: #1A3A2A; }
        .demo-box code {
            background: white;
            padding: 0.1rem 0.4rem;
            border-radius: 4px;
            font-family: monospace;
            color: #E63946;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-brand">
        <div class="icon">🌿</div>
        <h1>Buah Nusantara</h1>
        <p>Admin Panel</p>
    </div>

    @if($errors->any())
    <div class="alert-error">
        Email atau password salah. Silakan coba lagi.
    </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="form-group">
            <label>Email Admin</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   placeholder="admin@buahnusantara.id" required autofocus>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="••••••••••" required>
        </div>

        <button type="submit" class="btn-login">🔐 Masuk ke Panel</button>
    </form>

    <a href="{{ route('buah.index') }}" class="back-link">
        ← Kembali ke Website
    </a>

    {{-- Credentials hint untuk development --}}
    <div class="demo-box">
        <strong>🧪 Akun Demo (Development):</strong>
        Email: <code>admin@buahnusantara.id</code><br>
        Password: <code>BuahNusantara2025!</code>
    </div>
</div>

</body>
</html>