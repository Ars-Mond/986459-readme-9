USE readme;
INSERT INTO type_content SET id = 1, name = "Текст", class_name = "post-text"; 
INSERT INTO type_content SET id = 2, name = "Цитата", class_name = "post-quote"; 
INSERT INTO type_content SET id = 3, name = "Картинка", class_name = "post-photo"; 
INSERT INTO type_content SET id = 4, name = "Видео", class_name = "post-video"; 
INSERT INTO type_content SET id = 5, name = "Ссылка", class_name = "post-link"; 

INSERT INTO users SET id = 1, email = "lariska@gmail.com", login = "lariska", password = "341be97d9aff90c9978347f66f945b77", name = "Лариса", avatar = "userpic-larisa-small.jpg", created_at = UNIX_TIMESTAMP();
INSERT INTO users SET id = 2, email = "vlada_net@mama.com", login = "vlados", password = "341be97d9aff90c9978347f66f945b77", name = "Владик", avatar = "userpic.jpg", created_at = UNIX_TIMESTAMP();
INSERT INTO users SET id = 3, email = "viktor@cs_go.studio", login = "vika_shmika", password = "341be97d9aff90c9978347f66f945b77", name = "Виктор", avatar = "userpic-mark.jpg", created_at = UNIX_TIMESTAMP();

INSERT INTO posts SET id = 1, user_id = 1, type_id = 2, title = "Цитата", text = "Мы в жизни любим только раз, а после ищем лишь похожих", author = "Неизвестный Автор", views = 24365, created_at = UNIX_TIMESTAMP();
INSERT INTO posts SET id = 2, user_id = 2, type_id = 1, title = "Игра престолов", text = "Не могу дождаться начала финального сезона своего любимого сериала! Значимость этих проблем настолько очевидна, что рамки и место обучения кадров требуют от нас анализа соответствующий условий активизации.", views = 12436, created_at = UNIX_TIMESTAMP();
INSERT INTO posts SET id = 3, user_id = 3, type_id = 3, title = "Наконец, обработал фотки!", photo = "rock-medium.jpg", views = 2365, created_at = UNIX_TIMESTAMP();
INSERT INTO posts SET id = 4, user_id = 1, type_id = 3, title = "Моя мечта", photo = "coast-medium.jpg", views = 4365, created_at = UNIX_TIMESTAMP();
INSERT INTO posts SET id = 5, user_id = 2, type_id = 5, title = "Лучшие курсы", link = "www.htmlacademy.ru", views = 9128365, created_at = UNIX_TIMESTAMP();

INSERT INTO comments SET user_id = 1, post_id = 2, content = "Ура, вышел последний сезон!";
INSERT INTO comments SET user_id = 3, post_id = 3, content = "Снег летом...";
INSERT INTO comments SET user_id = 1, post_id = 4, content = "Тоже туда хочу!";
INSERT INTO comments SET user_id = 1, post_id = 5, content = "Я очень сильно люблю Академию, что прошел все интенсивы.";

/*
Получаю список постов с сортировкой по популярности и вместе с именами авторов и типом контента
*/
SELECT u.id, u.name, tc.name, ps.title, ps.text, ps.author, ps.photo, ps.video, ps.link, ps.views, ps.created_at
FROM posts ps
INNER JOIN users u ON  ps.user_id = u.id
INNER JOIN type_content tc ON ps.type_id = tc.id
ORDER BY views DESC;

/*
Получаю список постов для конкретного пользователя
*/
SELECT * FROM posts WHERE posts.user_id = 1;

/*
Получаю список комментариев для одного поста, в комментариях должен быть логин пользователя
*/
SELECT u.name, cm.post_id, cm.content
FROM comments cm
INNER JOIN users u ON  cm.user_id = u.id
WHERE cm.post_id = 5;

/*
добавляю лайк к посту
*/
INSERT INTO likes SET user_id = 1, post_id = 5;

/*
подписываюсь на пользователя
*/
INSERT INTO subscriptions SET user_id = 1, whom_id = 2;