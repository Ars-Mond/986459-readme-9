<?php
require_once('data.php');
require_once('functions.php');
require_once('helpers.php');

#connection check
if ($mysqli->connect_errno) {
    echo '<pre>';
    echo 'Erorr ' . $mysqli->connect_error;
	echo '</pre>';
	exit;
}

$result = $mysqli->query(
    "SELECT u.name, ps.type_id, ps.title, ps.text, ps.author, ps.photo, ps.video, ps.link, ps.views, u.avatar, ps.created_at 
    FROM posts ps 
    INNER JOIN users u 
    ON ps.user_id = u.id 
    ORDER BY views DESC 
    LIMIT 10;"
);

$posts = $result->fetch_all(MYSQLI_ASSOC);

$sql_types = "SELECT * FROM type_content";
$result = $mysqli->query($sql_types);

while ($row = $result->fetch_assoc()) {
    $types[$row['id']] = $row;
}

$content = include_template('index.php', ['posts' => $posts, 'types' => $types]);
echo include_template('layout.php', ['page_content' => $content, 'is_auth' => $is_auth, 'user_name' => $user_name]);