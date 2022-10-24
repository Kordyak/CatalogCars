<?php
include $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';
if (checkAuthorised() == true) {
    header('Location: /');
}

$success = false;
$error = false;
$templatePath = 'messages/error_message.php';
$data = ['message' => 'Неверно указан логин или пароль'];

if (!empty($_POST)) {
    if (isset($_POST['enter'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $error = true;
            $_SESSION['authorized'] = false;
        } else {
            $connection = getConnection();
            $user = querySelect($connection, $_POST['email']);

            if ($user && !$user['is_disabled'] && password_verify($_POST['password'], $user['password'])) {
                $success = true;
                $templatePath = 'messages/success_message.php';
                $data = ['message' => 'Вы успешно авторизовались'];
                $_SESSION['authorized'] = true;
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['username'];
                setcookie('email', $_POST['email'], time() + 60 * 60 * 24 * 30, '/');
            } elseif ($user && $user['is_disabled'] && $_POST['password'] == $user['password']) {
                $error = true;
                $data = ['message' => 'Доступ запрещен'];
            } else {
                $error = true;
                $_SESSION['authorized'] = false;
            };
        }
    }
}

if (checkAuthorised() && isset($_COOKIE['email'])) {
    setcookie('email', $_COOKIE['email'], time() + 60 * 60 * 24 * 30, '/');
}


includeTemplate('header.php', ['title' => 'Авторизация']);

if ($success) {
    includeTemplate($templatePath, $data);
} elseif ($error) {
    includeTemplate($templatePath, $data);
}
?>


<form action="" method="post">
    <div class="mt-8 max-w-md">
        <div class="grid grid-cols-1 gap-6">
            <div class="block">
                <label for="fieldEmail" class="text-gray-700 font-bold">Email</label>
                <input id="fieldEmail" name="email" type="email"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       placeholder="john@example.com"
                       value="<?= $_POST['email'] ?? '' ?>">
                <!--                ($_COOKIE['email'] ?? '')-->
            </div>
            <div class="block">
                <label for="fieldPassword" class="text-gray-700 font-bold">Пароль</label>
                <input id="fieldPassword" name="password" type="password"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       placeholder="******">
            </div>
            <div class="block">
                <button type="submit"
                        class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded"
                        name="enter">
                    Войти
                </button>
                <a href="/register/"
                   class="inline-block hover:underline focus:outline-none font-bold py-2 px-4 rounded">
                    У меня нет аккаунта
                </a>
            </div>
        </div>
    </div>
</form>
</div>
</main>
<?= includeTemplate('footer.php', ['']); ?>
