<?php

function querySelect($connection, $email)
{

    $email = mysqli_real_escape_string($connection, $email);
    $query = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `users` WHERE email='$email' LIMIT 1"));
    return $query;
}
