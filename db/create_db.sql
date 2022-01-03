/* ---------------------------- */
/* --------- BUILD DB --------- */
/* ---------------------------- */

DROP TABLE IF EXISTS saved_articles;
DROP TABLE IF EXISTS liked_articles;
DROP TABLE IF EXISTS follow;
DROP TABLE IF EXISTS game_genre;
DROP TABLE IF EXISTS favorite_games;
DROP TABLE IF EXISTS article_tags;
DROP TABLE IF EXISTS Article;
DROP TABLE IF EXISTS Person;
DROP TABLE IF EXISTS Role;

DROP TABLE IF EXISTS Game;
DROP TABLE IF EXISTS Genre;
DROP TABLE IF EXISTS Tag;

CREATE TABLE Role (
    id          INT AUTO_INCREMENT,
    title         VARCHAR(100) NOT NULL,
    level         INT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Person (
    username      VARCHAR(100),
    firstName       VARCHAR(100) NOT NULL,
    lastName      VARCHAR(100) NOT NULL,
    email         VARCHAR(255) NOT NULL,
    password      VARCHAR(255) NOT NULL,
    role        INT NOT NULL,
    subscription_date   DATE NOT NULL,
    profile_img       varchar(255),
    PRIMARY KEY (username),
    FOREIGN KEY (role) REFERENCES Role(id)
);

CREATE TABLE follow (
    followed      VARCHAR(100),
    follower      VARCHAR(100),
    PRIMARY KEY (followed, follower),
    FOREIGN KEY (followed) REFERENCES Person(username),
    FOREIGN KEY (follower) REFERENCES Person(username)
);

CREATE TABLE Article (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    title         VARCHAR(255) NOT NULL,
    subtitle      VARCHAR(255),
    text        LONGTEXT NOT NULL,
    publication_date  DATE NOT NULL,
    cover_img       VARCHAR(255),
    read_time       INT,
    is_approved     BOOLEAN DEFAULT FALSE,
    author        VARCHAR(100) NOT NULL,
    FOREIGN KEY (author) REFERENCES Person(username)
);

CREATE TABLE liked_articles (
    username      VARCHAR(100),
    article_id      INT,
    PRIMARY KEY (username, article_id),
    FOREIGN KEY (username) REFERENCES Person(username),
    FOREIGN KEY (article_id) REFERENCES Article(id)
);

CREATE TABLE saved_articles (
    username      VARCHAR(100),
    article_id      INT,
    PRIMARY KEY (username, article_id),
    FOREIGN KEY (username) REFERENCES Person(username),
    FOREIGN KEY (article_id) REFERENCES Article(id)
);

CREATE TABLE Game (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  description VARCHAR(1000),
  release_date DATE,
  developer VARCHAR(100),
  game_img VARCHAR(255)
);

CREATE TABLE Genre (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
);

CREATE TABLE game_genre (
  game_id INT,
  genre_id INT,
  FOREIGN KEY (game_id) REFERENCES Game(id),
  FOREIGN KEY (genre_id) REFERENCES Genre(id),
  PRIMARY KEY(game_id, genre_id)
);

CREATE TABLE Tag (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
);

CREATE TABLE article_tags (
  tag_id INT,
  article_id INT,
  FOREIGN KEY (tag_id) REFERENCES Tag(id),
  FOREIGN KEY (article_id) REFERENCES Article(id),
  PRIMARY KEY (tag_id, article_id)
);

CREATE TABLE favorite_games (
  game_id INT,
  username VARCHAR(100),
  FOREIGN KEY (game_id) REFERENCES Game(id),
  FOREIGN KEY (username) REFERENCES Person(username),
  PRIMARY KEY (game_id, username)
);