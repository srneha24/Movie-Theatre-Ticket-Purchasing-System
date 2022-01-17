<?php

if (isset($_POST['seatchoice-submit'])) {
    include_once "../Classes/Ticket.Class.php";
    include_once "../Classes/Show.Class.php";

    session_start();

    $_SESSION["time_choice"] = $_POST["time-choice"];
    $_SESSION["class_choice"] = $_POST["class-choice"];

    $objShow = new Show();
    $objShow->getShowID($_SESSION["date_select"], $_SESSION["film_select"], $_SESSION["time_choice"] );
    $_SESSION["show_id"] = $objShow->show_id_chosen;

    $objTicket = new Ticket();
    $objTicket->ChosenSeats($_SESSION["show_id"]);
    $_SESSION["blocked_seats"] = $objTicket->blocked_seats;

    if ($_SESSION["time_choice"] === '10:00:00' || $_SESSION["time_choice"] === '12:30:00') {
        if ($_SESSION["class_choice"] === 'First') {
            $_SESSION["cost"] = 200.00;
        }
        elseif ($_SESSION["class_choice"] === 'Second') {
            $_SESSION["cost"] = 350.00;
        }
        elseif ($_SESSION["class_choice"] === 'Third') {
            $_SESSION["cost"] = 500.00;
        }
    }

    elseif ($_SESSION["time_choice"] === '15:00:00' || $_SESSION["time_choice"] === '17:30:00') {
        if ($_SESSION["class_choice"] === 'First') {
            $_SESSION["cost"] = 350.00;
        }
        elseif ($_SESSION["class_choice"] === 'Second') {
            $_SESSION["cost"] = 500.00;
        }
        elseif ($_SESSION["class_choice"] === 'Third') {
            $_SESSION["cost"] = 800.00;
        }
    }

    header("Location: ../Seat Arrangement.php");
    exit();
}

elseif (isset($_POST['seatschosen-submit'])) {
    session_start();

    $_SESSION["chosen-seats"] = $_POST["seat"];

    if (count($_SESSION["chosen-seats"]) > 10) {
        $_SESSION["outmessage"] = "error=toomanyseats";
        header("Location: ../Seat Arrangement.php");
        exit();
    }

    else {
        header("Location: ../Purchase Confirmation.php");
        exit();
    }

}