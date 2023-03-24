<?php
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
        header("Location: ../index.php");
    }


    require_once '../utils/Db.php';
    if (isset($_GET['id'])) {
        DB::removeUser($_GET['id']);
        header("Location: ../pages/adminPage.php");
    }

?>