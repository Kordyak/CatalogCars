<div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
    <?php
    foreach ($cars as $car) {
        includeTemplate('car_item.php', $car);
    }
    ?>
</div>