<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace User\Model;

class ChangePassword {

    private $errorsList = [];
    private $email;
    
    private $userJson=[];
    private $jsonAccess;
    public function __construct() {
        $this->jsonAccess= new JsonAccess();
        /* Zczytywanie jsona "users.json" */
        $this->userJson = $this->jsonAccess->readJson();
      
        $this->validateInputs();
    }

    private function validateInputs() {
        if ($email = Session::getName()) {
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $passwordConfirm = filter_input(INPUT_POST, 'password-confirm', FILTER_SANITIZE_STRING);
            $passwordOld = filter_input(INPUT_POST, 'password-old', FILTER_SANITIZE_STRING);
            if (!empty($password) and !empty($passwordConfirm) && $password === $passwordConfirm) {
                $changed = false;
                foreach ($this->userJson as $user) {
                    if ($user['email'] === $email and $user['password'] === Auth::sha1($passwordOld)) {
                        $this->changePassword($email, $password);
                        $changed = true;
                        break;
                    }
                }
                if (!$changed) {
                    array_push($this->errorsList, "Nie no... stare hasło nie bangla!");
                }
            } else {
                array_push($this->errorsList, "Hasła nie są takie same");
            }
        } else {
            array_push($this->errorsList, "Brak użytkownika");
        }
    }

    /* Sprawdzenie czy jest jakikolwiek bład w wysłanych danych */
    public function isAnyInputError() {
        return (bool) count($this->errorsList);
    }

    /* Pobranie listy błędów, może być pusta */
    public function getInputErrors() {
        return $this->errorsList;
    }

    public function getEmail() {
        return $this->email;
    }

    private function changePassword($email, $password)
    {
        foreach ($this->userJson as $key => $user) {
            if ($user['email'] === $email) {
                $this->userJson[$key]['password'] = Auth::sha1($password);
            }
        }
        
        $this->jsonAccess->saveJson($this->userJson);
    }
}
