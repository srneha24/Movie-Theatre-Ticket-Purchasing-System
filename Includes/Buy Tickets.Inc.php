<?php

if (isset($_POST['buydate-submit'])) {
    include_once "../Classes/Show.Class.php";

    session_start();

    $_SESSION["date_select"] = $_POST['showdate'];

    $current_date = date("Y-m-d");

    if ($current_date > $_SESSION["date_select"]) {
        $_SESSION["errormessage"] = "error=datepassed";
        header("Location: {$_SERVER["HTTP_REFERER"]}?".$_SESSION["errormessage"]);
        exit();
    }

    else {
        $objShow = new Show();
        $objShow->ShowDateSelect($_SESSION["date_select"]);

        $_SESSION["total_shows"] = $objShow->total_shows;

        if ($objShow->total_shows == 0) {
            $_SESSION["errormessage"] = "error=shownotset";
            header("Location: {$_SERVER["HTTP_REFERER"]}?".$_SESSION["errormessage"]);
            exit();
        }

        else {
            $_SESSION["filmchoice"] = True;
            $_SESSION["film_id_select"] = $objShow->film_id_select;
            $_SESSION["film_name_select"] = $objShow->film_name_select;

            header("Location: {$_SERVER["HTTP_REFERER"]}");
            exit();
        }
    }
}

elseif (isset($_POST['buyfilm-submit'])) {
    include_once "../Classes/Show.Class.php";

    session_start();

    $_SESSION["film_select"] = $_POST['film-choice'];

    $objShow = new Show();
    $objShow->FilmSelect($_SESSION["date_select"], $_SESSION["film_select"]);

    $_SESSION["total_shows"] = $objShow->total_shows;

    $_SESSION["showchoice"] = True;
    $_SESSION["showtime_select"] = $objShow->showtime_select;
    $_SESSION["film_name_choice"] = $objShow->film_name_choice;

    header("Location: {$_SERVER["HTTP_REFERER"]}");
    exit();
}