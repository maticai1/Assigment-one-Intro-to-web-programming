<?php
class Validate {
    
    public function checkEmpty($data, $fields) {
        $msg = null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $msg .= "<p>$value field empty</p>";
            }
        }
        return $msg;
    }

    public function validAge($age) {
        if (preg_match("/^[0-9]+$/", $age)) {
            return true;
        }
        return false;
    }

    public function validEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    // Added checkEmail function
    public function checkEmail($email) {
        return $this->validEmail($email);
    }
}
?>
