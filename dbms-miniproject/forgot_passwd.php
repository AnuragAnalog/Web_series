<?php
    session_start();
    include_once('db_conn.php');
    if (isset($_POST['btn']))
    {
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        // echo $uname;
        // echo $phno;
    }

    $uname = $uname.'_user';
    $check = mysqli_query($conn, "select * from user where uname = '$uname' and email = '$email'");
    $row = mysqli_fetch_row($check);

    if ($row)
    {
        header("location:reset_passwd.html?uname=".$uname);
    }
    else
    {
        header("location:forgot_passwd.html?err=fail");
    }

    mysqli_close($conn);
?>