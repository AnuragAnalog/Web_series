<?php
    session_start();
    include_once('db_conn.php');

    if (isset($_POST['Submit']))
    {
        $namews = $_POST['namews'];
        $genrews = $_POST['genrews'];
        $seasonws = $_POST['seasonws'];
        $seasonws = intval($seasonws);
        if ($seasonws == 0)
        {
            $seasonws = 1;
        }
        $episodews = $_POST['episodews'];
        $episodews = intval($episodews);
        if ($episodews == 0)
        {
            $episodews = 1;
        }
        $durationws = $_POST['durationws'];
        $durationws = intval($durationws);
        if ($durationws == 0)
        {
            $durationws = 60;
        }
        $ratews = $_POST['ratews'];
        $ratews = intval($ratews);
        if ($ratews == 0)
        {
            $ratews = 1;
        }
        $imagews = $_POST['imagews'];
        $videows = $_POST['videows'];
        $current_date = date("Y-m-d H:i:s");
    }

    if (strlen($namews) == 0)
    {
        header("location:welcome.html?stat=name");
        return ;
    }
    else if (strlen($genrews) == 0)
    {
        header("location:welcome.html?stat=genre");
        return ;
    }
    else if (strlen($imagews) == 0)
    {
        header("location:welcome.html?stat=image");
        return ;
    }
    else if (strlen($videows) == 0)
    {
        header("location:welcome.html?stat=video");
        return ;
    }

    $db_query = mysqli_query($conn, "insert into web_series (ws_name, ws_genre, no_of_seasons, no_of_episodes, duration, ratings, ws_image, ws_video, pub_date) values ('$namews', '$genrews', '$seasonws', '$episodews', '$durationws', '$ratews', '$imagews', '$videows', '$current_date')");
    $row  = mysqli_fetch_array($db_query);

    if ($db_query)
    {
        echo "Connection Done";
        header("location:welcome.html?stat=added");
    }
    else
    {
        echo "Failed";
    }
    // mysqli_close($conn);
?>