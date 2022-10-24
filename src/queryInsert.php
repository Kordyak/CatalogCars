<?php

function queryInsert($connection, $name, $email, $password)
{

    $name = mysqli_real_escape_string($connection, $name);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    return "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$name', '$email', '$password')";
}
