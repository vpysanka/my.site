<?php

class HomeController {

    private function categories() {
        $this->categories = array();
        $this->categories = Category::getCategoriesList();
        return $this->categories;
    }

    public function actionIndex() {
        $title = 'Интернет магазин My E-shop';

        $categories = $this->categories();

        $weekOfferProducts = array();
        $weekOfferProducts = Product::getWeekOfferProducts();

        $saleLeadersProducts = array();
        $saleLeadersProducts = Product::getSaleLeadersProducts(12);

        require_once VIEWS.'/home/index.php';
    }

    public function actionAbout() {
        $title = 'О нас - My E-shop';
        
        $categories = $this->categories();
                
        require_once VIEWS.'/about.php';
    }

    public function actionDelivery() {
        $title = 'Оплата и доставка - My E-shop';

        $categories = $this->categories();
        
        require_once VIEWS.'/delivery.php';
    }

    public function actionContacts() {
        $name = '';
        $email = '';

        if (Session::get('logged') == true) {
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $name = $user['name'];
            $email = $user['email'];
        }

        if (isset($_POST['submit'])) {
            $name = stripslashes(trim($_POST['name']));
            $email = stripslashes(trim($_POST['email']));
            $subject = stripslashes(trim($_POST['subject']));            
            $message = stripslashes(trim($_POST['message']));
            $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';

            if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $subject) 
                || preg_match($pattern, $message)) {
                die("Header injection detected");
            }
            
            $mail = new Simplemail();
            
            $mail->setTo('vpysanka@gmail.com');
            $mail->setFrom('My E-Shop <postmaster@sandboxadea2534f6be44f09e9f2e52d82ebdf7.mailgun.org>');
            $mail->setSender($name);
            $mail->setSenderEmail($email);
            $mail->setSubject($subject);
            $mail->setMessage($message);
            $mail->send();
        }

        $title = 'Контакты - My E-shop';

        $categories = $this->categories();
        
        require_once VIEWS.'/contacts.php';
    }

    public function actionBlog() {
        $title = 'Блог - My E-shop';

        $categories = $this->categories();

        $blogList = array();
        $blogList = Blog::getBlogList();
        
        require_once VIEWS.'/blog.php';
    }

    public function actionBlogView($id) {
        if ($id) {
            $blogItem = Blog::getBlogItemById($id);
                        
            if(empty($blogItem)) {
                Page404Controller::actionIndex();
            } else {
                echo '<pre>';
                print_r($blogItem);
                echo '</pre>';
            }
        }
    }
    
}