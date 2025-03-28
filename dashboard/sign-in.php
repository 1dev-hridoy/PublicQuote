<?php
session_start();
include_once '../server/dbcon.php';

// Redirect to dashboard if user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate form inputs
    if (empty($email) || empty($password)) {
        $error = "Both email and password are required.";
    } else {
        try {
            // Check if the user exists
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Start session and redirect to dashboard
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: index.php");
                exit;
            } else {
                $error = "Invalid email or password.";
            }
        } catch (PDOException $e) {
            $error = "An error occurred: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PublicQuote Login Page</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard/login.css">
</head>
<body>
  <div class="login-container">
    <div class="login-header">
      <h1>Welcome back</h1>
      <p>Please enter your details to sign in</p>
    </div>
    
    <?php if (isset($error)): ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="POST" action="">
      <div class="form-floating">
        <input type="email" class="form-control" id="emailInput" name="email" placeholder="Email address" required>
        <label for="emailInput">Email address</label>
      </div>
      
      <div class="form-floating">
        <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" required>
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