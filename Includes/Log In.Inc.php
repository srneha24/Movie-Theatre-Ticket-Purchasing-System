<?php

if (isset($_POST['login-cust-submit'])) {
    include_once "../Classes/Customer.Class.php";

    session_start();

    $cust_idemail = $_POST["cust_idemail"];
    $cust_pwd = $_POST["cust_pwd"];

    if (empty($cust_idemail) || empty($cust_pwd)) {
        $_SESSION["outmessage"] = "error=emptyfields";

        header("Location: ../Log In.php?".$_SESSION["outmessage"]);
        exit();
    }

    else {
        $objCust = new Customer();
        $result = $objCust->getCustomerInfo($cust_idemail, $cust_pwd);

        if ($result === 1) {
            $_SESSION["cust_id"] = $objCust->cust_id;
            $_SESSION["cust_name"] = $objCust->cust_name;
            $_SESSION["cust_email"] = $objCust->cust_email;
            $_SESSION["cust_phone"] = $objCust->cust_phone;
            $_SESSION["card_no"] = $objCust->card_no;
            $_SESSION["exp_date"] = $objCust->exp_date;
            $_SESSION["cvc_no"] = $objCust->cvc_no;

            $_SESSION["outmessage"] = "login=success";
            header("Location: ../Homepage.php?".$_SESSION["outmessage"]);
            exit();
        }

        else {
            $_SESSION["outmessage"] = "error=incorrectentry";

            header("Location: ../Log In.php?".$_SESSION["outmessage"]);
            exit();
        }
        
    }
}

elseif (isset($_POST['login-emp-submit'])) {
    include_once "../Classes/Employee.Class.php";

    session_start();

    $emp_id = $_POST["emp_id"];
    $emp_pwd = $_POST["emp_pwd"];

    if (empty($emp_id) || empty($emp_pwd)) {
        $_SESSION["outmessage"] = "error=emptyfields";

        header("Location: ../Log In.php?".$_SESSION["outmessage"]);
        exit();
    }

    else {
        $objEmp = new Employee();
        $result = $objEmp->getEmployeeInfo($emp_id, $emp_pwd);

        if ($result === 1) {
            $_SESSION["emp_id"] = $objEmp->emp_id;
            $_SESSION["emp_name"] = $objEmp->emp_name;

            $_SESSION["outmessage"] = "login=success";
            header("Location: ../Homepage.php?".$_SESSION["outmessage"]);
            exit();
        }

        else {
            $_SESSION["outmessage"] = "error=incorrectentry";

            header("Location: ../Log In.php?".$_SESSION["outmessage"]);
            exit();
        }
    }
}