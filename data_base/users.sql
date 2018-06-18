
CREATE DATABASE IF NOT EXISTS reseau
DEFAULT CHARACTER SET utf8
COLLATE utf8_general_ci;

USE reseau;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id_user int(11) NOT NULL AUTO_INCREMENT,
  first_name varchar(60) NOT NULL,
  last_name varchar(60) NOT NULL,
  login varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  birthday date NOT NULL,
  gender char(1) NOT NULL,
    
    PRIMARY KEY (id_user)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE users
  ADD UNIQUE KEY fk_login (login);



