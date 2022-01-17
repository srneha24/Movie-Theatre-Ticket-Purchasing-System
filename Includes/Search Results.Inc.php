<?php

if (isset($_POST['search-submit'])) {
    include_once "../Classes/Film.Class.php";

    session_start();

    $_SESSION["film_search"] = $_POST["film-search"];

    if (!empty($_SESSION["film_search"])) {
        $objFilm = new Film();
        $result = $objFilm->SearchResult($_SESSION["film_search"]);

        if ($result == 1){
            $_SESSION["total_results"] = $objFilm->total_results;
            $_SESSION["film_id_search"] = $objFilm->film_id_search;
            $_SESSION["film_name_search"] = $objFilm->film_name_search;
            $_SESSION["director_search"] = $objFilm->director_search;
            $_SESSION["release_date_search"] = $objFilm->release_date_search;
            $_SESSION["imdb_search"] = $objFilm->imdb_search;
            $_SESSION["synopsis_search"] = $objFilm->synopsis_search;
            $_SESSION["rtom_search"] = $objFilm->rtom_search;
            
            header("Location: ../Search Results.php");
            exit();
        }

        else {
            $_SESSION["total_results"] = $objFilm->total_results;

            header("Location: ../Search Results.php");
            exit();
        }
    }

    else {
        $_SESSION["outmessage"] = "error=nokeyword";

        header("Location: {$_SERVER["HTTP_REFERER"]}?".$_SESSION["outmessage"]);
        exit();
    }
}