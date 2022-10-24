<?php

if (isCurrentUrl($path)) {
    $class = 'text-orange cursor-default';
} else {
    $class = 'text-gray-600 hover:text-orange';
};
?>

<li class="px-5 py-2"><a class="<?= $class ?>" href="<?= $path ?>"><?= $title ?></a>
</li>


