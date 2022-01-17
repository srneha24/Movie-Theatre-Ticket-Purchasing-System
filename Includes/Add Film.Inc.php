<?php

if (isset($_POST['addfilm-submit'])) {
    include_once "../Classes/Film.Class.php";

    session_start();

    $new_film_name = $_POST["film_name"];
    $new_director = $_POST["director"];
    $new_release_date = $_POST["release_date"];
    $new_imdb = $_POST["imdb"];
    $new_rtom = $_POST["rtom"];
    $new_synopsis = $_POST["synopsis"];

    if (empty($new_film_name) || empty($new_director) || empty($new_release_date) || empty($new_imdb) || empty($new_rtom) || empty($new_synopsis)) {
        $_SESSION["outmessage"] = "error=emptyfields";

        header("Location: ../Add Film.php?".$_SESSION["outmessage"]);
        exit();
    }

    else {
        $objFilm = new Film();
        $objFilm->AddFilm($new_film_name, $new_director, $new_release_date, $new_imdb, $new_synopsis, $new_rtom);
        $new_film_id = $objFilm->new_film_id;

        $dir = "../Images/Posters";

        $files = $_FILES['poster'];

        $exts = array('jpg', 'jpeg');

        $fileName = $files['name'];
        $fileTmpName = $files['tmp_name'];
        $fileSize = $files['size'];
        $fileError = $files['error'];
        $fileType = $files['type'];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        if (in_array($fileActualExt, $exts)) {
            if ($fileError === 0) {
                $fileNameNew = $new_film_id.".".$fileActualExt;

                $fileDestination = $dir."/".$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);                        

                $_SESSION["outmessage"] = "filmadd=success";
                header("Location: ../Add Film.php?".$_SESSION["outmessage"]);
            }

            else {
                $_SESSION["outmessage"] = "error=uploaderror";
                header("Location: ../Add Film.php?".$_SESSION["outmessage"]);
                exit();
            }
        }

        else{
            $_SESSION["outmessage"] = "error=wronguploadformat";
            header("Location: ../Add Film.php?".$_SESSION["outmessage"]);
            exit();
        }
    }
    
}