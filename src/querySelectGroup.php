<?php

function querySelectGroup($connection, $id)
{
    $id = mysqli_real_escape_string($connection, $id);
    $query = mysqli_query(
        $connection,
        "SELECT `name`, `description`
        FROM `groups` JOIN `group_user` ON groups.id = group_user.group_id
            WHERE user_id='{$id}'"
    );
    $groups = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $groups[] = $row;
    }
    return $groups;
}
