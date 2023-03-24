<?php
    session_start();
    if (!isset($_SESSION['logged']) || !$_SESSION['is_admin']) {
        header("Location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../static/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Uzytkownik: <?=$_SESSION['user_name']?> <?=$_SESSION['user_lastname']?>
    <button onclick="location.href='../actions/logout.php'">Wyloguj</button>
    <table>
        <tr>
            <th>id</th>
            <th>login</th>
            <th>password</th>
            <th>name</th>
            <th>lastname</th>
            <th>role</th>
            <th>age</th>
            <th></th>
            <th></th>
            <th>isAdmin</th>
        </tr>
        <?php
            require_once '../utils/Db.php';
            $users = DB::getAllUsers();
            foreach($users as $user) {
                $id = $user['id'];
                $is_admin_checked = ($user['role'] === "admin") ? "checked" : "";
                echo "<form action='../actions/changeRole.php' method='POST'>"
                        ."<input name='id' value='$id' hidden/>"
                        ."<tr>"
                            ."<td name='id'>$id</td>"
                            ."<td>{$user['login']}</td>"
                            ."<td>{$user['password']}</td>"
                            ."<td>{$user['name']}</td>"
                            ."<td>{$user['lname']}</td>"
                            ."<td>{$user['role']}</td>"
                            ."<td>{$user['age']}</td>"
                            ."<td><button>Edytuj</button></td>"
                            ."<td>"
                                ."<a href='../actions/removeUser.php?id=$id'>"
                                    ."<button>Usun</button>"
                                ."</a>"
                            ."</td>"
                            ."<td><input onChange='this.form.submit()' type='checkbox'  $is_admin_checked></td>"
                        ."</tr>"
                    ."</form>";
            }
        ?>
        
    </table>
    

</body>
</html>