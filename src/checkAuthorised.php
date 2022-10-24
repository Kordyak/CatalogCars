<?php

function checkAuthorised()
{
    if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === true) {
        return true;
    }
    return false;
}
