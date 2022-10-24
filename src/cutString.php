<?php

function cutString($line, $length = 15, $appends = '...'): string
{
    if (strlen($line) > $length) {
        return mb_substr($line, 0, 12) . $appends;
    } else {
        return $line;
    }
}
