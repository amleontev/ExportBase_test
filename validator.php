<?php
session_start();
if($_POST['capcha'] != $_SESSION['capcha'])
    echo "Текст с картинки введен не верно!";
else
$redicet = $_SERVER['HTTP_REFERER'];
@header ("Location: $redicet");