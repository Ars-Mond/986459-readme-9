<?php

function get_post_quote_content($post){
	return '<blockquote>
                    <p> ' . $post['text'] . ' </p>
                    <cite>' . $post['author'] . '</cite>
                </blockquote>';
}

function get_post_link_content($post){
	return '<div class="post-link__wrapper">
                    <a class="post-link__external" href="http://" title="Перейти по ссылке">
                        <div class="post-link__info-wrapper">
                            <div class="post-link__icon-wrapper">
                                <img src="img/logo-vita.jpg" alt="Иконка">
                            </div>
                            <div class="post-link__info">
                                <h3>' . $post['title'] . '</h3>
                            </div>
                        </div>
                        <span>' . $post['link'] . '</span>
                    </a>
                </div>';
}

function get_post_photo_content($post){
	return '<div class="post-photo__image-wrapper">
                    <img src="img/' . $post['photo'] . '" alt="Фото от пользователя" width="360" height="240">
                </div>';
}
function get_post_text_content($post){
	 return break_text($post['text'], 300);
}

function get_post_content_by_type($post, $types){
	if ($types[$post['type_id']]['class_name'] === 'post-quote') {
		return get_post_quote_content($post);
	}
	elseif ($types[$post['type_id']]['class_name'] === 'post-photo') {
		return get_post_photo_content($post);
	}
	elseif ($types[$post['type_id']]['class_name'] === 'post-text') {
		return get_post_text_content($post);
	}
	elseif ($types[$post['type_id']]['class_name'] === 'post-link') {
		return get_post_link_content($post);
	}
	else {
		return 'Error: File not Found';
	}
}

function break_text($str, $value) {
	if (mb_strlen($str, 'UTF-8') > $value) {
		$str = mb_substr($str, 0, $value, 'UTF-8');
		$str = mb_substr($str, 0, mb_strrpos($str, ' ', 'UTF-8'), 'UTF-8');
		return '<p>' . $str . '... ' . '</p>' . '<a class="post-text__more-link" href="#">Читать далее</a>';
	}
	else {
		return '<p>' . $str . '</p>';
	}
}

/**
 * Возвращает время или дату разнецы
 *
 * Пример использования:
 * 
 * 
 *
 * @param int $time_unix Разница времяни (между датами) 
 * 
 * @return string 
 */
function get_date_format(int $time_unix): string 
{
	if (($time_unix / 60) < 60) {

		$time_unix_temp = floor($time_unix / 60);

		return  $time_unix_temp . ' ' . get_noun_plural_form($time_unix_temp, 'минута', 'минуты', 'минут');

	}
	else if (($time_unix / 60) >= 60 && ($time_unix / 3600) < 24) {

		$time_unix_temp = floor($time_unix / 3600);

		return  $time_unix_temp . ' ' . get_noun_plural_form($time_unix_temp, 'час', 'часа', 'часов');

	}
	else if (($time_unix / 3600) >= 24 && ($time_unix / 86400) < 7) {

		$time_unix_temp = floor($time_unix / 86400);

		return  $time_unix_temp . ' ' . get_noun_plural_form($time_unix_temp, 'день', 'дня', 'дней');

	}
	else if (($time_unix / 86400) >= 7 && ($time_unix / 604800) < 5) {

		$time_unix_temp = floor($time_unix / 604800);

		return  $time_unix_temp . ' ' . get_noun_plural_form($time_unix_temp, 'неделя', 'недели', 'недель');

	}
	else if (($time_unix / 604800) >= 5) {

		$time_unix_temp = floor($time_unix / 2629743);

		return  $time_unix_temp . ' ' . get_noun_plural_form($time_unix_temp, 'месяц', 'месяца', 'месяцев');

	}
}