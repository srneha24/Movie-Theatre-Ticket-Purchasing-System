<!DOCTYPE html>

<html>

<head>

    <title> Showtime </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Default Colours.css">

    <style>
        #set-show {
            background-color: white;
            color: black;
            border: 5px solid black;
            width: 100%;
            height: 50px;
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
        <h1 class="title-bg text-white text-center">SHOWTIME</h1>
    </div>

    <br>

    <?php
    
        if (isset($_SESSION["emp_name"])) {
            echo '<div class="container d-flex justify-content-center">
                <div id="set-show" class="d-flex justify-content-center text-center">
                    <a class="mt-2" href="Set Showtime.php">
                        <b>SET SHOWTIMES</b>
                    </a>
                </div>
            </div>';
        }
    
    ?>

    <br>

    <div class="container">
        <div class="bg-white border border-secondary">
            <div class="d-flex justify-content-center m-2 p-4">
                <form role="form" action="Includes/Showtime.Inc.php" method="post">
                    <div class="form-group row">
                        <label class="col-4 col-form-label"><strong>Select Date:</strong></label>
                        <div class="col-7">
                            <input type="date" name="showdate" class="form-control" min="2010-01-01" max="2050-12-31">
                        </div>
                        <div class="col-1">
                            <button class="btn btn-info" type="submit" name="showdate-submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <?php
            
                if (isset($_SESSION["total_shows"])) {
                    if ($_SESSION["total_shows"] != 0) {
                        $date_format = date("F j, Y", strtotime($_SESSION["date_search"]));
                    
                        echo '<div class="bg-white p-3 m-3">
                        <div class="d-flex justify-content-center" style="color: darkblue;">
                            <h3><b><i>'.$date_format.'</i></b></h3>
                        </div>
        
                        <br><br>';

                        for ($i=0; $i < count($_SESSION["showtime"]); $i++) { 
                            echo '<div class="row">
                                <label class="col-5"><strong>'.$_SESSION["showtime"][$i][1].'</strong></label>
                                <div class="col-7">';
                                for ($j=2; $j < count($_SESSION["showtime"][$i]); $j++) { 
                                    echo '<b class="bg-danger text-white p-1">'.$_SESSION["showtime"][$i][$j].'</b> &emsp;';
                                }
                                echo '</div>
                            </div>            
                            <br>';
                        }
                    }

                    unset($_SESSION["total_shows"]);
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
            
            ?>
        </div>
    </div>

    <br><br>

</body>

</html>