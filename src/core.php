<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/src/includeTemplate.php';
include $_SERVER['DOCUMENT_ROOT'] . '/src/cutString.php';
include $_SERVER['DOCUMENT_ROOT'] . '/src/arraySort.php';
include $_SERVER['DOCUMENT_ROOT'] . '/src/getMenu.php';
include $_SERVER['DOCUMENT_ROOT'] . '/src/isCurrentUrl.php';
include $_SERVER['DOCUMENT_ROOT'] . '/src/getCars.php';
include $_SERVER['DOCUMENT_ROOT'] . '/src/checkAuthorised.php';
include $_SERVER['DOCUMENT_ROOT'] . '/src/getConnection.php';
include $_SERVER['DOCUMENT_ROOT'] . '/src/queryInsert.php';
include $_SERVER['DOCUMENT_ROOT'] . '/src/querySelect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/src/querySelectId.php';
include $_SERVER['DOCUMENT_ROOT'] . '/src/querySelectGroup.php';
