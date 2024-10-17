<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Manager System - Login</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS for Dark Mode -->
  <style>
    :root {
      --background-color: #ffffff;
      --text-color: #333;
      --input-bg-color: #f7f8fa;
      --card-bg-color: #fff;
      --btn-color: #007bff;
    }

    [data-theme="dark"] {
      --background-color: #121212;
      --text-color: #e0e0e0;
      --input-bg-color: #333;
      --card-bg-color: #1e1e1e;
      --btn-color: #1a73e8;
    }

    body {
      background-color: var(--background-color);
      color: var(--text-color);
    }

    .login-box {
      background-color: var(--card-bg-color);
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px #00000040;
      margin-top: 100px;
    }

    .form-control {
      background-color: var(--input-bg-color);
      color: var(--text-color);
    }

    .btn-primary {
      background-color: var(--btn-color);
      border-color: var(--btn-color);
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Dark Mode Toggle -->
  <div class="d-flex justify-content-end p-3">
    <button id="theme-toggle" class="btn btn-secondary">Switch to Dark Mode</button>
  </div>

  <div class="row justify-content-center">
    <div class="col-lg-4 col-md-6 col-sm-8">
      <div class="login-box">
        <h3 class="text-center">Login</h3>
        <form action="{{ url('login') }}" method="POST">
          @csrf

          <!-- Email Field -->
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
          </div>

          <!-- Password Field -->
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
              <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
          </div>

          <!-- Remember Me Checkbox -->
          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
          </div>

          <!-- Login Button -->
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>

          <!-- Forgot Password and Register Links -->
          <div class="text-center mt-3">
            {{-- <a href="{{ url('forgot-password') }}">Forgot Password?</a> | 
            <a href="{{ url('register') }}">Register</a> --}}
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript to Toggle Dark Mode -->
<script>
  const themeToggleBtn = document.getElementById('theme-toggle');
  const currentTheme = localStorage.getItem('theme') || 'light';

  document.documentElement.setAttribute('data-theme', currentTheme);

  if (currentTheme === 'dark') {
    themeToggleBtn.textContent = 'Switch to Light Mode';
  }

  themeToggleBtn.addEventListener('click', function() {
    const theme = document.documentElement.getAttribute('data-theme');
    const newTheme = theme === 'light' ? 'dark' : 'light';

    document.documentElement.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);

    themeToggleBtn.textContent = newTheme === 'dark' ? 'Switch to Light Mode' : 'Switch to Dark Mode';
  });
</script>

<!-- Bootstrap 5 Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
