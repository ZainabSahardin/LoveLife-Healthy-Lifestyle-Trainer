<?php
include 'Login.php';


// if the submit button has been set
if(isset($_POST["submit"])){

    session_start();
    // declare the variables $userID and $password to store the data posted
    $userID = htmlspecialchars($_POST["userID"], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $time = time()-300; // After 3 failed login attempt, user can't login for 5 minutes.
    $IpAdd = bin2hex(getIpAdd()); // Storing IP address in a variable.

    require "connection.php";
    
    $sql=mysqli_query($conn,"SELECT COUNT(*) AS TOTAL_COUNT FROM LOGIN_LOGS WHERE LOGIN_TIME > $time AND LOGIN_IP='$IpAdd'");
    $check_login_row=mysqli_fetch_assoc($sql);
    $total_count=$check_login_row['TOTAL_COUNT'];
    $remAttempt = 2- $total_count;

    //Checking if the attempt 3, or youcan set the no of attempt her. For now we taking only 3 fail attempted
    if($total_count==3){
        header("location: Login.php?error=manyfailedattempts");
        exit();
    }

    else {
        $sql = "SELECT*FROM USERS WHERE USER_ID = ?;"; // prepare a select statement (selection is based on USER_ID)
        $stmt = mysqli_stmt_init($conn);               // initialize a statement

        // a SQL statement template is created and sent to the database
        if(!mysqli_stmt_prepare($stmt, $sql)){ // if the statement is created or sent unsuccessfully
            header("location: Login.php?error=stmtError");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"s", $userID);  // bind the statement parameter
        mysqli_stmt_execute($stmt);                              // execute the statement

        // gets the selected result set from a prepared statement
        $resultData = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);                                // close the statement

        //fetches a result row as an associative array and stored into $row
        $row = mysqli_fetch_assoc($resultData);

        if(!$row) {//Wrong username
            $time = time();
            mysqli_query($conn, "INSERT INTO LOGIN_LOGS(LOGIN_IP,LOGIN_TIME) VALUES('$IpAdd','$time')");
            header("location: Login.php?error=remAttempt=$remAttempt");
            exit();
        }

        $pwdHashed = $row["USER_PWD"]; // store the hashed password into variable $pwdHashed

        // check the verification of the password
        if (password_verify($password, $pwdHashed) === false){ // if not able to verify
            $time = time();
            mysqli_query($conn, "INSERT INTO LOGIN_LOGS(LOGIN_IP,LOGIN_TIME) VALUES('$IpAdd','$time')");
            header("location: Login.php?error=remAttempt=$remAttempt");
            exit();
        }

        else{ // otherwise
            session_start();                         // start a new session
            $_SESSION["USER_ID"] = $row["USER_ID"];  // create a session variable by naming it with USER_ID
            $HTTP_SESSION["USER_FNAME"] = $row["USER_FNAME"];
            $_SESSION["USER_TYPE"] = $row["USER_TYPE"];


            // if the session has been set
            if(isset($_SESSION["USER_ID"])){
                mysqli_query($conn,"DELETE FROM LOGIN_LOGS WHERE LOGIN_IP='$IpAdd'");
                header("location: mainpage.php");  // go to main page
                exit();
            }

            else{ // otherwise
                header("location: Login.php?error=sessionError");
                exit();
            }
        }
    }
} // end if(isset($_POST["submit"]))

else{ // otherwise
    header("location: Login.php");
}

/* function */
function getIpAdd(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
        $IpAdd=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $IpAdd=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
        $IpAdd=$_SERVER['REMOTE_ADDR'];
    }
    return $IpAdd;
}

