<?php
require_once VIEWS.'/shared/head.php';
require_once VIEWS.'/shared/nav.php';
?>

<div class="profile-navigation">
    <div class="profile-image">
        <img src="<?php echo $user['photo']; ?>" width="120" height="120">
    </div>
    <ul>
        <a href="/profile/info">
            <li class="nav-active">
                <i class="fas fa-user-circle"></i>
                <span>Профиль</span>
                <i class="fas fa-angle-right"></i>
            </li>
        </a>
        <a href="/profile/orders">
            <li>
                <i class="fas fa-shopping-bag"></i>
                <span>Заказы</span>
            </li>
        </a>
    </ul>
</div>

<div class="profile-content">
    <h2>Мой профиль</h2>
    <form action="/profile/info" method="post">
        <div class="profile-row">
            <div class="col-3">
                <p>Имя <span>*</span></p>
                <span>Чтобы мы знали как к Вам обращаться</span>
            </div>
            <div class="col-7">
                <p><?php if (isset($inputErrors['name'])): echo $inputErrors['name']; endif; ?></p>
                <input type="text" name="name" class="<?php echo $classErrors['name']; ?>" 
                value="<?php echo $name; ?>">
            </div>
        </div>
        <div class="profile-row">
            <div class="col-3">
                <p>Фамилия</p>
                <span>Чтобы мы могли отправить Вам ваши покупки</span>
            </div>
            <div class="col-7">
                <p><?php if (isset($inputErrors['surname'])): echo $inputErrors['surname']; endif; ?></p>
                <input type="text" name="surname" class="<?php echo $classErrors['surname']; ?>" 
                value="<?php echo $surname; ?>">
            </div>
        </div>
        <div class="profile-row">
            <div class="col-3">
                <p>E-mail <span>*</span></p>
                <span>Используется для входа и отслеживания покупок</span>
            </div>
            <div class="col-7">
                <p><?php if (isset($inputErrors['email'])): echo $inputErrors['email']; endif; ?></p>
                <input type="email" name="email" class="<?php echo $classErrors['email']; ?>" 
                value="<?php echo $email; ?>">
            </div>
        </div>
        <div class="profile-row">
            <div class="col-3">
                <p>Телефон <span>*</span></p>
                <span>Чтобы мы могли с вами связаться</span>
            </div>
            <div class="col-7">
                <p><?php if (isset($inputErrors['phone'])): echo $inputErrors['phone']; endif; ?></p>
                <input type="text" name="phone" id="phone"
                class="<?php echo $classErrors['phone']; ?>" value="<?php echo $phone; ?>">
            </div>
        </div>
        <div class="profile-row">
            <div class="col-3">
                <p>Адрес доставки </p>
                <span>Чтобы мы знали, куда доставить Ваши покупки</span>
            </div>
            <div class="col-7">
                <p><?php if (isset($inputErrors['address'])): echo $inputErrors['address']; endif; ?></p>
                <input type="text" name="address"
                class="<?php echo $classErrors['address']; ?>" value="<?php echo $address; ?>">
            </div>
        </div>
        <div class="profile-row">
            <div class="col-3">
                <p>День рождения </p>
                <span>Чтобы мы смогли сделать Вам приятный подарок</span>
            </div>
            <div class="col-7">
                <p><?php if (isset($inputErrors['birthday'])): echo $inputErrors['birthday']; endif; ?></p>
                <input type="date" name="birthday" id="date"
                class="<?php echo $classErrors['birthday']; ?>" value="<?php echo $birthday; ?>" 
                <?php if ($user['birthday'] != ''): echo 'disabled'; endif; ?>>
            </div>
        </div>
        <div class="profile-row">
            <div class="col-3">
                <p>Пароль <span>*</span></p>
            </div>
            <div class="col-7">
                <p><?php if (isset($inputErrors['password'])): echo $inputErrors['password']; endif; ?></p>
                <input type="password" name="password"
                class="<?php echo $classErrors['password']; ?>" value="">
            </div>
        </div>
        <div class="profile-row">
            <div class="col-3">
                <p>Новый пароль</p>
                <span>Вы можете поменять свой пароль</span>
            </div>
            <div class="col-7">
                <p><?php if (isset($inputErrors['new_password'])): echo $inputErrors['new_password']; endif; ?></p>
                <input type="password" name="new_password"
                class="<?php echo $classErrors['new_password']; ?>" value="">
            </div>
        </div>
        <div class="col-10">
            <input type="submit" name="submit" id="submit" value="Сохранить">
        </div>
    </form>
</div>

<!-- Плагин для поля телефона -->
<script src="/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#phone").mask("+38 (999) 999-9999");
    });
</script>

<?php
require_once VIEWS.'/shared/footer.php';