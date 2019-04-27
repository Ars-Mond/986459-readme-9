<?php
require_once('data.php');
require_once('functions.php');
require_once('helpers.php');

$content = include_template('index.php', ['posts' => $posts]);
echo include_template('layout.php', ['page_content' => $content, 'is_auth' => $is_auth, 'user_name' => $user_name]);

#echo '<pre>';
#echo get_difference_time_text( get_difference_time_unix('26.04.2019 22:00', '26.04.2019 22:31') );
#echo '</pre>';