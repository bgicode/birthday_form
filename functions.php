<?php

function validation(string $regEx, string $field): string
{
    if (preg_match($regEx, $field)) {
        $message = '';
    } else {
        $message = 'неверно введено';
    }

    return $message;
}

function validationAllRes(string $value1, string $value2, string $value3): bool
{
    if (empty($value1) && empty($value2) && empty($value3)) {
        return true;
    } else {
        return false;
    }
}

function autoComplete(mixed $field): string
{
    if ($field) {
        return $field;
    } else {
        return '';
    }
}

function autoCompleteVar(mixed $param, mixed $error = '', mixed $success = ''): string
{
    if (!$param) {
        return autoComplete($error);
    } elseif ($param) {
        return autoComplete($success);
    } else {
        return '';
    }
}

function getMessage(string $date): string
{
    $birhday = date('d.m', strtotime($date));

    if ($birhday == date('d.m')) {
        $message = ", Поздравляем с Днём Рождения!";

    } else {
        $nowYear = date('Y');
        $nowDate = new DateTime();
        $brdDate = new DateTime($birhday . "." . $nowYear);

        if ($nowDate > $brdDate) {
            $brdDate->modify("+1 year");
        }

        $days = date_diff($brdDate, $nowDate)->format('%a');

        $message = ", до вашего дня рождения осталось " . $days . " дней";
    }

    return $message;
}
