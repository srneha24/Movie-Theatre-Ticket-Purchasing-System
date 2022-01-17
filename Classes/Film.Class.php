<?php

require "Database Connection.Class.php";

class Film extends Dbh {
    public $film_id, $film_name, $director, $release_date, $imdb, $synopsis, $rtom, $now_showing, $total_results, $total_showing, $new_film_id;
    public $film_id_search = array();
    public $film_name_search = array();
    public $director_search = array();
    public $release_date_search = array();
    public $imdb_search = array();
    public $synopsis_search = array();
    public $rtom_search = array();
    public $film_id_nowshowing = array();
    public $film_name_nowshowing = array();
    public $synopsis_nowshowing = array();
    public $all_film_id = array();
    public $all_film_name = array();

    public function SearchResult($film_search) {
        $query = "SELECT * FROM film WHERE film_name LIKE '%$film_search%' ORDER BY film_name ASC";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll();
        $this->total_results = count($values);

        if ($this->total_results > 0) {
            foreach($values as $value) {
                $this->film_id_search[] = $value['film_id'];
                $this->film_name_search[] = $value['film_name'];
                $this->director_search[] = $value['director'];
                $this->imdb_search[] = $value['imdb'];
                $this->synopsis_search[] = $value['synopsis'];
                $this->rtom_search[] = $value['rtom'];

                $date_format = date("F j, Y", strtotime($value['release_date']));
                $this->release_date_search[] = $date_format;
            }

            return 1;
        }

        else {
            return 0;
        }
    }

    public function FilmStatus() {
        $query = "SELECT film_id, film_name, synopsis FROM film WHERE now_showing = 1";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll();
        $this->total_showing = count($values);

        foreach($values as $value) {
            $this->film_id_nowshowing[] = $value['film_id'];
            $this->film_name_nowshowing[] = $value['film_name'];
            $this->synopsis_nowshowing[] = $value['synopsis'];
        }
    }

    private function NewFilmID() {
        $query = "SELECT MAX(film_id) FROM `film` ";
        $stmt = $this->connect()->query($query);

        while($row = $stmt->fetch()) {
            $new = $row['MAX(film_id)'];
        }

        $new = substr($new, 1) + 1;
        $this->new_film_id = "F".$new;
    }

    public function AddFilm($new_film_name, $new_director, $new_release_date, $new_imdb, $new_synopsis, $new_rtom) {
        $this->NewFilmID();

        $query = "INSERT INTO `film`(`film_id`, `film_name`, `director`, `release_date`, `imdb`, `synopsis`, `rtom`, `now_showing`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->new_film_id, $new_film_name, $new_director, $new_release_date, $new_imdb, $new_synopsis, $new_rtom, '0']);
    }

    public function GetFilm() {
        $query = "SELECT film_id, film_name FROM `film`";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll();

        foreach($values as $value) {
            $this->all_film_id[] = $value['film_id'];
            $this->all_film_name[] = $value['film_name'];
        }
    }

    private function ClearNowShowing() {
        $query = "UPDATE `film` SET `now_showing`=? where film_id != ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['0', 'F0000']);
    }

    public function UpdateFilmStatus($sent_film_id) {
        $this->ClearNowShowing();
        
        for ($i=0; $i < count($sent_film_id); $i++) { 
            $query = "UPDATE `film` SET `now_showing`=? WHERE film_id=?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute(['1', $sent_film_id[$i]]);
        }
    }
}