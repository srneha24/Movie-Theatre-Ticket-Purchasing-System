<?php

if (isset($_POST['purchase-submit'])) {
    include_once "../Classes/Ticket.Class.php";

    session_start();

    $objTicket = new Ticket();
    $objTicket->NewTicket($_SESSION["show_id"], count($_SESSION["chosen-seats"]), $_SESSION["chosen-seats"], $_SESSION["class_choice"], $_SESSION["cost"], $_SESSION["cust_id"]);

    $_SESSION["outmessage"] = "purchase=success";

    header("Location: ../Purchase Confirmation.php?".$_SESSION["outmessage"]);
    exit();
}