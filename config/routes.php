<?php

return array(
    'catalog/([a-zA-Z]+)' => 'catalog/category/$1',
    'catalog/([a-zA-Z]+)/page=([0-9]+)' => 'catalog/category/$1/$2',
    'product/([a-zA-Z]+)/([0-9]+)' => 'product/view/$1/$2',

    'register' => 'user/register',
    'login' => 'user/login',
    'logout' => 'user/logout',

    'profile/info' => 'profile/info',
    'profile/orders' => 'profile/orders',

    'basket' => 'basket/index',
    'mybasket' => 'basket/mybasket',

    'about' => 'home/about',
    'delivery' => 'home/delivery',
    'contacts' => 'home/contacts',
    'blog' => 'home/blog',
    'blog/([0-9]+)' => 'home/blogView/$1',
    
    '^$' => 'home/index',
    '(.*)' => 'page404/index',
);