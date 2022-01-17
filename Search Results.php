<!DOCTYPE html>

<html>

<head>

    <title> Search Results </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Default Colours.css">

    <style>

        .result {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: red;
        }

    </style>

    <script type = "text/javascript">

        $(document).ready(function(){
            
            $(".result").on({
            
                mouseenter: function(){
                
                    $(this).css("text-decoration", "underline");
                    $(this).css("color", "blue");
                
                },
                
                mouseleave: function(){
                
                    $(this).css("text-decoration", "none");
                    $(this).css("color", "red");
                
                }
            
            });

        });

    </script>

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
        <h1 class="title-bg text-white text-center">SEARCH RESULTS</h1>
    </div>

    <br>

    <div class="container">
        <div class="bg-white">
            <div class="m-2 p-4">
                <div>
                    <?php
                    
                    if ($_SESSION["total_results"] == 0) {
                        echo '<h2>No Results</h2>';
                    }

                    else {
                        for($i=0; $i<$_SESSION["total_results"]; $i++) {
                            echo '<form role="form" action="Includes/Film Details.Inc.php" method="post">
                                <button class="btn btn-outline-light" type="submit" name="filmsearch-submit" value="'.$_SESSION["film_id_search"][$i].'">
                                    <h4 class="result"><i>'.$_SESSION["film_name_search"][$i].'</i></h4>                    
                                </button>
                            </form>';
                        }                   
                        
                    }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>

    <br><br>

</body>

</html>