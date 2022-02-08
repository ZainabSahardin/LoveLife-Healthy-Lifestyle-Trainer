<?php
require "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>


    <link rel="stylesheet" href="LoginStyle.css">
</head>
<body>

<div class = "signUpForm">
    <form action="SignUpAction.php" method="post">
        <h2>Sign Up</h2>

        <!--Display error if error is found when user input Sign Up form*/-->
        <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "invalidFirstName")
                echo "<p class=error>Invalid First Name. (Not include symbols eg. /?) </p>";

            else if($_GET["error"] == "invalidLastName")
                echo "<p class=error>Invalid Last Name. (Not include symbols eg. /?)</p>";

            else if($_GET["error"] == "invalidUsername")
                echo "<p class=error>Enter a proper email. </p>";

            else if($_GET["error"] == "weakPassword")
                echo "<p class=error>Password should include at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character. </p>";

            else if($_GET["error"] == "passworddontmatch")
                echo "<p class=error>Password doesn't match. </p>";

            else if($_GET["error"] == "emailalreadyexist")
                echo "<p class=error>Email already exists. </p>";

            else if($_GET["error"] == "failforrecaptcha")
                echo "<p class=error>Plese check on the reCAPTCHA box.</p>";

            else if($_GET["error"] == "OTPError")
                echo "<p class=error>Fail to send OTP code.</p>";

            else if($_GET["error"] == "stmtError")
                echo "<p class=error>Something went wrong, try again!</p>";
        }
        ?>

        <!--Create Sign Up form-->
        <!--<p class="instruction">Want get skilled, boost resume?<br> Create an account for free.</p><br>-->


        <label>First Name</label>
        <input type="text" name="fname" placeholder="First Name" required><br>

        <label>Last Name</label>
        <input type="text" name="lname" placeholder="Last Name" required><br>

        <label>Username</label>
        <input type="text" name="userID" placeholder="Email" required><br>

        <label>Password</label>
        <input type="password" name="pswd" placeholder="Password (At least 8 characters)" minlength="8" required><br>

        <label>Confirm Password</label>
        <input type="password" name="confirmpswd" placeholder="Confirm Password" required><br>


        <button type="submit" name="signup">Sign Up</button><br>

        <p class="instruction">Already have an account? Click here to <a href = 'Login.php'>Login</a></p>

    </form>
</div>
</body>
</html>
