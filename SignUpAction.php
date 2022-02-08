<?php

include_once "functions.php";


// if the signup button has been set
if(isset($_POST["signup"])) {

    // declare the variables to store the data posted
    $fname = htmlspecialchars($_POST["fname"], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $lname = htmlspecialchars($_POST["lname"], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $userID = htmlspecialchars($_POST["userID"], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $pswd = htmlspecialchars($_POST["pswd"], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $confirmpswd = htmlspecialchars($_POST["confirmpswd"], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');


    require"connection.php";

    // function call to check validation of first name
    if(invalidfName($fname) !== false){
        header("location: SignUp.php?error=invalidFirstName");
        exit();
    }

    // function call to check validation of last name
    if(invalidlName($lname) !== false){
        header("location: SignUp.php?error=invalidLastName");
        exit();
    }

    // function call to check validation of username (email)
    if(invalidUserID($userID) !== false){
        header("location: SignUp.php?error=invalidUsername");
        exit();
    }

    // function call to check do the username already exist
    if(userIDexists($conn, $userID)!== false){
        header("location: SignUp.php?error=emailalreadyexist");
        exit();
    }

    // function call to check strength of password
    if(weakPassword($pswd)!== false){
        header("location: SignUp.php?error=weakPassword");
        exit();
    }

    // function call to check do the password and confirm password matches
    if(matchPswd($pswd,$confirmpswd)!== false){
        header("location: SignUp.php?error=passworddontmatch");
        exit();
    }



    // function call create a new user
    createUser($conn, $fname, $lname, $userID, $pswd);

} // end if(isset($_POST["submit"]))

else{ // otherwise
    header("location: SignUp.php");
}

/* function */

// function to check validation of first name
//if users include symbols as first name, the function will return false
function invalidfName($fname){
    if(!preg_match("/^[a-zA-Z0-9 ]*$/", $fname))
        return true;

    else
        return false;
}

// function to check validation of last name
//if users include symbols as last name, the function will return false
function invalidlName($lname){
    if(!preg_match("/^[a-zA-Z0-9 ]*$/", $lname))
        return true;

    else
        return false;
}

// function to check validation of username
//if users input invalid email as username, the function will return false
function invalidUserID($userID){
    if(!filter_var($userID, FILTER_VALIDATE_EMAIL))
        return true;

    else
        return false;
}

// function to check do the username already exist
//if username already exist, the function will return false
function userIDexists($conn, $userID){

    $sql = "SELECT*FROM USERS WHERE USER_ID = ?;";  // prepare a select statement (selection is based on USER_ID)
    $stmt = mysqli_stmt_init($conn);                // initialize a statement

    // a SQL statement template is created and sent to the database
    if(!mysqli_stmt_prepare($stmt, $sql)){ // if the statement is created or sent unsuccessfully
        header("location: SignUp.php?error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $userID ); // bind the statement parameter
    mysqli_stmt_execute($stmt);                               // execute the statement

    // gets the selected result set from a prepared statement
    $resultData = mysqli_stmt_get_result($stmt);

    //fetches a result row as an associative array and stored into $row
    if($row = mysqli_fetch_assoc($resultData)) {//if user with the username already exist
        return $row;
    }

    else {
        $resultData = false;
        return $resultData;
    }

    mysqli_stmt_close($stmt);//close SQL statement
}

// function to check strength of password
function weakPassword($pswd){
    $uppercase = preg_match('@[A-Z]@', $pswd);
    $lowercase = preg_match('@[a-z]@', $pswd);
    $number    = preg_match('@[0-9]@', $pswd);
    $specialChars = preg_match('@[^\w]@', $pswd);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pswd) < 8) {
        return true;
    }else{
        return false;
    }
}

// function to check do the password and confirm password matches
//if the password and confirm password does not match, the function will return false
function matchPswd($pswd,$confirmpswd){
    if($pswd !== $confirmpswd)
        return true;

    else
        return false;
}




// function to create a new pre_user
function createUser($conn, $fname, $lname, $userID, $pswd){

    // prepare an insert statement


    $sql = "INSERT INTO USERS (USER_ID,USER_FNAME,USER_LNAME,USER_PWD) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);  // initialize a statement

    // a SQL statement template is created and sent to the database
    if(!mysqli_stmt_prepare($stmt, $sql)){ // if the statement is created or sent unsuccessfully
        header("location: SignUp.php?error=stmt3Error");
        exit();
    }
    else{
        header("location: Login.php?success=login");
    }

    //Replace readable password to hashing password
    $hashedpswd = password_hash($pswd,PASSWORD_DEFAULT);

    // bind the statement parameter
    mysqli_stmt_bind_param($stmt, "ssss", $userID, $fname, $lname, $hashedpswd);

    mysqli_stmt_execute($stmt);  // execute the statement
    mysqli_stmt_close($stmt);    // close the statement




}
