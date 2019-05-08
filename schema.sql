CREATE DATABASE IF NOT EXISTS readme;

USE readme;

CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE,
    name VARCHAR(255),
    password VARCHAR(255),
    avatar VARCHAR(255),
    contacts TEXT,
    created_at INT(11)
);

CREATE TABLE IF NOT EXISTS type_content (
    name VARCHAR(255),
    class_name VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS posts (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER,
    title VARCHAR(255),
    text TEXT,
    author VARCHAR(255),
    photo VARCHAR(255),
    video VARCHAR(255),
    link VARCHAR(255),
    views INT UNSIGNED,
    created_at INT(11)
);

CREATE TABLE IF NOT EXISTS comments (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    post_id INTEGER,
    content TEXT
);

CREATE TABLE IF NOT EXISTS likes (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER,
    post_id INTEGER
);

CREATE TABLE IF NOT EXISTS subscription (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER,
    whom_id INTEGER
);

CREATE TABLE IF NOT EXISTS messages (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER,
    whom_id INTEGER,
    content TEXT
);

CREATE TABLE IF NOT EXISTS hashtag (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER,
    post_id INTEGER
);

CREATE INDEX user_created_at ON users(created_at);
CREATE INDEX post_created_at ON posts(created_at);
CREATE INDEX post_user_id ON posts(user_id);
CREATE INDEX comments_post_id ON comments(post_id);