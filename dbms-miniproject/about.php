<html>
    <title>
        About
    </title>

    <head>
        <center>
            <h1> About Users </h1>
        </center>
        <link rel=stylesheet type=text/css href=./css/about.css>
    </head>
</html>

<?php
    session_start();
    if ($_SESSION['type'] != "admin")
    {
        header("location:login.html?val=permit");
    }
    include_once('db_conn.php');

    $db_qurery = mysqli_query($conn, "select * from user");

    echo "<div class=parent>";
    while ($row = mysqli_fetch_array($db_qurery))
    {
        echo "<div class=userData>";
        $name = $row['uname'];
        $email = $row['email'];
        if (substr($name, strlen($name)-5, strlen($name)) == '_user')
        {
            $name = substr($name, 0, strlen($name)-5);
            echo "Username: $name<br>";
            echo "Privilages: User<br>";
        }
        else if (substr($name, strlen($name)-6, strlen($name)) == '_admin')
        {
            $name = substr($name, 0, strlen($name)-6);
            echo "Username: $name<br>";
            echo "Privilages: Admin<br>";
        }
        echo "Email: $email<br>";
        echo "</div><br>";
    }
    echo "</div>"; 
?>