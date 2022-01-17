<!DOCTYPE html>

<html>

<head>

    <title> Welcome - Movie Theatre Ticket Purchasing System </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Default Colours.css">
    <link rel="stylesheet" href="CSS/Homepage.css">

    <!-- NOW PLAYING FILM INFO TEXTBOX TEXT CHANGE SCRIPT -->
    <script type = "text/javascript">

        <?php
        
            include_once "Classes/Film.Class.php";

            session_start();

            $objFilm = new Film();
            $objFilm->FilmStatus();

            for ($i=0; $i<$objFilm->total_showing; $i++) {
                echo 'function change'.$i.'() {
                    document.getElementById("title").innerHTML = "'.$objFilm->film_name_nowshowing[$i].'";
                    document.getElementById("desc").innerHTML = "'.$objFilm->synopsis_nowshowing[$i].'";
                }';
            }
        
        ?>

    </script>

</head>

<body>

    <?php include_once "Navigation Bar.php" ?> <!-- NAVIGATION BAR -->

    <br>

    <div id="heading">HOME OF CINEMA</div>

    <?php
    
    if (isset($_SESSION['outmessage'])) {
        $popup = $_SESSION['outmessage'];

        if ($popup === "login=success") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Log In Successful!</b></p>
                
                </div>';

            unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=nokeyword") {
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

        <!-- CAROUSEL INDICATORS -->
        <div id="slideshow" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php 
                            
                    $directory = "Images/Banner/";
                    $filecount = 0;
                    $files = glob($directory . "*");
                    if ($files){
                        $filecount = count($files);
                    }

                    $i = 0;

                    while ($i < $filecount) {
                        if ($i === 0) {
                            echo '<li data-target="#slideshow" data-slide-to="0" class="active"></li>';
                        }

                        else {
                            echo '<li data-target="#slideshow" data-slide-to="'. $i .'"></li>';
                        }

                        $i++;
                    }
                
                ?>
            </ol>

            <!-- THE SLIDE -->
            <div class="carousel-inner" role="listbox">
                <?php
                    $i = 1;

                    while ($i <= $filecount) {
                        if ($i === 1) {
                            echo '<div class="carousel-item active">
                                <img src="'. $directory .'Banner 1.jpg" width="100%" height="450">
                            </div>';
                        }

                        else {
                            echo '<div class="carousel-item">
                                <img src="'. $directory .'Banner '. $i .'.jpg" width="100%" height="450">
                            </div>';
                        }

                        $i++;
                    }
                
                ?>
            </div>

            <!-- LEFT AND RIGHT CONTROLS -->
            <a class="carousel-control-prev bg-dark" href="#slideshow" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next bg-dark" href="#slideshow" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

    </div>

    <br>

    <div class="container">
    
        <div id="now-playing">
        
            <h1> NOW SHOWING </h1>
        
        </div>
    
    </div>

    <br>

    <!-- NOW PLAYING IMAGES -->
    <div class="container">
    
        <div class="row p-5" style="background-color: black;">
            
            <div class="preview col-10">
            
                <?php echo '<img name="preview" src="Images/Posters/'.$objFilm->film_id_nowshowing[0].'.jpg">'; ?>
                <br><br>
                <div id="imdb-desc" class="p-2">
                    <h3 id="title"><?php echo $objFilm->film_name_nowshowing[0]; ?></h3>
                    <blockquote class = "blockquote">
	
                        <p id="desc">
                        
                            <?php echo $objFilm->synopsis_nowshowing[0]; ?>
                        
                        </p>
                        
                        <footer class = "blockquote-footer"> IMDb.com </footer>
                    
                    </blockquote>
                </div>
            
            </div>

            <div class="thumbnails col-2">
            
            <?php 
            
                for ($i=0; $i<$objFilm->total_showing; $i++) {
                    echo '<img onmouseover="preview.src = img'.$i.'.src; change'.$i.'();" name="img'.$i.'" src="Images/Posters/'.$objFilm->film_id_nowshowing[$i].'.jpg">';

                    if ($i < ($objFilm->total_showing - 1)) {
                        echo '<br>';
                    }
                }
            
            ?>
            
            </div>
        
        </div>    
    
    </div>

    <br> <br>

</body>

</html>