<?php
include_once('formHandler.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" type="text/css" href="style.css" >
</head>
<body class="bodyFeed">
    <div class="wrap">
        <div class="formWraper">
            <form class="form" name="feedback" method="POST" action="<?php $_SERVER['REQUEST_URI'] ?>">
                <div class="formTitle">Ваше ФИО</div>
                <input class="inputField" type="text" name="user_name" placeholder="Фамилия Имя Отчество" value="<?= AutoCompliteVar($ValidName, $name, $_SESSION['name']) ?>" required>
                <?php
                if ($ValidName) {
                    echo '<p class="message">' . $ValidName . '</p>';
                }
                ?>
                <div class="formTitle">Ваш email</div>
                <input class="inputField" type="email" name="user_email" value="<?= AutoCompliteVar($ValidEmail, $email, $_SESSION['email']) ?>" required>
                <?php
                if ($ValidEmail) {
                    echo '<p class="message">' . $ValidEmail . '</p>';
                }
                ?>
                <div class="formTitle">Ваш № телефона</div>
                <input class="inputField" type="text" name="user_phone" value="<?= AutoCompliteVar($ValidPhone, $phone, $_SESSION['phone']) ?>" required>
                <?php
                if ($ValidPhone) {
                    echo '<p class="message">' . $ValidPhone . '</p>';
                }
                ?>
                <div  class="formTitle">ваша дата рождения</div>
                <input class="inputField" type="date" name="brd_date" value="<?= AutoCompliteVar(NULL, $date, $_SESSION['date']) ?>" required>
                <div  class="formTitle">Сообщение</div>
                <textarea name="message"><?= AutoCompliteVar(NULL, $text, $_SESSION['text']) ?></textarea>
                <div>
                <input class="submitBtn" type="submit" name="submit_btn" value="Отправить">
                <input class="submitBtn" type="submit" name="exit_btn" value="Обновить">
                </div>
                <?php
                if ($_SESSION['massage']
                    && !$ValidName
                    && !$ValidEmail
                    && !$ValidPhone
                ) {
                    echo '<p class="endMessage">' . $_SESSION['massage'] . '</p>';
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
