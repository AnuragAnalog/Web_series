<?php
    session_start();
    include_once('db_conn.php');
    if (isset($_POST['btn']))
    {
        $passwd = $_POST['npasswd'];
        $conpasswd = $_POST['cnpasswd'];
    }

    if (strlen($passwd) < 8)
    {
        header("location:reset_passwd.html?err=passlen");
        return ;
    }
    else if ($passwd != $conpasswd)
    {
        // echo $conpasswd;
        header("location:reset_passwd.html?err=passconpass");
        return ;
    }

    $uname = $uname.'_user';
    $insert = mysqli_query($conn, "update user set passwd = '$passwd', conpasswd = '$conpasswd' where uname = '$uname'");
    $check = mysqli_fetch_row($insert);

    if ($check)
    {
        header("location:login.html?val=reset");
    }
    else
    {
        header("location:reset_passwd.html?val=fail");
    }
?>