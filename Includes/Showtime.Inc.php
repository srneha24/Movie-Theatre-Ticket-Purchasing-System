<?php

if (isset($_POST['showdate-submit'])) {
    include_once "../Classes/Show.Class.php";

    session_start();

    $date_search = $_POST['showdate'];
    $_SESSION["date_search"] = $date_search;

    $current_date = date("Y-m-d");

    if ($current_date > $date_search) {
        $_SESSION["errormessage"] = "error=datepassed";
        header("Location: ../Showtime.php?".$_SESSION["errormessage"]);
        exit();
    }

    else {
        $objShow = new Show();
        $objShow->Showtime($date_search);

        $_SESSION["total_shows"] = $objShow->total_shows;

        if ($objShow->total_shows == 0) {
            $_SESSION["errormessage"] = "error=shownotset";
            header("Location: ../Showtime.php?".$_SESSION["errormessage"]);
            exit();
        }

        else {
            $_SESSION["showtime"] = $objShow->showtime;

            header("Location: ../Showtime.php");
            exit();
        }
    }
}