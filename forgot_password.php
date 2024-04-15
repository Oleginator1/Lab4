<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="wrapper">
    <div class="form-wrapper sign-in">
      <form method="post" action = "send-reset-password.php">
        <h2>Forgot Password</h2>
        <?php if($is_invalid): ?>
          <em>Invalid Credentials</em>
        <?php endif; ?>
        <div class="input-group">
          <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
          <label for="">Email</label>
        </div>
        <button type="submit">Send</button>
        <div class="signUp-link">
          <p>Don't have an account? <a href="sign-up.html" class="signUpBtn-link">Sign Up</a></p>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
