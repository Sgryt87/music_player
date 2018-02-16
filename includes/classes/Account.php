<?php


class Account
{
    private $errorArray;

    public function __construct()
    {
        $this->errorArray = [];
    }

    public function getError($error)
    {
        if (!in_array($error, $this->errorArray)) {
            $error = '';
        }
        return "<span class='errorMessage'>$error</span>";
    }

    public function register($username, $firstname, $lastname, $email, $email2, $password, $password2)
    {
        $this->validateUsername($username);
        $this->validateFirstname($firstname);
        $this->validateLastname($lastname);
        $this->validateEmails($email, $email2);
        $this->validatePassword($password, $password2);
        if (empty($this->errorArray)) {
            return true;
        } else {
            return false;
        }
    }

    private function validateUsername($username)
    {
        if (strlen($username) > 25 || strlen($username) < 3) {
            array_push($this->errorArray, 'Your Username has to be between 3 and 25 characters');
            return;
        }
    }

    private function validateFirstname($firstname)
    {
        if (strlen($firstname) > 25 || strlen($firstname) < 2) {
            array_push($this->errorArray, 'Your First Name has to be between 2 and 25 characters');
            return;
        }
    }

    private function validateLastname($lastname)
    {
        if (strlen($lastname) > 25 || strlen($lastname) < 3) {
            array_push($this->errorArray, 'Your Last Name has to be between 2 and 25 characters');
            return;
        }
    }

    private function validateEmails($email, $email2)
    {
        if ($email != $email2) {
            array_push($this->errorArray, 'Your emails don\'t match');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, 'Email is invalid');
        }
    }

    private function validatePassword($password, $password2)
    {
        if ($password != $password2) {
            array_push($this->errorArray, 'Your passwords don\'t match');
        }
        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->errorArray, 'Your password can only contain letters and numbers');
        }
        if (strlen($password) > 25 || strlen($password) < 5) {
            array_push($this->errorArray, 'Your password has to be between 5 and 25 characters');
            return;
        }
    }
}