<!DOCTYPE html>

<html>

<head>

    <title> Add Film </title>

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

        elseif ($popup === "filmadd=success") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Film Added!</b></p>
                
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

        elseif ($popup === "error=wronguploadformat") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>You can only upload .jpg/.jpeg files</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=uploaderror") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Error uploading files</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }
    }
    
    ?>

    <div class="container-fluid">
        <h1 class="title-bg text-white text-center">ADD FILM</h1>
    </div>

    <br>

    <div class="container">
        
        <div class="bg-white border border-secondary m-2 p-5">
            <form role="form" action="Includes/Add Film.Inc.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Film Title:</strong></label>
                    <div class="col-9">
                        <input type="text" name="film_name" class="form-control" maxlength = "50">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Director:</strong></label>
                    <div class="col-9">
                        <input type="text" name="director" class="form-control" maxlength = "50">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Release Date:</strong></label>
                    <div class="col-9">
                        <input type="date" name="release_date" class="form-control" min="1940-01-01" max="2070-12-31">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>IMDb Link:</strong></label>
                    <div class="col-9">
                        <input type="text" name="imdb" class="form-control" maxlength = "200">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Rotten Tomatoes Link:</strong></label>
                    <div class="col-9">
                        <input type="text" name="rtom" class="form-control" maxlength = "200">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Poster:</strong></label>
                    <div class="col-9">
                        <input type="file" name="poster" class="form-control-file" accept=".jpg, .jpeg">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>IMDb Synopsis:</strong></label>
                    <div class="col-9">
                        <textarea name = "synopsis" cols = "45" rows = "3" class="form-control"> </textarea>
                    </div>
                </div>

                <br>

                <div class="form-group row">
                    <button class="btn btn-block btn-success" type="submit" name="addfilm-submit">Add Film</button>
                </div>
            </form>
        </div>
        
    </div>

    <br><br>

</body>

</html>