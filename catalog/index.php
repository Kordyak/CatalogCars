<?php
include $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';
if (checkAuthorised() == false) {
    header('Location: /login/');
}

$cars = getCars();
includeTemplate('header.php', ['title' => 'Каталог']);
includeTemplate('cars_catalog.php', ['cars' => $cars]);
includeTemplate('footer.php', []);
