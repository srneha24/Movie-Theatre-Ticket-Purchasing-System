<!DOCTYPE html>

<html>

<head>

    <title> Buy Tickets </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Default Colours.css">

    <style>
        .btn-bg {
            background-color: black;
            color: white;
        }
    </style>

</head>

<body>

    <?php include_once "Navigation Bar.php" ?> <!-- NAVIGATION BAR -->

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
        <h1 class="text-white text-center title-bg">BUY TICKETS</h1>
    </div>

    <br>

    <?php

        if (!isset($_SESSION["cust_name"])) {
            echo '<div class="container">
                <div class="bg-white border border-secondary">
                    <br><br>

                    <div class = "d-flex justify-content-center">
                        <h2><b><i>You Need To Log In To Buy Tickets</i></b></h2>
                    </div>

                    <br><br>

                </div>
                
            </div>';
        }

        else {
            echo '<div class="container">
                <div class="bg-white border border-secondary">
                    <br><br>';

                    if (isset($_SESSION["filmchoice"])) {
                        echo '<div class="d-flex justify-content-center">
                        <form role="form" action="Includes/Buy Tickets.Inc.php" method="post">
                            <div class="form-group row">
                                <label class="col-4 col-form-label"><strong>Select Date:</strong></label>
                                <div class="col-7">
                                    <input type="date" name="showdate" class="form-control" min="2010-01-01" max="2050-12-31" value="'.$_SESSION["date_select"].'">
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-bg text-white" type="submit" name="buydate-submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>';
                    }

                    elseif (isset($_SESSION['showchoice'])) {
                        echo '<div class="d-flex justify-content-center">
                            <form role="form" action="Includes/Buy Tickets.Inc.php" method="post">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label"><strong>Date: </strong></label>
                                    <label class="col-9 col-form-label text-danger"><strong><i>'.date("F j, Y", strtotime($_SESSION["date_select"])).'</i></strong></label>
                                </div>
                            </form>
                        </div>';
                    }

                    else {
                        echo '<div class="d-flex justify-content-center">
                        <form role="form" action="Includes/Buy Tickets.Inc.php" method="post">
                            <div class="form-group row">
                                <label class="col-4 col-form-label"><strong>Select Date:</strong></label>
                                <div class="col-7">
                                    <input type="date" name="showdate" class="form-control" min="2010-01-01" max="2050-12-31">
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-bg" type="submit" name="buydate-submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>';
                    }
                
                
                    if (isset($_SESSION["filmchoice"])) {
                        if ($_SESSION["filmchoice"]) {
                            echo '<br>

                            <div class="d-flex justify-content-center">
                                <form role="form" action="Includes/Buy Tickets.Inc.php" method="post">
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label"><strong>Select Film:</strong></label>
                                        <div class="col-8">
                                            <select class="pl-3 pr-3" name="film-choice">';
                                                for ($i=0; $i < $_SESSION["total_shows"]; $i++) { 
                                                    echo '<option value="'.$_SESSION["film_id_select"][$i].'"> '.$_SESSION["film_name_select"][$i].' </option>';
                                                }
                                            echo '</select>
                                        </div>
                                        <div class="col-1">
                                            <button class="btn btn-bg" type="submit" name="buyfilm-submit">OK</button>
                                        </div>
                                    </div>
                                </form>
                            </div>';

                            unset($_SESSION["total_shows"]);
                        }

                        unset($_SESSION["filmchoice"]);
                    }

                    elseif (isset($_SESSION['showchoice'])) {
                        echo '<div class="d-flex justify-content-center">
                            <form role="form" action="Includes/Buy Tickets.Inc.php" method="post">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label"><strong>Film: </strong></label>
                                    <label class="col-9 col-form-label text-danger"><strong><i>'.$_SESSION["film_name_choice"].'</i></strong></label>
                                </div>
                            </form>
                        </div>';
                    }

                    if (isset($_SESSION['errormessage'])) {
                        $msg = $_SESSION['errormessage'];

                        if ($msg === "error=datepassed") {
                            echo '<div class="bg-white p-3 m-3">
                            <div class="d-flex justify-content-center" style="color: darkblue;">
                                <h3><b><i>Cannot View Passed Showtimes</i></b></h3>
                            </div>
            
                            <br><br>';

                            unset($_SESSION['errormessage']);
                        }

                        elseif ($msg === "error=shownotset") {
                            echo '<div class="bg-white p-3 m-3">
                            <div class="d-flex justify-content-center" style="color: darkblue;">
                                <h3><b><i>Showtimes Have Not Been Set Yet</i></b></h3>
                            </div>
            
                            <br><br>';

                            unset($_SESSION['errormessage']);
                        }
                    }
                
                    
                    if (isset($_SESSION['showchoice'])) {
                        if ($_SESSION['showchoice']) {
                            echo '<br>

                            <div class="d-flex justify-content-center">
                                <form role="form" action="Includes/Seat Arrangement.Inc.php" method="post">
                                    <div class="form-group row">
                                        <label class="col-5 col-form-label"><strong>Select Time:</strong></label>
                                        <div class="col-7">
                                            <select class="pl-3 pr-3" name="time-choice">';
                                                for ($i=0; $i < $_SESSION["total_shows"]; $i++) { 
                                                    echo '<option value="'.$_SESSION["showtime_select"][$i].':00"> '.$_SESSION["showtime_select"][$i].' </option>';
                                                }
                                            echo '</select>
                                        </div>
                                    </div>
                
                                    <div class="form-group row">
                                        <label class="col-5 col-form-label"><strong>Select Class:</strong></label>
                                        <div class="col-7">
                                            <select class="pl-3 pr-3" name="class-choice">
                                                <option value="First"> First - Tk.200 </option>
                                                <option value="Second"> Second - Tk. 350 </option>
                                                <option value="Third"> Third - Tk. 500 </option>
                                            </select>
                                        </div>
                                    </div>
                
                                    <div class="form-group row">
                                        <button class="btn btn-block btn-bg" type="submit" name="seatchoice-submit">Choose Seats</button>
                                    </div>
                                </form>
                            </div>';

                            unset($_SESSION["total_shows"]);
                        }
                        unset($_SESSION['showchoice']);                    
                    }

                    echo '<br><br>

                </div>
                
            </div>';
        }

    ?>

    <br><br>

</body>

</html>