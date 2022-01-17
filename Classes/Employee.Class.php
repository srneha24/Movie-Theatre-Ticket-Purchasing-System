<?php

require "Database Connection.Class.php";

class Employee extends Dbh {
    private $new_emp_id;
    public $emp_id;

    private function generateID() {
        $query = "SELECT MAX(emp_id) FROM employee WHERE emp_id != 'Admin'";
        $stmt = $this->connect()->query($query);

        while($row = $stmt->fetch()) {
            $this->new_emp_id = $row['MAX(emp_id)'] + 1;
        }
    }

    public function getEmpID() {
        $this->generateID();

        $query = "INSERT INTO `employee`(`emp_id`, emp_set) VALUES (?, ?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->new_emp_id, '0']);

        return $this->new_emp_id;
    }

    public function checkID($id) {
        $query = "SELECT emp_id FROM employee WHERE emp_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$id]);
        $values = $stmt->fetchAll();

        if (count($values) > 0) {
            return 1;
        }
        else {
            return 0;
        }
    }

    public function checkInfoStatus($id) {
        $query = "SELECT emp_set FROM employee WHERE emp_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        return $row['emp_set'];
    }

    public function setEmployeeInfo($emp_name, $emp_pwd, $emp_id) {
        $query = "UPDATE `employee` SET `emp_name`=?,`emp_pwd`=?,`emp_set`=? WHERE emp_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$emp_name, $emp_pwd, '1', $emp_id]);
    }

    public function getEmployeeInfo($emp_id, $emp_pwd) {
        $query = "SELECT * FROM employee WHERE emp_id = ? AND emp_pwd = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$emp_id, $emp_pwd]);
        $values = $stmt->fetchAll();

        if (count($values) === 1) {
            foreach($values as $value) {
                $this->emp_id = $value['emp_id'];
                $this->emp_name = $value['emp_name'];
            }

            return 1;
        }

        else {
            return 0;
        }
    }
}