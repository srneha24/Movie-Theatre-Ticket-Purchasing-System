<!DOCTYPE html>

<html>

<head>

    <title> Generate ID </title>

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

        elseif ($popup === "bannerchange=success") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Slideshow Changed!</b></p>
                
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
        <div class="d-flex justify-content-center bg-dark p-3">
            <form role="form" action="Includes/Admin Tasks.Inc.php" method="post">
                <button class="btn btn-light" type="submit" name="newempid-submit">
                    <h1>Generate New Employee ID</h1>
                </button>
            </form>            
        </div>

        <?php
        
            if (isset($_SESSION["new_emp_id"]) && !empty($_SESSION["new_emp_id"])) {
                echo '<div class="d-flex justify-content-center bg-dark p-3 text-white">
                    <h3><i>'.$_SESSION["new_emp_id"].'</i></h3>
                </div>';

                $_SESSION["new_emp_id"] = "";
            }
        
        ?>
    </div>

    <br><br>

    <div class="container">
        <div class="d-flex justify-content-center bg-primary p-3">
            <form role="form" action="Includes/Admin Tasks.Inc.php" method="post"  enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-4 col-form-label"><strong>Change Homepage Slideshow</strong></label>
                    <div class="col-5">
                        <input type="file" name="banner[]" class="form-control-file" multiple="multiple" accept=".jpg, .jpeg">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-dark text-white" type="submit" name="newslideshow-submit">Confirm</button>
                    </div>
                </div>
            </form>            
        </div>
    </div>

    <br><br>

</body>

</html>