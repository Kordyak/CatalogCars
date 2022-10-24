<?php
include $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';
includeTemplate('header.php', ['title' => 'Личный кабинет']);

if (checkAuthorised() == false) {
    header('Location: /login/');
}

$connection = getConnection();
$user = querySelectId($connection, $_SESSION['id']);
$groups = querySelectGroup($connection, $_SESSION['id']);

?>

    <div class="space-y-2">
        <div class="space-y-2 pb-4 border-b">
            <p class="text-xl">Мои профиль</p>

            <div class="flex max-w-xl">
                <div class="flex-1 border px-4 py-2 bg-gray-200 font-bold">ФИО</div>
                <div class="flex-1 border px-4 py-2"><?= $user['username'] ?></div>
            </div>
            <div class="flex max-w-xl">
                <div class="flex-1 border px-4 py-2 bg-gray-200 font-bold">Email</div>
                <div class="flex-1 border px-4 py-2"><?= $user['email'] ?></div>
            </div>
            <div class="flex max-w-xl">
                <div class="flex-1 border px-4 py-2 bg-gray-200 font-bold">Телефон</div>
                <div class="flex-1 border px-4 py-2"><?= $user['phone'] ?></div>
            </div>
            <div class="flex max-w-xl">
                <div class="flex-1 border px-4 py-2 bg-gray-200 font-bold">Активность</div>
                <div class="flex-1 border px-4 py-2"><?= $user['is_disabled'] == 0 ? 'Да' : 'Нет' ?></div>
            </div>
            <div class="flex max-w-xl">
                <div class="flex-1 border px-4 py-2 bg-gray-200 font-bold">Подписан на рассылку</div>
                <div class="flex-1 border px-4 py-2"><?= $user['is_notification'] == 1 ? 'Да' : 'Нет' ?></div>
            </div>
        </div>
    </div>

    <div class="space-y-2">
        <p class="text-xl">Мои группы</p>

        <ul class="list-inside list-disc">
            <?php
            foreach ($groups as $group) {
                includeTemplate('groups.php', $group);
            }
            ?>
        </ul>
    </div>
<?= includeTemplate('footer.php', []) ?>