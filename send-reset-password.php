<?php

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);


$mysqli = require __DIR__ .  "/database_connect.php";

$sql = "UPDATE users SET reset_token_hash = ?,  reset_token_expires_at = ? WHERE Email = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();


if($mysqli->affected_rows) {

    $mail = require __DIR__ ."/mailer.php";

    $mail->setFrom("olegnastas9@gmail.com","Oleg");

    $mail->addAddress($email);

    $mail->Subject = "Password Reset";

    $mail->Body = <<< END

    Click <a href = "">here</a> to reset your password

    END;

    try {
        $mail->send();
    }
    catch(Exception $e) {
        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
    }

}

echo "Message sent, please check your inbox.";

?>