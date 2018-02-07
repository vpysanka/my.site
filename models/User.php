<?php

class User {

    public static function checkName($name) {
        if (strlen($name) >= 3 && strlen($name) <= 30) {
            if (preg_match('/^[a-zA-Zа-яА-ЯёЁїЇєЄ]+$/u', $name)) {
                return true;
            }
            return false;
        }
        return false;
    }

    public static function getNameError($name) {
        if (strlen($name) == 0) {
            return 'Поле "Имя" не может быть пустым';
        }

        if (strlen($name) <= 3) {
            return 'Имя не может быть короче 3-х символов';
        }

        if (strlen($name) >= 30) {
            return 'Имя не может быть длинее 30-ти символов';
        }

        if (!preg_match('/^[a-zA-Zа-яА-ЯёЁїЇєЄ]+$/u', $name)) {
            return 'Имя может содержать только буквы';
        }
    }

    public static function checkSurname($surname) {
        if (strlen($surname) <= 30) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkPhone($phone) {
        if (strlen($phone) !=0) {
            return true;
        }
        return false;
    }

    public static function checkAddress($address) {
        if (strlen($address) < 100) {
            return true;
        }
        return false;
    }

    public static function checkPassword($name, $email, $password) {
        if (strlen($password) >= 6) {
            if (($password !== $name) && ($password !== $email)) {
                return true;
            }
            return false;
        }
        return false;
    }

    public static function getPasswordError($name, $email, $password) {
        if (strlen($password) < 6) {
            return 'Пароль не должен быть короче 6-ти символов';
        }
        if ($password === $name) {
            return 'Пароль не должен совпадать с именем';
        }
        if ($password === $email) {
            return 'Пароль не должен совпадать с e-mail';
        }
    }

    public static function checkEmailExists($email) {
        $db = Db::getConnection();
        
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";

        $result = $db->prepare($sql);

        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        
        if ($result->fetchColumn()) {
            return true;
        }
        return false;
    }

    public static function register($name, $email, $password) {
        $db = Db::getConnection();

        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name,  PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function edit($id, $name, $surname, $email, $phone, $address, $birthday, $password) {
        $db = Db::getConnection();

        $sql = "UPDATE users 
                SET name = :name, surname = :surname, email = :email, 
                phone = :phone, address = :address, birthday = :birthday, password = :password 
                WHERE id = :id"; 
                
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':address', $address, PDO::PARAM_STR);
        $result->bindParam(':birthday', $birthday, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkUserData($email, $password) {
        $db = Db::getConnection();

        $sql = "SELECT * FROM users WHERE email = :email";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();

        if (password_verify($password, $user['password'])) {
            return $user['id'];
        }

        return false;
    }

    public static function getUserById($userId) {
        $db = Db::getConnection();

        $sql = "SELECT * FROM users WHERE id = :userId";
        $result = $db->prepare($sql);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function auth($userId) {
        Session::set('userId', $userId);
        Session::set('logged', true);
    }

    public static function checkLogged() {
        if ((Session::get('userId'))) {
            return Session::get('userId');
        }

        header("Location: /login");
    }

    public static function isGuest () {
        if (Session::get('logged') == true) {
            return false;
        }
        return true;
    }
}