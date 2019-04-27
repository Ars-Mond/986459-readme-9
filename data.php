<?php
date_default_timezone_set('Europe/London');
$is_auth = 1;

$user_name = 'Geogia'; // укажите здесь ваше имя

$posts = [
	[
		'title' => 'Цитата',
		'type' => 'post-quote',
		'content' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
		'user_name' => 'Лариса',
		'profile-picture' => 'userpic-larisa-small.jpg'
	],
	[
		'title' => 'Игра престолов',
		'type' => 'post-text',
		'content' => 'Не могу дождаться начала финального сезона своего любимого сериала! Значимость этих проблем настолько очевидна, что рамки и место обучения кадров требуют от нас анализа соответствующий условий активизации. Товарищи! консультация с широким активом требуют от нас анализа существенных финансовых и административных условий. Таким образом консультация с широким активом способствует подготовки и реализации дальнейших направлений развития.',
		'user_name' => 'Владик',
		'profile-picture' => 'userpic.jpg'
	],
	[
		'title' => 'Наконец, обработал фотки!',
		'type' => 'post-photo',
		'content' => 'rock-medium.jpg',
		'user_name' => 'Виктор',
		'profile-picture' => 'userpic-mark.jpg'
	],
	[
		'title' => 'Моя мечта',
		'type' => 'post-photo',
		'content' => 'coast-medium.jpg',
		'user_name' => 'Лариса',
		'profile-picture' => 'userpic-larisa-small.jpg'
	],
	[
		'title' => 'Лучшие курсы',
		'type' => 'post-link',
		'content' => 'www.htmlacademy.ru',
		'user_name' => 'Владик',
		'profile-picture' => 'userpic.jpg'
	]
];