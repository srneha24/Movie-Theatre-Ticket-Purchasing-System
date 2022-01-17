<!DOCTYPE html>

<html>

<head>

    <title>
        <?php
        
            session_start();
            echo $_SESSION["film_name_selected"];

        ?>
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Default Colours.css">

    <style>
        .border-thickness {
            border-width:3px !important;
        }

        .title {
            font-family: Algerian;
            background-color: #30146E;
            text-shadow: 5px 5px black;
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

    <?php
    
        echo '<div class="container-fluid">
            <h2 class="text-center title">'.strtoupper($_SESSION["film_name_selected"]).'</h2>
        </div>

        <br>

        <div class="container">
            <div class="border border-secondary border-thickness" style="background-image: linear-gradient(#101E4A, #59146E);">
                <div class="d-flex justify-content-center m-2 p-4">
                    <div class="border border-white rounded border-thickness">
                        <img src="Images/Posters/'.$_SESSION["film_id_selected"].'.jpg" width="300" height="450" alt="'.$_SESSION["film_name_selected"].'">
                    </div>
                </div>

                <div class="bg-white p-3 m-3">
                    <p>
                        <h4><b>Directed By: </b> <i>'.$_SESSION["director_selected"].'</i></h4>

                        <b>Synopsis: </b> <br>
                        <i>'.$_SESSION["synopsis_selected"].'</i> <br> <br>

                        <b>Release Date: &emsp; </b> <i>'.$_SESSION["release_date_selected"].'</i> <br> <br>

                        <u>Links: </u> &emsp; <a href="'.$_SESSION["imdb_selected"].'" target="_blank">IMDb</a>
                        &emsp; <a href="'.$_SESSION["rtom_selected"].'" target="_blank">Rotten Tomatoes</a>
                    </p>
                </div>
                <br>
            </div>
        </div>';
    
    ?>

    <br><br>

</body>

</html>