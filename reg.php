<?php
    include_once("db_conn.php");

    if (isset($_POST['register']))
    {
        $uname = $_POST['uname'];
        $passwd = $_POST['passwd'];
        $conpasswd = $_POST['conpasswd'];
        $email = $_POST['email'];
        $type = $_POST['admin-user'];
    }
    
    $check = mysqli_query($conn, "select * from user where uname = '$uname'");
    $row = mysqli_fetch_array($check);

    if ($row['uname'] == $uname)
    {
        header("location:login.html?reg=alreadyreg");
    }
    else
    {
        if (strlen($uname) == 0)
        {
            header("location:register.html?err=users");
            return ;
        }

        if (strlen($passwd) < 8)
        {
            // echo $passwd;
            header("location:register.html?err=passlen");
            return ;
        }
        else if ($passwd != $conpasswd)
        {
            // echo $conpasswd;
            header("location:register.html?err=passconpass");
            return ;
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header("location:register.html?err=email");
        }
    }

    $md5passwd = $passwd;

    if ($type == 'admin')
    {
        $uname = $uname.'_admin';
    }
    else
    {
        $uname = $uname.'_user';
    }
    $insert = mysqli_query($conn, "insert into user (uname, passwd, conpasswd, email) values ('$uname', '$md5passwd', '$md5passwd', '$email')");

    if ($insert)
    {
        header("location:login.html?reg=newreg");
    }
    else
    {
        echo "Insertion failed";
    }

    mysqli_close($conn);
?>