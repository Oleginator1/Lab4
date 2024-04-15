<?php

if(empty($_POST["name"]))
{
    die("Username is required");
}

if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
{
    die("A valid email is required");
}

if(strlen($_POST["password"]) < 2)
{
    die("Password must be at least 8 characters long");
}

if($_POST["password"] !== $_POST["password_confirmation"])
{
    die("Passwords don't match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database_connect.php";

$sql = "INSERT INTO users (Username, Email, Password_hash) 
        VALUES(?, ?, ?)";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql)){
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);

try {
    $stmt->execute();
    header("Location: signup_success.html");
    exit;

} catch (mysqli_sql_exception $e) {

    if($e->getCode() === 1062) {

        die("Email already taken");
    } 
    else {
        
        die("Error: " . $e->getMessage());
    }
}
