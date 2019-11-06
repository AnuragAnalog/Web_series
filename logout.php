<?php
    session_start();

    if (isset($_SESSION['uname']))
    {
        unset($_SESSION['uname']);
        session_destroy();
        header("location:login.html?val=logout");
    }
?>