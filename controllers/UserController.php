<?php

require realpath(__DIR__).'/../vendor/autoload.php';

class UserController {

    public function actionRegister() {
        $name = '';
        $email = '';
        $password = '';

        $inputErrors = false;
        $classErrors = false;
        $result = false;

        // Register API keys at https://www.google.com/recaptcha/admin
        $siteKey = '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI';
        $secret = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe';

        // reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
        $lang = 'ru';

        if (Session::get('logged') == true) {
            header("Location: /profile/info");
        }

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!User::checkName($name)) {
                $error = User::getNameError($name);
                $inputErrors['name'] = $error;
                $classErrors['name'] = 'inputError';
            }

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

            if (!User::checkPassword($name, $email, $password)) {
                $error = User::getPasswordError($name, $email, $password);
                $inputErrors['password'] = $error;
                $classErrors['password'] = 'inputError';
            }

            $recaptcha = new \ReCaptcha\ReCaptcha($secret);
            $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if (!$resp->isSuccess()) {
                // verified!
                $inputErrors['reCapcha'] = false;
            }

            if (!$inputErrors) {
                $result = User::register($name, $email, password_hash($password, PASSWORD_DEFAULT));
                $userId = User::checkUserData($email, $password);
                User::auth($userId);
            }
        }
 
        $title = 'Регистрация - My E-Shop';

        $categories = array();
        $categories = Category::getCategoriesList();

        require_once VIEWS.'/user/register.php';
    }

    public function actionLogin() {
        $email = '';
        $password = '';
        $inputErrors = false;
        $classErrors = false;
        $userId = false;

        if (Session::get('logged') == true) {
            header("Location: /profile/info");
        }

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!User::checkEmail($email)) {
                $inputErrors['email'] = 'Заполните поле "E-Mail"';
                $classErrors['email'] = 'inputError';
            }

            $userId = User::checkUserData($email, $password);
            if (!$userId) {
                $inputErrors['password'] = 'Неверный E-mail или пароль';
                $classErrors['password'] = 'inputError';
            } else {
                User::auth($userId);
                $user = User::getUserById($userId);
            }
        }

        $title = 'Авторизация - My E-Shop';
        
        $categories = array();
        $categories = Category::getCategoriesList();
        
        require_once VIEWS.'/user/login.php';
    }

    public function actionLogout() {
        Session::destroy();
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }
}