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
  name VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  horary BOOLEAN NOT NULL DEFAULT 0,
  classification INT(1) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (city_id) REFERENCES cities(id)
)
ENGINE = InnoDB;

INSERT INTO cities(name) VALUES ('Guarapuava'), ('Maringá'), ('Cascavel');

-- erro
-- INSERT INTO rolles
-- (
--   user_id,
--   city_id,
--   name,
--   description,
--   horary,
--   classification
-- )
-- VALUES
--   (1, 3, 'Santo Andre', 'fvvsdvsvfvsvfv', 1, 0),
--   (1, 2, 'SP', 'fvvsdvsvfvsvfv', 0, 3),
--   (1, 1, 'SantoS', 'fvvsdvsvfvsvfv', 1, 4);