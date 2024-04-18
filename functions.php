<?php

function Validation(string $regEx, string $field): mixed
{
    if (preg_match($regEx, $field)) {
        $message = false;
    } else {
        $message = 'неверно введено';
    }

    return $message;
}

function AutoComplite(mixed $field): string
{
    if ($field) {
        return $field;
    } else {
        return '';
    }
}

function AutoCompliteVar(mixed $param = NULL, mixed $error = '', mixed $success = ''): string
{
    if (is_string($param)) {
        return AutoComplite($error);
    } elseif (!$param) {
        return AutoComplite($success);
    } else {
        return '';
    }
}

function DaysBeforeBirhday(string $date): string
{
    $birhday = date('d.m' ,strtotime($date));

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