<!DOCTYPE html>

<html>

<head>

    <title> My Tickets </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Default Colours.css">

    <style>
        .tix-bg {
            background-color: black;
        }
    </style>

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
        <h1 class="title-bg text-white text-center">MY TICKETS</h1>
    </div>

    <br>

    <div class="container">
        <?php

        if (isset($_SESSION["status"])) {
            if ($_SESSION["status"] === "tickets=notfound") {
                echo '<div class="container">
                        <div class="bg-white border border-secondary">
                            <br><br>

                            <div class = "d-flex justify-content-center">
                                <h2><b><i>You Have Not Purchased Any Tickets</i></b></h2>
                            </div>

                            <br><br>

                        </div>
                        
                    </div>';
            } 
            
            else {
                include_once "Classes/Ticket.Class.php";

                echo '<div id="tix">
                    <!-- TICKETS -->';
                    for ($i = 0; $i < count($_SESSION["cust_show_date"]); $i++) {
                        echo '<div class="card"><!-- LOOP START -->
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#tix-no' . $i . '">
                                    ' . date("F j, Y", strtotime($_SESSION["cust_show_date"][$i])) . ' &emsp; - &emsp; ' . $_SESSION["cust_film_name"][$i] . ' &emsp; - &emsp; ' . substr($_SESSION["cust_showtime"][$i], 0, 5) . '
                                </a>
                            </div>
            
                            <div id="tix-no' . $i . '" class="collapse" data-parent="#tix">
                                <div class="card-body">';
                                    
                                    $objTicket = new Ticket();
                                    $objTicket->CustomerTickets($_SESSION["cust_id"], $_SESSION["cust_show_date"][$i], $_SESSION["cust_film_name"][$i], $_SESSION["cust_showtime"][$i]);

                                    for ($j=0; $j < count($objTicket->cust_ticket_no); $j++) { 
                                        echo '<div class="tix-bg p-5 text-white"><!-- LOOP START -->
                                            <b>TICKET NO. :</b> &emsp; <i>'.$objTicket->cust_ticket_no[$j].'</i> <br> <br>
                                            <b>DATE :</b> &emsp; <i>' . date("F j, Y", strtotime($_SESSION["cust_show_date"][$i])) . '</i> &emsp;&emsp; <b>SHOWTIME :</b> &emsp; <i>' . substr($_SESSION["cust_showtime"][$i], 0, 5) . '</i> <br> <br>
                                            <b>FILM :</b> &emsp; <i>' . $_SESSION["cust_film_name"][$i] . '</i> <br> <br>
                                            <b>SEAT NO. :</b> &emsp; <i>'.$objTicket->cust_seat_no[$j].'</i> &emsp;&emsp; <b>CLASS :</b> &emsp; <i>'.$objTicket->cust_class[$j].'</i> &emsp;&emsp; <b>PRICE :</b> &emsp; <i>Tk. '.$objTicket->cust_cost[$j].'</i>
                                        </div>
                                        <br><!-- LOOP END -->';
                                    }
                                echo '</div>
                            </div>
                        </div><!-- LOOP END -->';
                    }
                echo '</div>';
            }
        }

        ?>
    </div>

</body>

</html>