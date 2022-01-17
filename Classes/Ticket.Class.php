<?php

require_once "Database Connection.Class.php";

class Ticket extends Dbh {
    public $blocked_seats = array();
    public $first_ticket_no = array();
    public $first_seat_no = array();
    public $first_cust_id = array();
    public $first_cust_name = array();
    public $second_ticket_no = array();
    public $second_seat_no = array();
    public $second_cust_id = array();
    public $second_cust_name = array();
    public $third_ticket_no = array();
    public $third_seat_no = array();
    public $third_cust_id = array();
    public $third_cust_name = array();
    public $cust_ticket_no = array();
    public $cust_seat_no = array();
    public $cust_class = array();
    public $cust_cost = array();
    
    public function ChosenSeats($show_choice) {
        $query = "SELECT seat_no FROM `ticket`, `show` WHERE ticket.show_id = ? AND ticket.show_id = `show`.`show_id` ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$show_choice]);
        $values = $stmt->fetchAll();
        $total_seats = count($values);

        if ($total_seats > 0) {
            foreach($values as $value) {
                $this->blocked_seats[] = $value["seat_no"];
            }
        }
    }

    public function NewTicket($show_id, $total_chosen_seats, $chosen_seats, $class, $cost, $cust_id) {
        $query = "SELECT MAX(`ticket_no`) FROM `ticket` WHERE `ticket_no` LIKE '$show_id%' ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll();

        if (count($values) > 0) {
            foreach($values as $value) {
                $max_ticket_no = $value["MAX(`ticket_no`)"];
            }
        }

        else {
            $max_ticket_no = $show_id."000";
        }

        $new_ticket_no = array();

        $n = substr($max_ticket_no, -3);

        for ($i=0; $i < $total_chosen_seats; $i++) { 
            $n = $n + 1;

            if ($n < 10 && $n != 0) {
                $n = "00".$n;
            }
            elseif ($n < 100 && $n != 0) {
                $n = "0".$n;
            }

            $new_ticket_no[] = $show_id.$n;
        }

        for ($i=0; $i < $total_chosen_seats; $i++) { 
            $query = "INSERT INTO `ticket`(`ticket_no`, `seat_no`, `class`, `cost`, `show_id`, `cust_id`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$new_ticket_no[$i], $chosen_seats[$i], $class, $cost, $show_id, $cust_id]);
        }
    }

    public function TicketView($show_id) {
        $class = 'First';
        
        $query = "SELECT ticket_no, seat_no, ticket.cust_id, cust_name FROM `ticket`, customer WHERE class = ? AND show_id = ? AND ticket.cust_id = customer.cust_id  ORDER BY ticket_no";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$class, $show_id]);
        $values = $stmt->fetchAll();

        if (count($values) > 0) {
            foreach($values as $value) {
                $this->first_ticket_no[] = $value["ticket_no"];
                $this->first_seat_no[] = $value["seat_no"];
                $this->first_cust_id[] = $value["cust_id"];
                $this->first_cust_name[] = $value["cust_name"];
            }
        }

        $class = 'Second';
        
        $query = "SELECT ticket_no, seat_no, ticket.cust_id, cust_name FROM `ticket`, customer WHERE class = ? AND show_id = ? AND ticket.cust_id = customer.cust_id  ORDER BY ticket_no";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$class, $show_id]);
        $values = $stmt->fetchAll();

        if (count($values) > 0) {
            foreach($values as $value) {
                $this->second_ticket_no[] = $value["ticket_no"];
                $this->second_seat_no[] = $value["seat_no"];
                $this->second_cust_id[] = $value["cust_id"];
                $this->second_cust_name[] = $value["cust_name"];
            }
        }

        $class = 'Third';
        
        $query = "SELECT ticket_no, seat_no, ticket.cust_id, cust_name FROM `ticket`, customer WHERE class = ? AND show_id = ? AND ticket.cust_id = customer.cust_id  ORDER BY ticket_no";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$class, $show_id]);
        $values = $stmt->fetchAll();

        if (count($values) > 0) {
            foreach($values as $value) {
                $this->third_ticket_no[] = $value["ticket_no"];
                $this->third_seat_no[] = $value["seat_no"];
                $this->third_cust_id[] = $value["cust_id"];
                $this->third_cust_name[] = $value["cust_name"];
            }
        }
    }

    public function CustomerTickets($current_cust_id, $show_date, $film_name, $showtime) {
        $query = "SELECT `ticket_no`, `seat_no`, `class`, `cost` FROM `ticket`, `show`, film WHERE cust_id = ? AND show_date = ? AND film_name = ? AND showtime = ? AND ticket.show_id = `show`.`show_id` AND `show`.`film_id` = film.film_id ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$current_cust_id, $show_date, $film_name, $showtime]);
        $values = $stmt->fetchAll();

        if (count($values) > 0) {
            foreach($values as $value) {
                $this->cust_ticket_no[] = $value["ticket_no"];
                $this->cust_seat_no[] = $value["seat_no"];
                $this->cust_class[] = $value["class"];
                $this->cust_cost[] = $value["cost"];
            }
        }
    }
}