<?php
require_once('data.php');
require_once('functions.php');
require_once('helpers.php');

$content = include_template('index.php', ['posts' => $posts]);
echo include_template('layout.php', ['page_content' => $content, 'is_auth' => $is_auth, 'user_name' => $user_name]);