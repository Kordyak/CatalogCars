<?php

function getConnection()
{
    $host = 'newgrade.vpool';
    $user = 'test';
    $password = 'test';
    $dbname = 'andrei_k_qschool_test';

    static $connection;
    if (null === $connection) {
        $connection = mysqli_connect($host, $user, $password, $dbname);
    }

    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    } else {
        return $connection;
    }
}
