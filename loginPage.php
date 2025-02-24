<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>

    <div class="form-container">
       
        <h1>Login</h1>
        <form action="login.php" method="POST" id="loginForm">
            <input type="email" placeholder="Your Email" id="loginEmail">
            <input type="password" placeholder="Your Password" id="loginPassword">
            <button class="btn" type="submit">Login</button>
            <a href="#">Forgot Password?</a>
        </form>

       
    </div>

<script src="index.js"></script>
</body>
</html>
