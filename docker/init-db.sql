CREATE DATABASE IF NOT EXISTS `yektadg_db`;

CREATE TABLE IF NOT EXISTS 'users'
(
    id INTEGER PRIMARY KEY NOT NULL,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL ,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(20) NOT NULL,
    avatar VARCHAR(250) NULL,
    remember_token VARCHAR (120) NULL ,
    remember_identifier VARCHAR (120) NULL ,
    created_at DATE DEFAULT CURRENT_DATE() NOT NULL,
    updated_at DATE DEFAULT CURRENT_DATE() NOT NULL
) ENGINE=INNODB;
