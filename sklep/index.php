<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./static/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glowna</title>
</head>
<body>

    <?php
        session_start();
        if (isset($_SESSION["logged"])) {
            header("Location: ./pages/main.php");
            die;
        }

        $login = isset($_GET['login']) ? $_GET['login'] : "";
        $password = isset($_GET['pass']) ? $_GET['pass'] : "";
        $input_class = ($login || $password) ? "red_input" : "";

        //$language = isset($_POST['selectedLanguage']) ? $_POST['selectedLanguage'] : "en";
        //echo "wybrany " . $language;
        if (isset($_POST['selectedLanguage'])) {
            $language = $_POST['selectedLanguage'];
            setcookie("language", $language, strtotime("+30 days"));
            $_COOKIE["language"] = $language;
        }
        $language = $_COOKIE["language"] ? $_COOKIE["language"] : "en";
        print_r($language);
    ?>

    <form method="POST">
        <select name="selectedLanguage" onchange="this.form.submit()">
            <option value="en" <?= $language == "en" ? "selected" : "" ?> >EN</option>
            <option value="pl" <?= $language == "pl" ? "selected" : "" ?>>PL</option>
            <option value="de" <?= $language == "de" ? "selected" : "" ?>>DE</option>
        </select>
    </form>

    <form action="./actions/login.php" method="POST">
        <label>
            <?php
                require_once './utils/CMS.php';
                echo CMS::getContent("user");
            ?>
        </label><br/>
        <input class="<?=$input_class?>" type="text" name="login" value="<?=$login?>" required><br/><br/>
        <label><?= CMS::getContent("password") ?>:</label><br/>
        <input class="<?=$input_class?>" type="" name="password" value="<?=$password?>" required><br/><br/>
        <input type="submit" value="<?= CMS::getContent("login") ?>">
    </form>
    <button onclick="location.href='../pages/register.php'"><?= CMS::getContent("register") ?></button>

</body>
</html>

