<?php

if (isset ($_POST['submit'])) {

    include_once 'dbh.inc.php';

    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $userpwd = mysqli_real_escape_string($conn, $_POST['userpwd']);
    $postaladd = mysqli_real_escape_string($conn, $_POST['postaladd']);
    $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);

    //Error handlers
    //Check for empty fields
    //if (empty($fullName) || empty($email) empty($dob) || empty($gender) || empty($username) || 
    //empty($userpwd) || empty($postaladd) || empty($postcode)) {
    //        header("Location: ../signup.php?signup=empty");
    //        exit();
    //} else {
        //check if input characters are valid
       if (!preg_match("/^[a-zA-Z]*$/", $fullName)) {
            header("Location: ../signup.php");
    exit();
        }
        else {
            //check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php");
    exit();
            }
        else {
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_querry($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0)
            {
                header("Location: ../signup.php?usertaken");
    exit();
            }
        else {
            //Hashing the password
            $hasheduserpwd = password_has($userpwd, PASSWORD_DEFAULT);
            
            //insert the user into database
            $sql ="INSERT INTO users (user_fullName, user_email, user_gender, user_dob, user_username, user_userpwd,
            user_postaladd, user_postcode) VALUES ('$fullName', '$email', '$dob', '$gender', '$username', '$hasheduserpwd',
             '$postaladd', '$postcode');";
             mysqli_querry($conn, $sql);
             header("Location: ../signup.php?success");
    exit();
        }
        }
        }
    }
 //   }
 else { 
    header("Location: ../signup.php");
    exit();
}
?>