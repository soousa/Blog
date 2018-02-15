CREATE TABLE register (id INTEGER PRIMARY KEY AUTO_INCREMENT, 
firstname varchar(100) NOT NULL, 
lastname varchar(100) NOT NULL,
email varchar(100) NOT NULL,
password varchar(100) NOT NULL);

INSERT INTO register (firstname, lastname, email, password) VALUES ('The Military Wives', 'In My Dreams','Portugal', 'Etwas');