/* ---------------------------- */
/* --------- BUILD DB --------- */
/* ---------------------------- */

DROP TABLE IF EXISTS article_games;
DROP TABLE IF EXISTS saved_articles;
DROP TABLE IF EXISTS liked_articles;
DROP TABLE IF EXISTS game_genre;
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
    FOREIGN KEY (role) REFERENCES Role(id) ON DELETE CASCADE
);

CREATE TABLE Game (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  description VARCHAR(1000),
  release_date DATE,
  developer VARCHAR(100),
  game_img VARCHAR(255)
);

CREATE TABLE Article (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    title         VARCHAR(255) NOT NULL,
    subtitle      TEXT NOT NULL,
    text        LONGTEXT NOT NULL,
    publication_date  DATE NOT NULL,
    cover_img       VARCHAR(255),
    alt_cover_img   VARCHAR(255) DEFAULT 'article cover image',
    read_time       INT,
    author        VARCHAR(100) NOT NULL,
    game_id INT NOT NULL,
    FOREIGN KEY (author) REFERENCES Person(username) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES Game(id) ON DELETE CASCADE
);

CREATE TABLE liked_articles (
    username      VARCHAR(100),
    article_id      INT,
    PRIMARY KEY (username, article_id),
    FOREIGN KEY (username) REFERENCES Person(username) ON DELETE CASCADE,
    FOREIGN KEY (article_id) REFERENCES Article(id) ON DELETE CASCADE
);

CREATE TABLE saved_articles (
    username      VARCHAR(100),
    article_id      INT,
    PRIMARY KEY (username, article_id),
    FOREIGN KEY (username) REFERENCES Person(username) ON DELETE CASCADE,
    FOREIGN KEY (article_id) REFERENCES Article(id) ON DELETE CASCADE
);

CREATE TABLE Genre (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
);

CREATE TABLE game_genre (
  game_id INT,
  genre_id INT,
  FOREIGN KEY (game_id) REFERENCES Game(id) ON DELETE CASCADE,
  FOREIGN KEY (genre_id) REFERENCES Genre(id) ON DELETE CASCADE,
  PRIMARY KEY(game_id, genre_id)
);

CREATE TABLE Tag (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
);

CREATE TABLE article_tags (
  tag_id INT,
  article_id INT,
  FOREIGN KEY (tag_id) REFERENCES Tag(id) ON DELETE CASCADE,
  FOREIGN KEY (article_id) REFERENCES Article(id) ON DELETE CASCADE,
  PRIMARY KEY (tag_id, article_id)
);