<?php

function querySelectId($connection, $id)
{

    $id = mysqli_real_escape_string($connection, $id);
    $query = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `users` WHERE id='$id' LIMIT 1"));

    return $query;
}
