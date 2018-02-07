<?php
require_once VIEWS.'/shared/head.php';
require_once VIEWS.'/shared/nav.php';
?>

<div class="profile-navigation">
<div class="profile-image">
    <img src="/images/noavatar.png" width="120" height="120">
</div>
<ul>
    <a href="/profile/info">
        <li>
            <i class="fas fa-user-circle"></i>
            <span>Профиль</span>
        </li>
    </a>
    <a href="/profile/orders">
        <li class="nav-active">
            <i class="fas fa-shopping-bag"></i>
            <span>Заказы</span>
            <i class="fas fa-angle-right"></i>
        </li>
    </a>
</ul>
</div>

<div class="profile-content">
    <h2>Мои заказы</h2>
    <p>У вас пока нет заказов. Сделайте свою первую покупку!</p>
</div>

<?php
require_once VIEWS.'/shared/footer.php';