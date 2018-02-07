<span class="top"></span>

<div class="nav-logo">
    <div id="nav-icon">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <nav>
        <a href="/">My E-Shop</a>
    </nav>
</div>

<div class="top-navigation">
    <nav class="navigation">
        <ul>
            <li>
                <a class="navCatalog">Каталог товаров</a>
            </li>
            <li>
                <a <?php if ($_SERVER['REQUEST_URI'] == '/about'):
                    echo 'class="active"';
                else:
                    echo 'href="/about"';
                endif; ?>
                >О нас</a>
            </li>
            <li>
                <a <?php if ($_SERVER['REQUEST_URI'] == '/delivery'):
                    echo 'class="active"';
                else:
                    echo 'href="/delivery"';
                endif; ?>
                >Оплата и доставка</a>
            </li>
            <li>
                <a <?php if ($_SERVER['REQUEST_URI'] == '/contacts'):
                    echo 'class="active"';
                else:
                    echo 'href="/contacts"';
                endif; ?>
                >Контакты</a>
            </li>
            <li>
                <a <?php if ($_SERVER['REQUEST_URI'] == '/blog'):
                    echo 'class="active"';
                else:
                    echo 'href="/blog"';
                endif; ?>
                >Блог</a>
            </li>
        </ul>
        <div id="id-user" class="active">
            <?php if (User::isGuest()): ?>
            <i class="fas fa-sign-in-alt"></i>
            <?php else: ?>
            <i class="fas fa-user"></i>
            <?php endif; ?>
        </div>
        <div class="shopping-bag" id="total-items">
            <i class="fas fa-shopping-basket"></i>
            <span>0</span>
        </div>
        <script>
            if (localStorage.getItem('myCart') != null) {
                cartData = JSON.parse(localStorage.getItem('myCart'));
                if (cartData[0].TotalQuantity >= 1 ) {
                    document.getElementById('total-items').querySelector('span')
                        .innerHTML = cartData[0].TotalQuantity;
                    document.querySelector('.shopping-bag span').classList.add('active');
                }
            }
        </script>
    </nav> 
</div>
     
<div class="mega-menu">
    <div class="mega-menu-top">
        <div class="mega-search">
            <label for="mega-search">Поиск</label>
            <input type="search" id="mega-search" placeholder="Поиск товара">
        </div>
    </div>

    <div class="items-container">
        <?php foreach ($categories as $categoryItem):?>
        <div class="container">
            <a href="/catalog/<?php echo $categoryItem['category'];?>"><?php echo $categoryItem['name'];?>
                <div class="container-image">
                    <img src="<?php echo $categoryItem['image'];?>" height="100">
                </div>
            </a>
        </div>
        <?php endforeach;?>
    </div>
</div>

<div id="nav-menu">
    <ul>
        <li><a href="#">Каталог товаров</a></li>
        <li><a href="about">О нас</a></li>
        <li><a href="delivery">Оплата и доставка</a></li>
        <li><a href="contacts">Контакты</a></li>
        <li><a href="blog">Блог</a></li>
    </ul>
</div>

<div class="user-menu">
    <ul>
        <?php if (User::isGuest()): ?>
        <a href="/login"><li>Вход</li></a>
        <a href="/register"><li>Регистрация</li></a>
        <?php else: ?>
        <a href="/profile/info"><li>Мой кабинет</li></a>
        <a href="/logout"><li>Выход</li></a>
        <?php endif; ?>
    </ul>
</div>

<div id="cart-menu">
    <p class="empty-cart">Ваша корзина пустая</p>
</div>