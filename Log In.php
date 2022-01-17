<!DOCTYPE html>

<html>

<head>

    <title> Log In - Movie Theatre Ticket Purchasing System </title>

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
        <h1 class="title-bg text-white text-center">LOG IN</h1>
    </div>

    <?php
    
    if (isset($_SESSION['outmessage'])) {
        $popup = $_SESSION['outmessage'];

        if ($popup === "error=incorrectentry") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Incorrect Data Entered. Please Try Again.</b></p>
                
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
    }
    
    ?>

    <br>

    <div class="container">
        <div id="login">
            <!-- CUSTOMER LOG IN -->
            <div class="card">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#customer">Log In As A Customer</a>
                </div>

                <div id="customer" class="collapse" data-parent="#login">
                    <div class="card-body">
                        <div class="form-bg p-5">
                            <form role="form" action="Includes/Log In.Inc.php" method="post">
                                <div class="form-group">
                                    <input type="text" name="cust_idemail" class="form-control" placeholder="Enter User ID Or Email Address">
                                </div>

                                <div class="form-group">
                                    <input type="password" name="cust_pwd" class="form-control" placeholder="Enter Password">
                                </div>

                                <br>

                                <button class="btn btn-block sign-button" type="submit" name="login-cust-submit">Log In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- EMPLOYEE LOG IN -->
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#employee">Log In As An Employee</a>
                </div>

                <div id="employee" class="collapse" data-parent="#login">
                    <div class="card-body">
                        <div class="form-bg p-5">
                            <form role="form" action="Includes/Log In.Inc.php" method="post">
                                <div class="form-group">
                                    <input type="text" name="emp_id" class="form-control" placeholder="Enter Employee ID">
                                </div>

                                <div class="form-group">
                                    <input type="password" name="emp_pwd" class="form-control" placeholder="Enter Password">
                                </div>

                                <br>

                                <button class="btn btn-block sign-button" type="submit" name="login-emp-submit">Log In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>

</body>

</html>