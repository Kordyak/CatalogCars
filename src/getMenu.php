<?php

function getMenu()
{
    $menu = [
        [
            'title' => 'Главная',
            'path' => '/',
            'sort' => 0,
            'access' => 1
        ],
        [
            'title' => 'Раздел 1',
            'path' => '/chapter1/',
            'sort' => 1,
            'access' => 1
        ],
        [
            'title' => 'Раздел 2',
            'path' => '/chapter2/',
            'sort' => 2,
            'access' => 1
        ],
        [
            'title' => 'Раздел 3',
            'path' => '/chapter3/',
            'sort' => 3,
            'access' => 1
        ],
        [
            'title' => 'Каталог',
            'path' => '/catalog/',
            'sort' => 4,
            'access' => 0
        ],
    ];

    $menu1 = [];
    foreach ($menu as $item) {
        if ($item['access']) {
            $menu1[] = $item;
        }
    }

    if (!checkAuthorised() || isset($_GET['exit'])) {
        $menu = $menu1;
    }
    return $menu;
}
