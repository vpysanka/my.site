<?php
require_once VIEWS.'/shared/head.php';
require_once VIEWS.'/shared/nav.php';
?>

<div class="form">

    <?php if($userId): ?>
    <div class="success">
        <h1><?php echo $user['name']; ?>, добро пожаловать!</h1>
        <p>Авторизация прошла успешно<p>
        <p><i class="fas fa-spinner fa-pulse fa-3x fa-fw"></i></p>
    </div>
    <script>
        setTimeout(function() {
            javascript:history.go(-2);
            //location.replace("/profile/info");
        }, 3000);
    </script>
    <?php else: ?>
    
    <form action="#" method="post">
        <h2>Вход в личный кабинет</h2>
        <p><?php if (isset($inputErrors['email'])): echo $inputErrors['email']; endif; ?></p>
        <input type="email" name="email" class="<?php echo $classErrors['email']; ?>" 
            placeholder="E-Mail" value="<?php echo $email ?>">
        <p><?php if (isset($inputErrors['password'])): echo $inputErrors['password']; endif;?></p>
        <input type="password" name="password" class="<?php echo $classErrors['password']; ?>" 
            placeholder="Пароль" value="<?php echo $password ?>">
        <input type="submit" name="submit" id="submit" value="Войти">
    </form>
    <?php endif; ?>
</div>


<?php
require_once VIEWS.'/shared/footer.php';