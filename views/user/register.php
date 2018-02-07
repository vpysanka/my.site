<?php
require_once VIEWS.'/shared/head.php';
require_once VIEWS.'/shared/nav.php';
?>

<div class="form">
    
    <?php if($result): ?>
    <div class="success">
        <h1>Поздравляем, <?php echo $name ?>!</h1>
        <p>Регистрация прошла успешно<p>
        <p><i class="fas fa-spinner fa-pulse fa-3x fa-fw"></i></p>
    </div>
    <script>
        setTimeout(function() {
            location.replace("/");
        }, 3000);
    </script>
    <?php else: ?>
    <form action="#" method="post">
        <h2>Создание нового профиля</h2>
        <p><?php if (isset($inputErrors['name'])): echo $inputErrors['name']; endif; ?></p>
        <input type="text" name="name" class="<?php echo $classErrors['name']; ?>" 
            placeholder="Имя" value="<?php echo $name ?>">
        <p><?php if (isset($inputErrors['email'])): echo $inputErrors['email']; endif; ?></p>
        <input type="email" name="email" class="<?php echo $classErrors['email']; ?>" 
            placeholder="E-Mail" value="<?php echo $email ?>">
        <p><?php if (isset($inputErrors['password'])): echo $inputErrors['password']; endif;?></p>
        <input type="password" name="password" class="<?php echo $classErrors['password']; ?>" 
            placeholder="Пароль" value="<?php echo $password ?>">
        <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"
            style="width: 303px; height: 76px; margin: 36px auto;"></div>
        <input type="submit" name="submit" id="submit" value="Создать новый профиль">
    </form>
    <?php endif; ?>
</div>

<script src='https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>'></script>
<?php
require_once VIEWS.'/shared/footer.php';