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
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);

    // Validate form inputs
    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
        try {
            // Check if email or username already exists
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            if ($stmt->rowCount() > 0) {
                $error = "Email is already registered.";
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert user into the database
                $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
                $stmt->execute([
                    'username' => $name,
                    'email' => $email,
                    'password' => $hashedPassword
                ]);

                // Start session and redirect to dashboard
                $_SESSION['user_id'] = $pdo->lastInsertId();
                $_SESSION['username'] = $name;
                header("Location: index.php");
                exit;
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
    
    <?php if (isset($error)): ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="POST" action="">
      <div class="form-floating">
        <input type="text" class="form-control" id="nameInput" name="name" placeholder="Full Name" required>
        <label for="nameInput">Full Name</label>
      </div>
      
      <div class="form-floating">
        <input type="email" class="form-control" id="emailInput" name="email" placeholder="Email address" required>
        <label for="emailInput">Email address</label>
      </div>
      
      <div class="form-floating">
        <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" required>
        <label for="passwordInput">Password</label>
      </div>
      
      <div class="form-floating">
        <input type="password" class="form-control" id="confirmPasswordInput" name="confirmPassword" placeholder="Confirm Password" required>
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