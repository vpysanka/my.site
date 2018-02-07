function ready() {
    let catalog = document.querySelector('.navigation .navCatalog'),
    mega_menu = document.querySelector('.mega-menu'),
    shopping_bag = document.querySelector('.shopping-bag .fa-shopping-basket'),
    cart_menu = document.getElementById('cart-menu'),
    nav_icon = document.getElementById('nav-icon'),
    nav_menu = document.getElementById('nav-menu'),
    number = document.querySelector('.shopping-bag span'),
    id_user = document.getElementById('id-user'),
    user_menu = document.querySelector('.user-menu');
    
    catalog.addEventListener('click', function() {
        mega_panel(mega_menu, catalog, cart_menu, shopping_bag, number, user_menu);
    });

    shopping_bag.addEventListener('click', function() {
        cart_panel(cart_menu, shopping_bag, mega_menu, catalog, number, nav_icon, nav_menu, user_menu);
    });

    nav_icon.addEventListener('click', function() {
        navigation_panel(nav_icon, nav_menu, shopping_bag, cart_menu, number);
    });

    id_user.addEventListener('click', function() {
        user_panel(user_menu, mega_menu, catalog, cart_menu, shopping_bag, number);    
    });

    mega_menu.addEventListener('mouseleave', function() {
        setTimeout(function() {
            mega_menu.classList.remove('active');
            catalog.classList.remove('active');
        }, 500);
    });

    cart_menu.addEventListener('mouseleave', function() {
        setTimeout(function() {
            cart_menu.classList.remove('active');
            shopping_bag.classList.remove('active');
            if (parseInt(number.innerHTML) != 0)
                number.classList.add('active');
        }, 500);
    });

    nav_menu.addEventListener('mouseleave', function() {
        setTimeout(function() {
            nav_menu.classList.remove('active');
            nav_icon.classList.remove('active');
        }, 500);
    });

    user_menu.addEventListener('mouseleave', function() {
        setTimeout(function() {
            user_menu.classList.remove('active');
        }, 500)
    });
    
    function mega_panel(mega, catalog, cart_menu, cart, number, user_menu) {
        if (mega.classList.contains('active')) {
            mega.classList.remove('active');
            catalog.classList.remove('active');
        } else {
            mega.classList.add('active');
            catalog.classList.add('active');
            cart_menu.classList.remove('active');
            cart.classList.remove('active');
            user_menu.classList.remove('active');
            if (parseInt(number.innerHTML) != 0)
                number.classList.add('active');
        }
    }

    function cart_panel(cart_menu, cart, mega, catalog, number, nav_icon, nav_menu, user_menu) {
        if (cart_menu.classList.contains('active')) {
            cart_menu.classList.remove('active');
            cart.classList.remove('active');
            if (parseInt(number.innerHTML) != 0)
                number.classList.add('active');
        } else {
            showCart();
            cart_menu.classList.add('active');
            cart.classList.add('active');
            number.classList.remove('active');
            mega.classList.remove('active');
            catalog.classList.remove('active');
            nav_icon.classList.remove('active');
            nav_menu.classList.remove('active');
            user_menu.classList.remove('active');
        }
    }

    function navigation_panel(nav_icon, nav_menu, shopping_bag, shopping_bag, cart_menu, number) {
        if (nav_icon.classList.contains('active')) {
            nav_icon.classList.remove('active');
            nav_menu.classList.remove('active');
        } else {
            nav_icon.classList.add('active');
            nav_menu.classList.add('active');
            shopping_bag.classList.remove('active');
            cart_menu.classList.remove('active');
            if (parseInt(number.innerHTML) != 0)
                number.classList.add('active');
        }
    }

    function user_panel(user_menu, mega_menu, catalog, cart_menu, shopping_bag, number) {
        if (user_menu.classList.contains('active')) {
            user_menu.classList.remove('active');
            id_user.classList.remove('active');
        } else {
            id_user.classList.add('active');
            user_menu.classList.add('active');
            mega_menu.classList.remove('active');
            catalog.classList.remove('active');
            shopping_bag.classList.remove('active');
            cart_menu.classList.remove('active');
            if (parseInt(number.innerHTML) != 0)
                number.classList.add('active');
        }
    }

    function run(url) {
        var script = document.createElement('script');
        script.src = url;
        document.getElementsByTagName('head')[0].appendChild(script);
    }

    run("/js/cart.js")
}

document.addEventListener("DOMContentLoaded", ready());