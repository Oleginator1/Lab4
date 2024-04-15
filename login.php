<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database_connect.php";
    
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    
    $email = $mysqli->real_escape_string($_POST["email"]);
    
    $sql = "SELECT * FROM Users WHERE Email = '$email'";
    
    $result = $mysqli->query($sql);
    
    if ($result) {
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (isset($user["Password_hash"])) {
                if (password_verify($_POST["password"], $user["Password_hash"])) {
                    echo "Password verified"; // Add this line for debugging
                    session_start();
                    session_regenerate_id();
                    $_SESSION["user_id"] = $user["Id"];
                    $_SESSION["email"] = $user["Email"];
                    $_SESSION["username"] = $user["Username"];
                    header("Location: index.php");
                    exit;
                } else {
                    echo "Password verification failed"; // Add this line for debugging
                    $is_invalid = true;
                }
            } else {
                echo "Password hash not found"; // Add this line for debugging
                $is_invalid = true;
            }
        } else {
            echo "User not found"; // Add this line for debugging
            $is_invalid = true;
        }
    } else {
        echo "Error: " . $mysqli->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="wrapper">
    <div class="form-wrapper sign-in">
      <form method="post">
        <h2>Login</h2>
        <?php if($is_invalid): ?>
          <em>Invalid Credentials</em>
        <?php endif; ?>
        <div class="input-group">
          <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
          <label for="">Email</label>
        </div>
        <div class="input-group">
          <input type="password" name="password" id="password" required>
          <label for="">Password</label>
        </div>
        <div class="remember">
          <label><input type="checkbox"> Remember me</label>
        </div>
        <button type="submit">Login</button>
        <div class="signUp-link">
          <p><a href="forgot_password.php" class="signInBtn-link">Forgot password?</a></p>
        </div>
        <div class="signUp-link">
          <p>Don't have an account? <a href="sign-up.html" class="signUpBtn-link">Sign Up</a></p>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
