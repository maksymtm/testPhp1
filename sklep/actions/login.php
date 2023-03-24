<?php
    session_start();
    require_once '../utils/Db.php';

    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $user = Db::getUserByLogin($login);
        //$user = Db::getUserByLoginAndPassword($login, $password);
        if (isset($user['login']) && $user['password'] == $password) {
            $_SESSION['logged'] = true;
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_lastname'] = $user['lname'];
            if ($user['role'] == "admin") {
                $_SESSION['is_admin'] = true;
                header('Location: ../pages/adminPage.php');
            } else {
                $_SESSION['is_admin'] = false;
                header('Location: ../pages/main.php');
            }
        } else {
            header("Location: ../index.php?login=$login&pass=$password");
        }
    }

?>