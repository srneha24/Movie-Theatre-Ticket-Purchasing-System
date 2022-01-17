<!DOCTYPE html>

<html>

<head>

    <title> Sign Up - Movie Theatre Ticket Purchasing System </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Default Colours.css">
    <link rel="stylesheet" href="CSS/Sign.css">

</head>

<body>

    <?php include_once "Navigation Bar.php" ?>

    <br><br><br><br><br><br><br><br>

    <?php
    
    if (isset($_SESSION['outmessage'])) {
        $popup = $_SESSION['outmessage'];

        if ($popup === "error=nokeyword") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>No Keyword Entered</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }
    }
    
    ?>

    <div class="container-fluid">
        <h1 class="title-bg text-white text-center">SIGN UP</h1>
    </div>

    <?php
    
    if (isset($_SESSION['outmessage'])) {
        $popup = $_SESSION['outmessage'];

        if ($popup === "error=PasswordMismatch") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Passwords Do Not Match</b></p>
                
                </div>';

            unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=Email/Phone-Exists") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Phone/Email Address Already Exists</b></p>
                
                </div>';

            unset($_SESSION['outmessage']);

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=emptyfields") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Necessary Fields Empty!</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=InvalidID") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Employee ID Does Not Exist!</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "custsignup=success") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Sign Up Successful. Your User ID is '. $_SESSION["new_cust_id"] .'</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "empsignup=success") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Sign Up Successful!</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=RegComplete") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Employee Registration Previously Completed</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }
    }
    
    ?>

    <br>

    <div class="container">
        <div id="signup">
            <!-- CUSTOMER SIGN UP -->
            <div class="card">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#customer">Sign Up As A Customer</a>
                </div>

                <div id="customer" class="collapse" data-parent="#signup">
                    <div class="card-body">
                        <div class="form-bg p-5 center">
                            <form role="form" action="Includes/Sign Up.Inc.php" method="post">
                                <div class="form-group row">
                                    <label class="col-5 col-form-label"><strong class="text-white">Name:</strong></label>
                                    <div class="col-7">
                                        <input type="text" name="cust_name" class="form-control" maxlength = "50">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-5 col-form-label"><strong class="text-white">Phone Number:</strong></label>
                                    <div class="col-7">
                                        <input type="tel" name="cust_phone" class="form-control" pattern="[0-9]{11}" placeholder="01---------">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-5 col-form-label"><strong class="text-white">Email Adresss:</strong></label>
                                    <div class="col-7">
                                        <input type="email" name="cust_email" class="form-control" placeholder="example@email.com">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-5 col-form-label"><strong class="text-white">Password:</strong></label>
                                    <div class="col-7">
                                        <input type="password" name="cust_pwd" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-5 col-form-label"><strong class="text-white">Confirm Password:</strong></label>
                                    <div class="col-7">
                                        <input type="password" name="cust_conpwd" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-5 col-form-label"><strong class="text-white">Card No. :</strong></label>
                                    <div class="col-7">
                                        <input type="text" name="card_no" class="form-control" maxlength = "20">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-5 col-form-label"><strong class="text-white">Expiration Date:</strong></label>
                                    <div class="col-7">
                                        <input type="date" name="exp_date" class="form-control" min="1997-01-01" max="2030-12-31">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-5 col-form-label"><strong class="text-white">CVC No. :</strong></label>
                                    <div class="col-7">
                                        <input type="text" name="cvc_no" class="form-control" maxlength = "4">
                                    </div>
                                </div>

                                <br>

                                <button class="btn btn-block sign-button" type="submit" name="signup-cust-submit">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- EMPLOYEE SIGN UP -->
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#employee">Sign Up As An Employee</a>
                </div>

                <div id="employee" class="collapse" data-parent="#signup">
                    <div class="card-body">
                        <div class="form-bg p-5 center">
                            <form role="form" action="Includes/Sign Up.Inc.php" method="post">
                                <div class="form-group row">
                                    <label class="col-5 col-form-label"><strong class="text-white">Employee ID:</strong></label>
                                    <div class="col-7">
                                        <input type="text" name="emp_id" class="form-control" maxlength = "50">
                                    </div>
                                </div>    

                                <div class="form-group row">
                                    <label class="col-5 col-form-label"><strong class="text-white">Name:</strong></label>
                                    <div class="col-7">
                                        <input type="text" name="emp_name" class="form-control" maxlength = "50">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-5 col-form-label"><strong class="text-white">Password:</strong></label>
                                    <div class="col-7">
                                        <input type="password" name="emp_pwd" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-5 col-form-label"><strong class="text-white">Confirm Password:</strong></label>
                                    <div class="col-7">
                                        <input type="password" name="emp_conpwd" class="form-control">
                                    </div>
                                </div>

                                <br>

                                <button class="btn btn-block sign-button" type="submit" name="signup-emp-submit">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>

</body>

</html>