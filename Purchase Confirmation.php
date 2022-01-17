<!DOCTYPE html>

<html>

<head>

    <title> Purchase Confirmation </title>

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

        elseif ($popup === "purchase=success") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Ticket Purchase Successful!</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }
    }
    
    ?>

    <div class="container-fluid">
        <h1 class="title-bg text-white text-center">PURCHASE CONFIRMATION</h1>
    </div>

    <br>

    <div class="container">
        
        <div class="bg-white border border-secondary m-2 p-5">
            <form class="form-group" role="form" action="Includes/Purchase Confirmation.Inc.php" method="post">
                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Film:</strong></label>
                    <div class="col-9 text-danger">
                        <i><?php echo $_SESSION["film_name_choice"]; ?></i>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Date:</strong></label>
                    <div class="col-9 text-danger">
                        <i><?php echo date("F j, Y", strtotime($_SESSION["date_select"])); ?></i>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Time:</strong></label>
                    <div class="col-9 text-danger">
                        <i><?php echo substr($_SESSION["time_choice"], 0, 5); ?></i>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Class:</strong></label>
                    <div class="col-9 text-danger">
                        <i><?php echo $_SESSION["class_choice"]; ?></i>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>No. Of Seats:</strong></label>
                    <div class="col-9 text-danger">
                        <i><?php echo count($_SESSION["chosen-seats"]); ?></i>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Seat Numbers:</strong></label>
                    <div class="col-9 text-danger">
                        <i>
                            <?php
                            
                                foreach($_SESSION["chosen-seats"] as $seat) {
                                    echo $seat." ";
                                }
                            
                            ?>
                        </i>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Total:</strong></label>
                    <div class="col-9 text-danger">
                        <i>Tk. <?php echo count($_SESSION["chosen-seats"])*$_SESSION["cost"]; ?></i>
                    </div>
                </div>

                <div class="form-group row">
                    <button class="btn btn-block btn-bg" type="submit" name="purchase-submit">Confirm Purchase</button>
                </div>
            </form>
        </div>
        
    </div>

    <br><br>

</body>

</html>