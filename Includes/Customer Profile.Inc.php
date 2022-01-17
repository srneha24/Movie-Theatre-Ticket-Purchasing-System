<?php

if (isset($_POST['custinfo-submit'])) {
    include_once "../Classes/Customer.Class.php";

    session_start();

    $new_cust_name = $_POST["cust_name"];
    $new_cust_phone = $_POST["cust_phone"];
    $new_cust_email = $_POST["cust_email"];
    $new_card_no = $_POST["cust_card_no"];
    $new_exp_date = $_POST["cust_exp_date"];
    $new_cvc_no = $_POST["cust_cvc_no"];

    $_SESSION["cust_name"] = $new_cust_name;
    $_SESSION["cust_email"] = $new_cust_email;
    $_SESSION["cust_phone"] = $new_cust_phone;
    $_SESSION["card_no"] = $new_card_no;
    $_SESSION["exp_date"] = $new_exp_date;
    $_SESSION["cvc_no"] = $new_cvc_no;

    $objCust = new Customer();
    $objCust->updateCustomerInfo($new_cust_name, $new_cust_phone, $new_cust_email, $new_card_no, $new_exp_date, $new_cvc_no, $_SESSION["cust_id"]);

    $_SESSION["outmessage"] = "infoupdate=success";
    header("Location: ../Customer Profile.php?".$_SESSION["outmessage"]);
    exit();
}