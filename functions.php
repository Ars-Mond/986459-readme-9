<?php
function get_post_quote_content($post){
	return '<blockquote>
                    <p> ' . $post['content'] . ' </p>
                    <cite>Неизвестный Автор</cite>
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
                        <span>' . $post['content'] . '</span>
                    </a>
                </div>';
}
function get_post_photo_content($post){
	return '<div class="post-photo__image-wrapper">
                    <img src="img/' . $post['content'] . '" alt="Фото от пользователя" width="360" height="240">
                </div>';
}
function get_post_text_content($post){
	 return break_text($post['content'], 300);
}

function get_post_content_by_type($post){
	if ($post['type'] === 'post-quote') {
		return get_post_quote_content($post);
	}
	elseif ($post['type'] === 'post-photo') {
		return get_post_photo_content($post);
	}
	elseif ($post['type'] === 'post-text') {
		return get_post_text_content($post);
	}
	elseif ($post['type'] === 'post-link') {
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