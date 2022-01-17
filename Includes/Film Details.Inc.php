<?php

if (isset($_POST['filmsearch-submit'])) {
    include_once "../Classes/Film.Class.php";

    session_start();

    $objFilm = new Film();

    $film_selected = $_POST['filmsearch-submit'];

    for ($i=0; $i<$_SESSION["total_results"]; $i++) {
        if ($film_selected === $_SESSION["film_id_search"][$i]) {
            $index = $i;
            break;
        }
    }
    
    $_SESSION["film_id_selected"] = $_SESSION["film_id_search"][$index];
    $_SESSION["film_name_selected"] = $_SESSION["film_name_search"][$index];
    $_SESSION["director_selected"] = $_SESSION["director_search"][$index];
    $_SESSION["release_date_selected"] = $_SESSION["release_date_search"][$index];
    $_SESSION["imdb_selected"] = $_SESSION["imdb_search"][$index];
    $_SESSION["synopsis_selected"] = $_SESSION["synopsis_search"][$index];
    $_SESSION["rtom_selected"] = $_SESSION["rtom_search"][$index];

    header("Location: ../Film Details.php");
    exit();
}