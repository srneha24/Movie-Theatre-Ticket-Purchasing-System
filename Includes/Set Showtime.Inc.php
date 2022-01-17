<?php

if (isset($_POST['setshow-submit'])) {
    include_once "../Classes/Film.Class.php";
    include_once "../Classes/Show.Class.php";

    session_start();

    $objShow = new Show();
    $objFilm = new Film();

    $show_date  = $_POST["show_date"];
    $current_date = date("Y-m-d");

    if (empty($show_date)) {
        $_SESSION["outmessage"] = "error=nodate";
        header("Location: ../Set Showtime.php?".$_SESSION["outmessage"]);
        exit();
    }
    
    elseif ($current_date > $show_date) {
        $_SESSION["outmessage"] = "error=datepassed";
        header("Location: ../Set Showtime.php?".$_SESSION["outmessage"]);
        exit();
    }

    else {
        if (isset($_POST["show-1"])) {
            if (empty($_POST["film-1"]) || empty($_POST["showtime-1"])) {
                $_SESSION["outmessage"] = "error=emptyfields";
        
                header("Location: ../Set Showtime.php?".$_SESSION["outmessage"]);
                exit();
            }
        }
    
        if (isset($_POST["show-2"])) {
            if (empty($_POST["film-2"]) || empty($_POST["showtime-2"])) {
                $_SESSION["outmessage"] = "error=emptyfields";
        
                header("Location: ../Set Showtime.php?".$_SESSION["outmessage"]);
                exit();
            }
        }
    
        if (isset($_POST["show-3"])) {
            if (empty($_POST["film-3"]) || empty($_POST["showtime-3"])) {
                $_SESSION["outmessage"] = "error=emptyfields";
        
                header("Location: ../Set Showtime.php?".$_SESSION["outmessage"]);
                exit();
            }
        }
    
        if (isset($_POST["show-4"])) {
            if (empty($_POST["film-4"]) || empty($_POST["showtime-4"])) {
                $_SESSION["outmessage"] = "error=emptyfields";
        
                header("Location: ../Set Showtime.php?".$_SESSION["outmessage"]);
                exit();
            }
        }
        
        
        if (isset($_POST["show-1"])) {
            $objShow->SetShow($show_date, $_POST["film-1"], $_POST["showtime-1"], $_SESSION["emp_id"]);
        }
    
        if (isset($_POST["show-2"])) {
            $objShow->SetShow($show_date, $_POST["film-2"], $_POST["showtime-2"], $_SESSION["emp_id"]);
        }
    
        if (isset($_POST["show-3"])) {
            $objShow->SetShow($show_date, $_POST["film-3"], $_POST["showtime-3"], $_SESSION["emp_id"]);
        }
    
        if (isset($_POST["show-4"])) {
            $objShow->SetShow($show_date, $_POST["film-4"], $_POST["showtime-4"], $_SESSION["emp_id"]);
        }
    
        $objShow->AllFilms($current_date);
        $films = $objShow->all_films;
    
        $objFilm->UpdateFilmStatus($films);
    
        $_SESSION["outmessage"] = "showset=success";
        header("Location: ../Set Showtime.php?".$_SESSION["outmessage"]);
        exit();
    }
}