CREATE TABLE posts (
id int NOT NULL AUTO_INCREMENT, 
title varchar(100) NOT NULL, 
text TEXT NOT NULL,
PRIMARY KEY (ID)
);

INSERT INTO posts (title, text) VALUES ('Blog #1', 'Welcome to my first blog post');
INSERT INTO posts (title, text) VALUES ('Blog #2', 'Welcome to my second blog post');
INSERT INTO posts (title, text) VALUES ('Blog #3', 'Welcome to my third blog post');
INSERT INTO posts (title, text) VALUES ('Blog #4', 'Welcome to my fourth blog post');
INSERT INTO posts (title, text) VALUES ('Blog #5', 'Welcome to my fifth blog post');