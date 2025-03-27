<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Login Page</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard/login.css">
</head>
<body>
  <div class="login-container">
    <div class="login-header">
      <h1>Welcome back</h1>
      <p>Please enter your details to sign in</p>
    </div>
    
    <form>
      <div class="form-floating">
        <input type="email" class="form-control" id="emailInput" placeholder="Email address" required>
        <label for="emailInput">Email address</label>
      </div>
      
      <div class="form-floating">
        <input type="password" class="form-control" id="passwordInput" placeholder="Password" required>
        <label for="passwordInput">Password</label>
      </div>
      
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="rememberMe">
          <label class="form-check-label" for="rememberMe">
            Remember me
          </label>
        </div>
        <a href="#" class="text-decoration-none">Forgot password?</a>
      </div>
      
      <button type="submit" class="btn btn-primary">Sign in</button>
      
      <div class="divider">
      </div>
      
      <div class="login-footer">
        <span>Don't have an account?</span>
        <a href="sign-up.php">Sign up</a>
      </div>
    </form>
  </div>
</body>
</html>