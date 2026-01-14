<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin | V-Lab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f6fa;
            height: 100vh;
        }
        .login-card {
            width: 380px;
            border-radius: 10px;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center">

<div class="card login-card p-4 shadow">
    <h4 class="text-center mb-4">Login Admin V-Lab</h4>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login">
    @csrf

    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button class="btn btn-primary w-100">Login</button>
</form>

</div>

</body>
</html>
