<?php
include 'dbcon.php';
#For Register
if (isset($_POST['regsubmit'])) {
    $fullname =  $_POST['fullname'];
    $stuname =  $_POST['username'];
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    $repassword =  $_POST['repassword'];
    $phoneno =  $_POST['phoneno'];
    $checkstu = "  SELECT * FROM `register` WHERE uname = '$stuname' ";
    $stuquery = mysqli_query($con, $checkstu);
    $stucount = mysqli_num_rows($stuquery);
    if ($stucount > 0) {
        echo "<script> 
        alert('User already exists');
        window.location.href='login.html'; 
        </script>";
    } else {
        if ($password == $repassword) {
            $passhash = password_hash($password, PASSWORD_DEFAULT);
            $insertquery = "INSERT INTO `register`(`fname`, `uname`, `email`, `pass`,`phoneno`) 
        VALUES ('[$fullname]','[$stuname]','[$email]','[$passhash]','[$phoneno]')";
            $iquery = mysqli_query($con, $insertquery);
            if ($iquery) {
                header("Location:homepage.html");
            } else {
                echo "<script> 
                alert('Failed to register');
                window.location.href='login.html'; 
                </script>";
            }
        } else {
            echo "<script>
            alert(' Password not match'); 
            window.location.href='login.html';
            </script>";
        }
    }
}
