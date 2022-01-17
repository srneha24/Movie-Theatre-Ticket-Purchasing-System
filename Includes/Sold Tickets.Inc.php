<?php

if (isset($_POST['soldseats-submit'])) {
    include_once "../Classes/Ticket.Class.php";
    include_once "../Classes/Show.Class.php";

    session_start();

    $_SESSION["time_choice"] = $_POST["time-choice"];

    $objShow = new Show();
    $objShow->getShowID($_SESSION["date_select"], $_SESSION["film_select"], $_SESSION["time_choice"] );
    $_SESSION["show_id"] = $objShow->show_id_chosen;

    $objTicket = new Ticket();
    $objTicket->TicketView($_SESSION["show_id"]);

    $_SESSION["first_ticket_no"] = $objTicket->first_ticket_no;
    $_SESSION["first_seat_no"] = $objTicket->first_seat_no;
    $_SESSION["first_cust_id"] = $objTicket->first_cust_id;
    $_SESSION["first_cust_name"] = $objTicket->first_cust_name;
    $_SESSION["second_ticket_no"] = $objTicket->second_ticket_no;
    $_SESSION["second_seat_no"] = $objTicket->second_seat_no;
    $_SESSION["second_cust_id"] = $objTicket->second_cust_id;
    $_SESSION["second_cust_name"] = $objTicket->second_cust_name;
    $_SESSION["third_ticket_no"] = $objTicket->third_ticket_no;
    $_SESSION["third_seat_no"] = $objTicket->third_seat_no;
    $_SESSION["third_cust_id"] = $objTicket->third_cust_id;
    $_SESSION["third_cust_name"] = $objTicket->third_cust_name;

    header("Location: ../Show Tickets.php");
    exit();
}