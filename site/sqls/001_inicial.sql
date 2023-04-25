CREATE DATABASE rolles_site COLLATE 'utf8_unicode_ci';

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password CHAR(60) NOT NULL,
    PRIMARY KEY (id)
)
ENGINE = InnoDB;

CREATE TABLE cities (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = InnoDB;

CREATE TABLE rolles ( -- roles é uma palavra reservada do mysql
  id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  city_id INT NOT NULL,
  schedule BOOLEAN NOT NULL DEFAULT 0,
  note INT(1) NOT NULL,
  name VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (city_id) REFERENCES cities(id)
)
ENGINE = InnoDB;

INSERT INTO cities(name) VALUES ('Guarapuava'), ('Maringá'), ('Cascavel');