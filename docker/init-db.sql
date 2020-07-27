CREATE DATABASE IF NOT EXISTS `yektadg_db`;

CREATE TABLE IF NOT EXISTS `yektadg_db`.`users`
(
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL ,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(200) NOT NULL,
    avatar VARCHAR(250) NULL,
    remember_token VARCHAR (180) NULL ,
    remember_identifier VARCHAR (180) NULL ,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=INNODB;
