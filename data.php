<?php
date_default_timezone_set('Europe/London');
$is_auth = 1;
$types = [];
$posts = [];

$user_name = 'Geogia'; // укажите здесь ваше имя

$mysqli = new mysqli(
    'localhost',
    'root',
    '',
    'readme'
);