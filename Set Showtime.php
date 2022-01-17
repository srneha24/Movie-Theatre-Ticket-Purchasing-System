<!DOCTYPE html>

<html>

<head>

    <title> Set Showtime </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Default Colours.css">

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

        elseif ($popup === "showset=success") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Shows Set!</b></p>
                
                </div>';

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

        elseif ($popup === "error=datepassed") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Cannot Set Showtimes For Past Dates</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=nodate") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Please Select A Date</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }
    }

    include_once "Classes/Film.Class.php";

    $objFilm = new Film();
    $objFilm->GetFilm();
    
    ?>

    <div class="container-fluid">
        <h1 class="title-bg text-white text-center">SET SHOWTIME</h1>
    </div>

    <br>

    <div class="container">
        
        <div class="bg-white border border-secondary m-2 p-5">
            <form role="form" action="Includes/Set Showtime.Inc.php" method="post">
                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Date:</strong></label>
                    <div class="col-9">
                        <input type="date" name="show_date" class="form-control" min="2000-01-01" max="2070-12-31">
                    </div>
                </div>

                <br><br>
            
                <div class="form-group row">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="show-1">
                        <label class="form-check-label"><strong>SHOW NO. 1</strong></label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Film:</strong></label>
                    <div class="col-9">
                        <select class="pl-3 pr-3" name="film-1">
                            <?php
                            
                                for ($i=0; $i < count($objFilm->all_film_id); $i++) { 
                                    echo '<option value="'.$objFilm->all_film_id[$i].'"> '.$objFilm->all_film_name[$i].' </option>';
                                }
                            
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Time:</strong></label>
                    <div class="col-9">
                        <input type="time" class="form-control" name="showtime-1">
                    </div>
                </div>

                <br><br>

                <div class="form-group row">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="show-2">
                        <label class="form-check-label"><strong>SHOW NO. 2</strong></label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Film:</strong></label>
                    <div class="col-9">
                        <select class="pl-3 pr-3" name="film-2">
                            <?php
                                
                                for ($i=0; $i < count($objFilm->all_film_id); $i++) { 
                                    echo '<option value="'.$objFilm->all_film_id[$i].'"> '.$objFilm->all_film_name[$i].' </option>';
                                }
                            
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Time:</strong></label>
                    <div class="col-9">
                        <input type="time" class="form-control" name="showtime-2">
                    </div>
                </div>

                <br><br>

                <div class="form-group row">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="show-3">
                        <label class="form-check-label"><strong>SHOW NO. 3</strong></label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Film:</strong></label>
                    <div class="col-9">
                        <select class="pl-3 pr-3" name="film-3">
                            <?php
                                
                                for ($i=0; $i < count($objFilm->all_film_id); $i++) { 
                                    echo '<option value="'.$objFilm->all_film_id[$i].'"> '.$objFilm->all_film_name[$i].' </option>';
                                }
                            
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Time:</strong></label>
                    <div class="col-9">
                        <input type="time" class="form-control" name="showtime-3">
                    </div>
                </div>

                <br><br>

                <div class="form-group row">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="show-4">
                        <label class="form-check-label"><strong>SHOW NO. 4</strong></label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Film:</strong></label>
                    <div class="col-9">
                        <select class="pl-3 pr-3" name="film-4">
                            <?php
                                
                                for ($i=0; $i < count($objFilm->all_film_id); $i++) { 
                                    echo '<option value="'.$objFilm->all_film_id[$i].'"> '.$objFilm->all_film_name[$i].' </option>';
                                }
                            
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Time:</strong></label>
                    <div class="col-9">
                        <input type="time" class="form-control" name="showtime-4">
                    </div>
                </div>

                <br>

                <div class="form-group row">
                    <button class="btn btn-block btn-success" type="submit" name="setshow-submit">Set Shows</button>
                </div>
            </form>
        </div>
        
    </div>

    <br><br>

</body>

</html>