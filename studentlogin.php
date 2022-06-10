<?php
include 'dbcon.php';
if (isset($_POST['Studentlogin'])) {
    $studentquery = "SELECT * FROM `register` WHERE `uname`='$_POST[stuname]'";
    $result = mysqli_query($con, $studentquery);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {

            if (password_verify($_POST['stupass'], $row['pass'])) {

                echo "Right";
            } else {
                echo "<script> 
                alert('password not match');
                window.location.href='login.html'; 
                </script>";
            }
        }
    } else {
       
        echo "<script> 
            alert('Failed to login');
            window.location.href='login.html'; 
            </script>";
    }
}
