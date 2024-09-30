<?php
include SITE_ROOT . "/app/database/db.php";

$errMsg = [];

function userAuth($user) {
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    if ($_SESSION['admin']) {
        header('location: ' . "index.php");
    } else {
        header('location: ' . "index.php");
    }
}

$users = selectAll('users');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if ($login === '' || $email === '' || $passF === '') {
        array_push($errMsg, "Не всі поля заповнені!");
    } elseif (mb_strlen($login, 'UTF8') < 3) {
        array_push($errMsg, "Логін повинен бути більше 2 символів!");
    } elseif (!preg_match('/[0-9]/', $passF)) {
        array_push($errMsg, "Пароль повинен містити хоча б одну цифру!");
    } elseif (!preg_match('/[A-Z]/', $passF)) {
        array_push($errMsg, "Пароль повинен містити хоча б одну велику літеру!");
    } elseif (!preg_match('/[a-z]/', $passF)) {
        array_push($errMsg, "Пароль повинен містити хоча б одну малу літеру!");
    } elseif (!preg_match('/[\W_]/', $passF)) {
        array_push($errMsg, "Пароль повинен містити хоча б один спеціальний символ (наприклад, !, @, #, $, % тощо)!");
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && isset($existence['email']) && $existence['email'] === $email) {
            $errMsg[] = "Користувач з такою поштою уже зареєстровано!";
        } else {
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);
            if ($user) {
                userAuth($user);
            } else {
                array_push($errMsg, "Не вдалося отримати користувача після реєстрації.");
            }
        }
    }
} else {
    $login = '';
    $email = '';
}

// Код для форми авторизації
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {

    $email = trim($_POST['mail']);
    $pass = trim($_POST['password']);

    if ($email === '' || $pass === '') {
        array_push($errMsg, "Не все поля заповнені!");
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && password_verify($pass, $existence['password'])) {
            userAuth($existence);
        } else {
            array_push($errMsg, "Почта або пароль введені неверно!");
        }
    }
} else {
    $email = '';
}

// Код додавання користувача в адмінці
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])) {

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if ($login === '' || $email === '' || $passF === '') {
        array_push($errMsg, "Не всі поля заповнені!");
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        array_push($errMsg, "Логін повинен бути довшим ніж 2 символа!");
    } elseif ($passF !== $passS) {
        array_push($errMsg, "Паролі не співпадають!");
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && isset($existence['email']) && $existence['email'] === $email) {
            array_push($errMsg, "Користувач з такою поштою уже зареєстровано");
        } else {
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin = 1;
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id]);
            if ($user) {
                userAuth($user);
            } else {
                array_push($errMsg, "Не вдалося отримати користувача після створення.");
            }
        }
    }
} else {
    $login = '';
    $email = '';
}

// Код видалення користувача в адмінці
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location:' . BASE_URL . 'admin/users/index.php');
}

// Редагування користувача через адмінку
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])) {
    $user = selectOne('users', ['id' => $_GET['edit_id']]);

    // Додайте перевірку на існування користувача
    if ($user) {
        $id = $user['id'];
        $admin = $user['admin'];
        $username = $user['username'];
        $email = $user['email'];
    } else {
        array_push($errMsg, "Користувача не знайдено!");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])) {

    $id = $_POST['id'];
    $mail = trim($_POST['mail']);
    $login = trim($_POST['login']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $admin = isset($_POST['admin']) ? 1 : 0;

    if ($login === '') {
        array_push($errMsg, "Не всі поля заповнені!");
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        array_push($errMsg, "Логін повинен бути довшим ніж 2 символа!");
    } elseif ($passF !== $passS) {
        array_push($errMsg, "Паролі не співпадають!");
    } else {
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        if (isset($_POST['admin'])) $admin = 1;
        $userData = [
            'admin' => $admin,
            'username' => $login,
            'password' => $pass
        ];

        // Перевірка на існування користувача перед оновленням
        $existingUser = selectOne('users', ['id' => $id]);
        if ($existingUser) {
            update('users', $id, $userData);
            header('location: ' . BASE_URL . 'admin/users/index.php');
        } else {
            array_push($errMsg, "Користувача не знайдено для оновлення.");
        }
    }
} else {
    // Додайте перевірки на існування даних для редагування
    if (isset($user)) {
        $id = $user['id'];
        $admin = $user['admin'];
        $username = $user['username'];
        $email = $user['email'];
    }
}
?>
