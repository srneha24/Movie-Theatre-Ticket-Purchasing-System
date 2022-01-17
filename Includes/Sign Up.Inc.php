<?php

if (isset($_POST['signup-cust-submit'])) {

    include_once "../Classes/Customer.Class.php";

    session_start();

    $cust_name = $_POST["cust_name"];
    $cust_phone = $_POST["cust_phone"];
    $cust_email = $_POST["cust_email"];
    $cust_pwd = $_POST["cust_pwd"];
    $cust_conpwd = $_POST["cust_conpwd"];
    $card_no = $_POST["card_no"];
    $exp_date = $_POST["exp_date"];
    $cvc_no = $_POST["cvc_no"];

    if (empty($cust_name) || empty($cust_phone) || empty($cust_email) || empty($cust_pwd) || empty($cust_conpwd) || empty($card_no) || empty($exp_date) || empty($cvc_no)) {
        $_SESSION["outmessage"] = "error=emptyfields";

        header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);
        exit();
    }

    elseif ($cust_pwd !== $cust_conpwd) { 
        $_SESSION["outmessage"] = "error=PasswordMismatch";

        header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);
        exit();
    }

    else {        
        $objCust = new Customer();
        $checkPhoneEmail = $objCust->checkPhoneEmail($cust_phone, $cust_email);

        if ($checkPhoneEmail === 0) {
            $_SESSION["outmessage"] = "error=Email/Phone-Exists";
            
            header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);

            exit();
        }

        else {
            $_SESSION["new_cust_id"] = $objCust->setCustomerInfo($cust_name, $cust_phone, $cust_email, $cust_pwd, $card_no, $exp_date, $cvc_no);

            $_SESSION["outmessage"] = "custsignup=success";
            header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);
            
            exit();
        }
    }
}

elseif (isset($_POST['signup-emp-submit'])) {

    include_once "../Classes/Employee.Class.php";

    session_start();

    $emp_id = $_POST["emp_id"];
    $emp_name = $_POST["emp_name"];
    $emp_pwd = $_POST["emp_pwd"];
    $emp_conpwd = $_POST["emp_conpwd"];

    if (empty($emp_id) || empty($emp_name) || empty($emp_pwd)) {
        $_SESSION["outmessage"] = "error=emptyfields";

        header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);
        exit();
    }

    elseif ($emp_pwd !== $emp_conpwd) { 
        $_SESSION["outmessage"] = "error=PasswordMismatch";

        header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);
        exit();
    }

    else {        
        $objEmp = new Employee();
        $checkID = $objEmp->checkID($emp_id);

        if ($checkID === 0) {
            $_SESSION["outmessage"] = "error=InvalidID";
            
            header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);

            exit();
        }

        else {
            $checkInfoStatus = $objEmp->checkInfoStatus($emp_id);

            if ($checkInfoStatus == 1) {
                $_SESSION["outmessage"] = "error=RegComplete";
            
                header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);

                exit();
            }

            else {
                $objEmp->setEmployeeInfo($emp_name, $emp_pwd, $emp_id);

                $_SESSION["outmessage"] = "empsignup=success";
                header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);
                
                exit();
            }
        }
    }
}

else {
    header("Location: ../Sign Up.php");
    exit();
}