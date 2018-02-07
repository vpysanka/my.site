<?php

class ProfileController {

    public function actionInfo() {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        $name = $user['name'];
        $surname = $user['surname'];
        $email = $user['email'];
        $phone = $user['phone'];
        $address = $user['address'];
        $birthday = $user['birthday'];

        $inputErrors = false;
        $classErrors = false;
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $new_email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            if (isset($_POST['birthday'])) {
                $birthday = $_POST['birthday'];
            }
            $password = $_POST['password'];
            $new_password = $_POST['new_password'];

            if (!User::checkName($name)) {
                $error = User::getNameError($name);
                $inputErrors['name'] = $error;
                $classErrors['name'] = 'inputError';
            }

            if (!User::checkSurname($surname)) {
                $inputErrors['surname'] = 'Фамилия не может быть длинее 30-ти символов';
                $classErrors['surname'] = 'inputError';
            }

            if ($email != $new_email) {
                $email = $new_email;
                if (!User::checkEmail($email)) {
                    $inputErrors['email'] = 'Заполните поле "E-Mail"';
                    $classErrors['email'] = 'inputError';
                }

                if (!isset($inputErrors['email'])) {
                    if (User::checkEmailExists($email)) {
                        $inputErrors['email'] = 'Такой e-mail уже используется';
                        $classErrors['email'] = 'inputError';
                    }
                }
            }

            if (!User::checkPhone($phone)) {
                $inputErrors['phone'] = 'Поле "Телефон" не может быть пустым';
                $classErrors['phone'] = 'inputError';
            }

            if (!User::checkAddress($address)) {
                $inputErrors['address'] = 'Слишком длинный адрес, попробуйте немного сократить';
                $classErrors['address'] = 'inputError';
            }

            if (!password_verify($password, $user['password'])) {
                $inputErrors['password'] = 'Неверный пароль';
                $classErrors['password'] = 'inputError';
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);

                if (strlen($new_password) >= 1) {
                    if (password_verify($new_password, $password)) {
                        $inputErrors['new_password'] = 'Новый пароль не должен совпадать со старым';
                        $classErrors['new_password'] = 'inputError';
                    }

                    if (!User::checkPassword($name, $email, $new_password)) {
                        $error = User::getPasswordError($name, $email, $new_password);
                        $inputErrors['new_password'] = $error;
                        $classErrors['new_password'] = 'inputError';
                    }

                    $password = password_hash($new_password, PASSWORD_DEFAULT);
                }
            }
            
            if (!$inputErrors) {
                $result = User::edit($userId, $name, $surname, $email, 
                                    $phone, $address, $birthday, $password);
            }
        }

        $title = "Профиль";

        $categories = array();
        $categories = Category::getCategoriesList();

        require_once VIEWS.'/profile/info.php';
    }

    public function actionOrders() {
        $userId = User::checkLogged();
        
        $title = "Мои заказы";

        $categories = array();
        $categories = Category::getCategoriesList();

        require_once VIEWS.'/profile/orders.php';
    }
}