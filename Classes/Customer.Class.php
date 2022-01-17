<?php

require "Database Connection.Class.php";

class Customer extends Dbh {
    public $new_cust_id, $cust_id, $cust_name, $cust_email, $cust_phone, $card_no, $exp_date, $cvc_no;

    private function newCustID() {
        $query = "SELECT MAX(cust_id) FROM customer";
        $stmt = $this->connect()->query($query);

        while($row = $stmt->fetch()) {
            $this->new_cust_id = $row['MAX(cust_id)'] + 1;
        }
    }

    public function checkPhoneEmail($phone, $email) {
        $query = "SELECT cust_phone, cust_email FROM customer WHERE cust_phone == ? OR cust_email = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$phone, $email]);
        $values = $stmt->fetchAll();

        if (count($values) > 0) {
            return 0;
        }
        else {
            return 1;
        }
    }

    public function setCustomerInfo($cust_name, $cust_phone, $cust_email, $cust_pwd, $card_no, $exp_date, $cvc_no) {
        $this->newCustID();
        
        $query = "INSERT INTO `customer`(`cust_id`, `cust_name`, `cust_phone`, `cust_email`, `cust_pwd`, `card_no`, `exp_date`, `cvc_no`) VALUES (? ,? ,? ,? ,? ,? ,? ,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->new_cust_id, $cust_name, $cust_phone, $cust_email, $cust_pwd, $card_no, $exp_date, $cvc_no]);

        return $this->new_cust_id;
    }

    public function getCustomerInfo($cust_idemail, $cust_pwd) {
        $query = "SELECT * FROM customer WHERE (cust_id = ? OR cust_email = ?) AND cust_pwd = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$cust_idemail, $cust_idemail, $cust_pwd]);
        $values = $stmt->fetchAll();

        if (count($values) === 1) {
            foreach($values as $value) {
                $this->cust_id = $value['cust_id'];
                $this->cust_name = $value['cust_name'];
                $this->cust_email = $value['cust_email'];
                $this->cust_phone = $value['cust_phone'];
                $this->card_no = $value['card_no'];
                $this->exp_date = $value['exp_date'];
                $this->cvc_no = $value['cvc_no'];
            }

            return 1;
        }

        else {
            return 0;
        }
    }

    public function updateCustomerInfo($new_cust_name, $new_cust_phone, $new_cust_email, $new_card_no, $new_exp_date, $new_cvc_no, $current_cust_id) {
        $query = "UPDATE `customer` SET `cust_name`=?,`cust_phone`=?,`cust_email`=?,`card_no`=?,`exp_date`=?,`cvc_no`=? WHERE cust_id=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$new_cust_name, $new_cust_phone, $new_cust_email, $new_card_no, $new_exp_date, $new_cvc_no, $current_cust_id]);
    }
}