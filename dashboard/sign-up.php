<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup To PublicQuote</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard/login.css">
</head>
<body>
  <div class="login-container">
    <div class="login-header">
      <h1>Create an Account</h1>
      <p>Please fill in the details to sign up</p>
    </div>
    
    <form>
      <div class="form-floating">
        <input type="text" class="form-control" id="nameInput" placeholder="Full Name" required>
        <label for="nameInput">Full Name</label>
      </div>
      
      <div class="form-floating">
        <input type="email" class="form-control" id="emailInput" placeholder="Email address" required>
        <label for="emailInput">Email address</label>
      </div>
      
      <div class="form-floating">
        <input type="password" class="form-control" id="passwordInput" placeholder="Password" required>
        <label for="passwordInput">Password</label>
      </div>
      
      <div class="form-floating">
        <input type="password" class="form-control" id="confirmPasswordInput" placeholder="Confirm Password" required>
        <label for="confirmPasswordInput">Confirm Password</label>
      </div>
      
      <button type="submit" class="btn btn-primary">Sign up</button>
      
      <div class="divider">
      </div>
      
      <div class="login-footer">
        <span>Already have an account?</span>
        <a href="sign-in.php">Sign in</a>
      </div>
    </form>
  </div>
</body>
</html>