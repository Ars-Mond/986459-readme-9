CREATE DATABASE IF NOT EXISTS readme;

USE readme;

CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    login VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255)NOT NULL,
    avatar VARCHAR(255),
    contacts TEXT,
    created_at INT(11) NOT NULL
);

CREATE TABLE IF NOT EXISTS type_content (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    class_name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS posts (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER NOT NULL,
    type_id INTEGER NOT NULL,
    title VARCHAR(255),
    text TEXT,
    author VARCHAR(255),
    photo VARCHAR(255),
    video VARCHAR(255),
    link VARCHAR(255),
    views INT UNSIGNED,
    created_at INT(11) NOT NULL
);

CREATE TABLE IF NOT EXISTS comments (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER NOT NULL,
    post_id INTEGER NOT NULL,
    content TEXT
);

CREATE TABLE IF NOT EXISTS likes (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER NOT NULL,
    post_id INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS subscriptions (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER NOT NULL,
    whom_id INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS messages (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER NOT NULL,
    whom_id INTEGER NOT NULL,
    content TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS hashtags (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER NOT NULL,
    post_id INTEGER NOT NULL
);

CREATE INDEX user_created_at ON users(created_at);
CREATE INDEX post_created_at ON posts(created_at);
CREATE INDEX post_user_id ON posts(user_id);
CREATE INDEX comments_post_id ON comments(post_id);