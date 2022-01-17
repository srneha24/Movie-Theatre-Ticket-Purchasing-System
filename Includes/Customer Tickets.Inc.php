<?php

if (isset($_POST['usertix-submit'])) {
    include_once "../Classes/Show.Class.php";

    session_start();

    $objShow = new Show();
    $objShow->CustomerShow($_SESSION["cust_id"]);

    if ($objShow->cust_total_shows == 0) {
        $_SESSION["status"] = "tickets=notfound";

        header("Location: ../Customer Tickets.php");
        exit();
    }

    else {
        $_SESSION["status"] = "tickets=found";
        
        $_SESSION["cust_show_date"] = $objShow->cust_show_date;
        $_SESSION["cust_film_name"] = $objShow->cust_film_name;
        $_SESSION["cust_showtime"] = $objShow->cust_showtime;

        header("Location: ../Customer Tickets.php");
        exit();
    }
}