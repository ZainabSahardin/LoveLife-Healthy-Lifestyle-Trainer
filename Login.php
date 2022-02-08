<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
    <link rel="stylesheet" href="LoginStyle.css">
</head>

<body>
<div class="loginForm">
    <form action="LoginAction.php" method="post">
        <h2>LOGIN</h2>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyInput"){
                echo "<p class=error>Please fill in all fields!</p>";
            }
            else if ($_GET["error"] == "wrongInfo"){
                echo "<p class=error>Incorrect username or password.</p>";
            }

            else if ($_GET["error"] == "stmtError"){
                echo "<p class=error>Something wrong. Please try again</p>";
            }
            else if ($_GET["error"] == "manyfailedattempts"){
                echo "<p class=error>Attempt limit exceeded.<br>Please try to login after 5 minutes</p>";
            }
            else if ($_GET["error"] == "remAttempt=0"){
                echo "<p class=error>Incorrect username or password.<br>Attempt limit exceeded.<br/>Please try to login after 5 minutes</p>";
            }
            else if ($_GET["error"] == "remAttempt=1"){
                echo "<p class=error>Incorrect username or password.<br>Please enter valid login details.<br/>1 attempt remaining </p>";
            }
            else if ($_GET["error"] == "remAttempt=2"){
                echo "<p class=error>Incorrect username or password.<br>Please enter valid login details.<br/>2 attempts remaining </p>";

        }}
        ?>

        <label><strong>User Name</strong></label>
        <input type="text" name="userID" placeholder="email address" required><br>

        <label><strong>Password</strong></label>
        <input type="password" name="password" placeholder="password" required><br>

        <button type="submit" name="submit">LOGIN</button>
    </form>
</div>
</body>
</html>