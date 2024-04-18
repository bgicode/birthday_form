<?php
declare(strict_types = 1);

session_start();

include_once('functions.php');

if ($_POST['submit_btn']) {
    $name = trim($_POST['user_name']);
    $email = trim($_POST['user_email']);
    $phone = trim($_POST['user_phone']);
    $date = $_POST['brd_date'];

    $text = trim(htmlspecialchars($_POST['message']));

    $regExName = '/^[А-Яа-я][а-я]+(\s[А-Яа-я][а-я]+){2}$/u';
    $regExEmail = '/[-0-9a-z_\.]+@[-0-9a-z^\.]+\.[a-z]{2,}/i';
    $regExPhone ='/^((\+7|7|8)+([0-9]){10})$/';

    $ValidName = Validation($regExName, $name);
    $ValidEmail = Validation($regExEmail, $email);
    $ValidPhone = Validation($regExPhone, $phone);

    if (!$ValidName
        && !$ValidEmail
        && !$ValidPhone
    ) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['date'] = $date;
        $_SESSION['text'] = $text;

        $message = $name . DaysBeforeBirhday($date);

        $_SESSION['massage'] = $message;
        
        header('Location: index.php');
    }
}

if ($_POST['exit_btn']) {
    $_SESSION = [];
    unset($_COOKIE[session_name()]);
    session_destroy();
    header('Location: index.php');
}
