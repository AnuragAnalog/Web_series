<?php
    session_start();
    include_once("db_conn.php");

    if (isset($_POST['login']))
    {
        $_SESSION['uname'] = $_POST['uname'];
        $uname1 = $_POST['uname']."_admin";
        $uname2 = $_POST['uname']."_user";
        $passwd = mysqli_real_escape_string($conn, $_POST['passwd']);
        $_SESSION['passwd'] = $passwd;
        // echo $uname;
        // echo $passwd;

        $result1 = mysqli_query($conn, "select * from user where uname = '$uname1' and passwd ='$passwd'");
        $result2 = mysqli_query($conn, "select * from user where uname = '$uname2' and passwd ='$passwd'");
    }
    else
    {
        echo "Didn't get the information.";
    }
    
    if ($row = mysqli_fetch_array($result1))
    {
        $_SESSION['type'] = "admin";
        header("location:welcome.html");
    }
    elseif (($row = mysqli_fetch_array($result2)))
    {
        $_SESSION['type'] = "user";
        header("location:playlist.php");
    }
    else
    {
        header("location:login.html?val=loginfail");;
    }

    mysqli_close($conn);
?>