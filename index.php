<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>

    <div class="form-container">
        <div class="form-btn">
            <span onclick="showLogin()">Login</span>
            <span onclick="showSignup()">SignUp</span>
            <hr id="indicator">
        </div>

        <form action="login.php" method="POST" id="loginForm" style="display:none;">
            <input type="email" placeholder="Your Email" id="loginEmail">
            <input type="password" placeholder="Your Password" id="loginPassword">
            <button class="btn" type="submit">Login</button>
            <a href="#">Forgot Password?</a>
        </form>

        <form action="signup.php" id="registerForm" method="POST">
            <input type="email" placeholder="Your Email" id="signupEmail">
            <input type="text" placeholder="Your Name" id="signupName">
            <input type="password" placeholder="Your Password" id="signupPassword">
            <button class="btn" type="submit">Sign Up</button>
        </form>
    </div>

<script src="index.js"></script>
</body>
</html>
