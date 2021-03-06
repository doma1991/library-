<?php

namespace Library\Users;
include_once '../../autoload.php';


class Member extends Guest implements \Library\Interfaces\Returnable{

//Creating properties within the class.
    protected $user_id;
    protected $password;

//      Creating methods  
    public function __construct($user_id, $password, $first_name, $last_name) {
        parent::__construct($first_name, $last_name); // constructing parent
        $this->user_id = $user_id;
        $this->password = $password;
    }

    public function Forgot_user_id() {
        return "Hello " . "$this->first_name" . " " . "$this->last_name" . "\n" . "Your User ID is: " . "$this->user_id" . "\n";
    }

    public function Forgot_password() {
        return "Hello " . "$this->first_name" . " " . "$this->last_name" . "\n" . "Your Password is: " . "$this->password";
    }

    public function view($list) {
        if (parent::view($list)) {
            return true;
        } else if ($list === "Book_loan") {
            echo $list;
            return true;
        }
        echo "Access denied";
        return false;
    }

    use \Library\Traits\dateable;

        public function asReturnable($email) {
            return "$email is registered with user_id $this->user_id";
        }
}
