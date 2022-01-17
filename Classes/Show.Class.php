<?php

require_once "Database Connection.Class.php";

class Show extends Dbh {
    public $total_shows, $film_name_choice, $show_id_chosen, $cust_total_shows;
    public $show_id = array();
    public $film_id = array();
    public $film_name = array();
    public $show_date = array();
    public $showtime = array();
    public $emp_id = array();
    public $show_id_select = array();
    public $film_id_select = array();
    public $film_name_select = array();
    public $showtime_select = array();
    public $cust_show_date = array();
    public $cust_showtime = array();
    public $cust_film_name = array();
    public $all_films = array();

    public function Showtime($date_search) {
        $query = "SELECT `show_id`, `show`.film_id, `showtime`, film_name FROM `show`, film WHERE show_date = ? AND `show`.`film_id` = film.film_id ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$date_search]);
        $values = $stmt->fetchAll();
        $this->total_shows = count($values);

        if ($this->total_shows > 0) {
            foreach($values as $value) {
                $value["showtime"] = substr($value["showtime"], 0, 5);
                
                $show[] = array(
                    $value["film_id"], $value["film_name"], $value["showtime"]
                );
            }
    
            for ($i=0; $i < count($show); $i++) {
                for ($j=1; $j < count($show) - 1; $j++) {
                    if ($i !== $j) {
                        if ($show[$i][0] === $show[$j][0]) {
                            array_push($show[$i], $show[$j][2]);
                            unset($show[$j]);
                            $show = array_values($show);
                        }
                    }
                }
            }
    
            $this->showtime = $show;
        }
    }

    public function ShowDateSelect($show_date) {
        $query = "SELECT DISTINCT(film_name), `show`.film_id FROM `show`, film WHERE show_date = ? AND `show`.`film_id`=film.film_id ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$show_date]);
        $values = $stmt->fetchAll();
        $this->total_shows = count($values);

        if ($this->total_shows > 0) {
            foreach($values as $value) {
                $this->film_id_select[] = $value["film_id"];
                $this->film_name_select[] = $value["film_name"];
            }
        }
    }

    public function FilmSelect($show_date, $film_choice) {
        $query = "SELECT showtime, film_name FROM `show`, film WHERE show_date = ? AND `show`.`film_id` = ? AND `show`.`film_id` = film.film_id  ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$show_date, $film_choice]);
        $values = $stmt->fetchAll();
        $this->total_shows = count($values);

        if ($this->total_shows > 0) {
            foreach($values as $value) {
                $value["showtime"] = substr($value["showtime"], 0, 5);
                $this->showtime_select[] = $value["showtime"];
                $this->film_name_choice = $value["film_name"];
            }
        }
    }

    public function getShowID($show_date, $film_id, $showtime) {
        $query = "SELECT show_id FROM `show` WHERE show_date = ? AND film_id = ? AND showtime = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$show_date, $film_id, $showtime]);
        $values = $stmt->fetchAll();
        $this->total_shows = count($values);

        if ($this->total_shows > 0) {
            foreach($values as $value) {
                $this->show_id_chosen = $value["show_id"];
            }
        }
    }

    public function CustomerShow($current_cust_id) {
        $query = "SELECT show_date, film_name, showtime FROM `ticket`, `show`, film WHERE cust_id = ? AND ticket.show_id = `show`.`show_id` AND `show`.`film_id` = film.film_id GROUP BY show_date, showtime ORDER BY show_date DESC";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$current_cust_id]);
        $values = $stmt->fetchAll();
        $this->cust_total_shows = count($values);

        if ($this->cust_total_shows > 0) {
            foreach($values as $value) {
                $this->cust_show_date[] = $value["show_date"];
                $this->cust_film_name[] = $value["film_name"];
                $this->cust_showtime[] = $value["showtime"];
            }
        }
    }

    public function AllFilms($current_date) {
        $query = "SELECT DISTINCT(`film_id`) FROM `show` WHERE show_date >= ? ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$current_date]);
        $values = $stmt->fetchAll();

        if (count($values) > 0) {
            foreach($values as $value) {
                $this->all_films[] = $value["film_id"];
            }
        }
    }

    public function SetShow($set_show_date, $set_film_id, $set_showtime, $current_emp) {
        $date = substr($set_show_date, 8, 2).substr($set_show_date, 5, 2).substr($set_show_date, 2, 2);
        $new_show_id = $date.$set_film_id."S";

        $shows = array();

        $query = "SELECT show_id FROM `show` WHERE show_id LIKE '$new_show_id%' ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll();

        if (count($values) > 0) {
            foreach($values as $value) {
                $shows[] = $value['show_id'];
            }
        }

        for ($i=1; $i <= 4; $i++) { 
            if (in_array($new_show_id.$i, $shows)) {
                if ($i !== 4) {
                    $new_show_id = $new_show_id.$i+1;
                }
                break;
            }
        }

        if ($new_show_id === $date.$set_film_id."S") {
            $new_show_id = $date.$set_film_id."S1";
        }

        $query = "INSERT INTO `show`(`show_id`, `film_id`, `show_date`, `showtime`, `emp_id`) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$new_show_id, $set_film_id, $set_show_date, $set_showtime, $current_emp]);
    }
}
