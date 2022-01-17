<!DOCTYPE html>

<html>

<head>

    <title> Choose Seat </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Default Colours.css">

    <style>
        .seat-icon {
            font-size: medium;
        }

        .seat-no {
            font-size: x-small;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            font-size: 11px;
        }

        .btn-bg {
            background-color: darkblue;
            color: white;
            border-color: white;
            border-width: 5px 5px 5px 5px;
        }
    </style>

</head>

<body>

    <?php include_once "Navigation Bar.php" ?>
    <!-- NAVIGATION BAR -->

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

        elseif ($popup === "error=toomanyseats") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>You Cannot Select More Than 10 Seats</b></p>
                
                </div>';

            unset($_SESSION['outmessage']);
        }
    }

    ?>

    <div class="container-fluid title-bg text-white">
        <h2 class="text-center"><?php echo $_SESSION["film_name_choice"]; ?></h2> <br>
        <p class="text-center">
            DATE: <?php echo date("F j, Y", strtotime($_SESSION["date_select"])); ?> &emsp; TIME: <?php echo substr($_SESSION["time_choice"], 0, 5); ?> &emsp; CLASS: <?php echo $_SESSION["class_choice"]; ?>
        </p>
    </div>

    <br>

    <div class="container-fluid">
        <form class="form-group" role="form" action="Includes/Seat Arrangement.Inc.php" method="post">
            <!-- ROW A-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("A0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="A0'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">A0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="A0'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">A0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="A0'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">A0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                
                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("A0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="A0'.$i.'" checked disabled>
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">A0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="A0'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">A0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="A0'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">A0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("A".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="A'.$i.'" checked disabled>
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">A'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="A'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">A'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="A'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">A'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>


                <div class="form-inline col-lg-3 justify-content-center">
                <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("A".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="A'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">A'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="A'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">A'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="A'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">A'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW B-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                    
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("B0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="B0'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">B0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="B0'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">B0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="B0'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">B0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                
                    ?>                    
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("B0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="B0'.$i.'" checked disabled>
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">B0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="B0'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">B0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="B0'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">B0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("B".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="B'.$i.'" checked disabled>
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">B'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="B'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">B'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="B'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">B'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("B".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="B'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">B'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="B'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">B'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="B'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">B'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW C-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                    
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("C0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="C0'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">C0'.$i.'</i>
                                    </label>
                                </div>';
                                }
    
                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="C0'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">C0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="C0'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">C0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("C0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="C0'.$i.'" checked disabled>
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">C0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="C0'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">C0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="C0'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">C0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("C".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="C'.$i.'" checked disabled>
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">C'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="C'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">C'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="C'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">C'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("C".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="C'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">C'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="C'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">C'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="C'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">C'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW D-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("D0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="D0'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">D0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="D0'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">D0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="D0'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">D0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("D0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="D0'.$i.'" checked disabled>
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">D0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="D0'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">D0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="D0'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">D0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("D".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="D'.$i.'" checked disabled>
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">D'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="D'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">D'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="D'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">D'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("D".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="D'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">D'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="D'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">D'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="D'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">D'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW E-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("E0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="E0'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">E0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="E0'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">E0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="E0'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">E0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("E0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="E0'.$i.'">
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">E0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="E0'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">E0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="E0'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">E0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("E".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="E'.$i.'">
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">E'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="E'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">E'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="E'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">E'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("E".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="E'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">E'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="E'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">E'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="E'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">E'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>


            <!-- ROW F-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("F0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="F0'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">F0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="F0'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">F0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="F0'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">F0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("F0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="F0'.$i.'" checked disabled>
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">F0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="F0'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">F0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="F0'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">F0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("F".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="F'.$i.'" checked disabled>
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">F'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="F'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">F'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="F'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">F'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("F".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="F'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">F'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="F'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">F'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="F'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">F'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW G-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("G0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="G0'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">G0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="G0'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">G0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="G0'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">G0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("G0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="G0'.$i.'" checked disabled>
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">G0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="G0'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">G0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="G0'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">G0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("G".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="G'.$i.'" checked disabled>
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">G'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="G'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">G'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="G'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">G'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("G".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="G'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">G'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="G'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">G'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="G'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">G'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW H-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                    
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("H0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="H0'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">H0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="H0'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">H0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="H0'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">H0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }

                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("H0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="H0'.$i.'" checked disabled>
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">H0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="H0'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">H0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="H0'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">H0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("H".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="H'.$i.'" checked disabled>
                                            <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">H'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="H'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">H'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="H'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">H'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("H".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="H'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">H'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="H'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">H'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="H'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">H'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW I-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("I0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="I0'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">I0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="I0'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">I0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="I0'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">I0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }

                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("I0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="I0'.$i.'" checked disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">I0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="I0'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">I0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="I0'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">I0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("I".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="I'.$i.'" checked disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">I'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="I'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">I'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="I'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">I'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("I".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="I'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">I'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="I'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">I'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="I'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">I'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW J-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("J0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="J0'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">J0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="J0'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">J0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="J0'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">J0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }

                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("J0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="J0'.$i.'" checked disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">J0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="J0'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">J0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="J0'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">J0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("J".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="J'.$i.'" checked disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">J'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'First') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="J'.$i.'" disabled>
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">J'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="J'.$i.'">
                                                    <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">J'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("J".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="J'.$i.'" checked disabled>
                                        <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">J'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'First') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="J'.$i.'" disabled>
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">J'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="J'.$i.'">
                                                <span class="material-icons text-info seat-icon">chair</span><i class="seat-no text-white">J'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW K-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("K0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="K0'.$i.'" checked disabled>
                                        <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">K0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Second') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="K0'.$i.'" disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">K0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="K0'.$i.'">
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">K0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }

                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("K0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="K0'.$i.'" checked disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">K0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Second') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="K0'.$i.'" disabled>
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">K0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="K0'.$i.'">
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">K0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("K".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="K'.$i.'" checked disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">K'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Second') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="K'.$i.'" disabled>
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">K'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="K'.$i.'">
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">K'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("K".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="K'.$i.'" checked disabled>
                                        <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">K'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Second') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="K'.$i.'" disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">K'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="K'.$i.'">
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">K'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW L-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("L0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="L0'.$i.'" checked disabled>
                                        <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">L0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Second') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="L0'.$i.'" disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">L0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="L0'.$i.'">
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">L0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }

                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("L0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="L0'.$i.'" checked disabled>
                                            <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">L0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Second') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="L0'.$i.'" disabled>
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">L0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="L0'.$i.'">
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">L0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("L".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="L'.$i.'" checked disabled>
                                            <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">L'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Second') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="L'.$i.'" disabled>
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">L'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="L'.$i.'">
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">L'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("L".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="L'.$i.'" checked disabled>
                                        <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">L'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Second') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="L'.$i.'" disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">L'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="L'.$i.'">
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">L'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW M-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("M0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="M0'.$i.'" checked disabled>
                                        <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">M0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Second') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="M0'.$i.'" disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">M0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="M0'.$i.'">
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">M0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }

                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("M0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="M0'.$i.'" checked disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">M0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Second') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="M0'.$i.'" disabled>
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">M0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="M0'.$i.'">
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">M0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("M".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="M'.$i.'" checked disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">M'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Second') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="M'.$i.'" disabled>
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">M'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="M'.$i.'">
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">M'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("M".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="M'.$i.'" checked disabled>
                                        <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">M'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Second') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="M'.$i.'" disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">M'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="M'.$i.'">
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">M'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW N-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("N0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="N0'.$i.'" checked disabled>
                                        <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">N0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Second') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="N0'.$i.'" disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">N0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="N0'.$i.'">
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">N0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }

                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("N0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="N0'.$i.'" checked disabled>
                                            <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">N0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Second') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="N0'.$i.'" disabled>
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">N0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="N0'.$i.'">
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">N0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("N".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="N'.$i.'" checked disabled>
                                            <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">N'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Second') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="N'.$i.'" disabled>
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">N'.$i.'</i>
                                                </label>
                                            </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="N'.$i.'">
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">N'.$i.'</i>
                                                </label>
                                            </div>';
                                    }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("N".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="N'.$i.'" checked disabled>
                                        <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">N'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Second') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="N'.$i.'" disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">N'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="N'.$i.'">
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">N'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>


            <!-- ROW O-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("O0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="O0'.$i.'" checked disabled>
                                        <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">O0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Second') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="O0'.$i.'" disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">O0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="O0'.$i.'">
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">O0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }

                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("O0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="O0'.$i.'" checked disabled>
                                            <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">O0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Second') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="O0'.$i.'" disabled>
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">O0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="O0'.$i.'">
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">O0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("O".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="O'.$i.'" checked disabled>
                                            <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">O'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Second') {
                                             echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="O'.$i.'" disabled>
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">O'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                             echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="O'.$i.'">
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">O'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                       
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("O".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="O'.$i.'" checked disabled>
                                        <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">O'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Second') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="O'.$i.'" disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">O'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="O'.$i.'">
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">O'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW P-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("P0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="P0'.$i.'" checked disabled>
                                        <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">P0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Second') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="P0'.$i.'" disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">P0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="P0'.$i.'">
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">P0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }

                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("P0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="P0'.$i.'" checked disabled>
                                            <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">P0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Second') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="P0'.$i.'" disabled>
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">P0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="P0'.$i.'">
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">P0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("P".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="P'.$i.'" checked disabled>
                                            <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">P'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Second') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="P'.$i.'" disabled>
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">P'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="P'.$i.'">
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">P'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("P".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="P'.$i.'" checked disabled>
                                        <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">P'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Second') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="P'.$i.'" disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">P'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="P'.$i.'">
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">P'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW Q-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("Q0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="Q0'.$i.'" checked disabled>
                                        <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">Q0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Second') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="Q0'.$i.'" disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">Q0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="Q0'.$i.'">
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">Q0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }

                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("Q0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="Q0'.$i.'" checked disabled>
                                            <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">Q0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Second') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="Q0'.$i.'" disabled>
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">Q0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="Q0'.$i.'">
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">Q0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("Q".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="Q'.$i.'" checked disabled>
                                            <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">Q'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Second') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="Q'.$i.'" disabled>
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">Q'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="Q'.$i.'">
                                                    <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">Q'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("Q".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="Q'.$i.'" checked disabled>
                                        <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">Q'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Second') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="Q'.$i.'" disabled>
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">Q'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="Q'.$i.'">
                                                <span class="material-icons text-warning seat-icon">chair</span><i class="seat-no text-white">Q'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW R-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("R0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="R0'.$i.'" checked disabled>
                                        <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">R0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Third') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="R0'.$i.'" disabled>
                                                <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">R0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="R0'.$i.'">
                                                <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">R0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }

                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("R0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="R0'.$i.'" checked disabled>
                                            <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">R0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Third') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="R0'.$i.'" disabled>
                                                    <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">R0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="R0'.$i.'">
                                                    <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">R0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("R".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="R'.$i.'" checked disabled>
                                            <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">R'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Third') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="R'.$i.'" disabled>
                                                    <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">R'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="R'.$i.'">
                                                    <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">R'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("R".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="R'.$i.'" checked disabled>
                                        <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">R'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Third') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="R'.$i.'" disabled>
                                                <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">R'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="R'.$i.'">
                                                <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">R'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW S-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("S0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="S0'.$i.'" checked disabled>
                                        <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">S0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Third') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="S0'.$i.'" disabled>
                                                <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">S0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="S0'.$i.'">
                                                <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">S0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }

                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("S0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="S0'.$i.'" checked disabled>
                                            <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">S0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Third') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="S0'.$i.'" disabled>
                                                    <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">S0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="S0'.$i.'">
                                                    <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">S0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("S".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="S'.$i.'" checked disabled>
                                            <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">S'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Third') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="S'.$i.'" disabled>
                                                    <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">S'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="S'.$i.'">
                                                    <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">S'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("S".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="S'.$i.'" checked disabled>
                                        <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">S'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Third') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="S'.$i.'" disabled>
                                                <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">S'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="S'.$i.'">
                                                <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">S'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <span class="m-3"></span>

            <!-- ROW T-->
            <div class="form-row">
                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=1; $i<=6; $i++) {
                                if (in_array("T0".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="T0'.$i.'" checked disabled>
                                        <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">T0'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Third') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="T0'.$i.'" disabled>
                                                <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">T0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="T0'.$i.'">
                                                <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">T0'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }

                    ?>
                </div>

                <div class="form-inline col-lg-6 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=7; $i<=14; $i++) {
                                if($i < 10) {
                                    if (in_array("T0".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="T0'.$i.'" checked disabled>
                                            <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">T0'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Third') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="T0'.$i.'" disabled>
                                                    <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">T0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="T0'.$i.'">
                                                    <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">T0'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }

                                else {
                                    if (in_array("T".$i, $_SESSION["blocked_seats"])) {
                                        echo '<div class="form-check pr-2">
                                        <label class="form-check-label bg-dark">
                                            <input type="checkbox" class="form-check-input" name="seat[]" value="T'.$i.'" checked disabled>
                                            <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">T'.$i.'</i>
                                        </label>
                                    </div>';
                                    }
    
                                    else {
                                        if ($_SESSION["class_choice"] !== 'Third') {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="T'.$i.'" disabled>
                                                    <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">T'.$i.'</i>
                                                </label>
                                            </div>';
                                        }   
                                        else {
                                            echo '<div class="form-check pr-2">
                                                <label class="form-check-label bg-dark">
                                                    <input type="checkbox" class="form-check-input" name="seat[]" value="T'.$i.'">
                                                    <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">T'.$i.'</i>
                                                </label>
                                            </div>';
                                        }
                                        
                                    }
                                }
                            }
                        }
                    
                    ?>
                </div>

                <div class="form-inline col-lg-3 justify-content-center">
                    <?php
                        
                        if (isset($_SESSION["blocked_seats"])) {
                            for($i=15; $i<=20; $i++) {
                                if (in_array("T".$i, $_SESSION["blocked_seats"])) {
                                    echo '<div class="form-check pr-2">
                                    <label class="form-check-label bg-dark">
                                        <input type="checkbox" class="form-check-input" name="seat[]" value="T'.$i.'" checked disabled>
                                        <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">T'.$i.'</i>
                                    </label>
                                </div>';
                                }

                                else {
                                    if ($_SESSION["class_choice"] !== 'Third') {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="T'.$i.'" disabled>
                                                <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">T'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    else {
                                        echo '<div class="form-check pr-2">
                                            <label class="form-check-label bg-dark">
                                                <input type="checkbox" class="form-check-input" name="seat[]" value="T'.$i.'">
                                                <span class="material-icons text-success seat-icon">chair</span><i class="seat-no text-white">T'.$i.'</i>
                                            </label>
                                        </div>';
                                    }
                                    
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

            <br>

            <button class="btn btn-block btn-bg" type="submit" name="seatschosen-submit">Done</button>

        </form>
    </div>

</body>

</html>