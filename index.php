<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Website - Home</title>
    <link rel="stylesheet" href="home-styles.css"> <!-- Link your CSS file here -->
    <style>
        /* Additional styles specific to this page */
        body {
            background-color: #000; /* Match login page background color */
            color: #fff; /* Match text color */
            font-family: 'Poppins', sans-serif; /* Match font family */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Set minimum height to the viewport height */
        }

        .header-container {
            background-color: #000;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .header-box {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header {
            color: #fff;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #ff9900;
        }

        .container {
            flex: 1; /* Expand container to fill available space */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content {
            text-align: center;
        }

        h2, p {
            color: #fff; /* Match text color */
            margin-bottom: 20px; /* Match margin */
        }

        footer {
            background-color: #000; /* Black background color */
            color: #fff; /* Text color */
            text-align: center;
            padding: 20px;
            box-shadow: 0 0 50px #0ef; /* Glowing effect */
        }
        
    </style>
</head>
<body>
    <div class="header-container">
        <div class="header-box">
            <header>
                <h1>Oleginator Technology</h1>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <?php if(isset($_SESSION['user_id'])): ?>
                            <li><span>Hello, <?php echo $_SESSION['username']; ?></span></li>
                            <li><a href="logout.php">Logout</a></li>
                        <?php else: ?>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="sign-up.html">Sign Up</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </header>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <h2>Welcome to Simple Website!</h2>
            <p>This is the home page of our website. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor, ipsum vel faucibus sodales, quam libero bibendum ipsum, vel finibus ligula tortor sit amet dolor.</p>
            <p>Ut auctor est nec metus tincidunt, nec convallis odio condimentum. Aliquam non neque auctor, volutpat ex id, efficitur orci. Donec sed felis quis tortor rutrum commodo. Nam lacinia, velit nec rhoncus facilisis, nulla arcu pharetra purus, ac placerat eros arcu sed risus. Integer facilisis libero ut lorem facilisis, vel congue risus blandit.</p>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Oleginator Techonology.INC</p>
    </footer>
</body>
</html>
