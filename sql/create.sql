CREATE TABLE user (
id int NOT NULL AUTO_INCREMENT,
mail varchar(255) NOT NULL,
lastname varchar(50) NOT NULL,
firstname varchar(50) NOT NULL,
password varchar(100) NOT NULL,
propic varchar(255),
activity varchar(100) NOT NULL,
activitypic varchar(255),
resume varchar(255),
supporters int,
PRIMARY KEY(id));
