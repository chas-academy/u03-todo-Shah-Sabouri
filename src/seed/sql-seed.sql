CREATE DATABASE if NOT EXISTS "todo";

CREATE TABLE list (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE task (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    isDone tinyint(1) unsigned zerofill NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    list_id int DEFAULT NULL,
    CONSTRAINT fk_list_id FOREIGN KEY (list_id) REFERENCES list(id)
);

INSERT INTO list (title) VALUES
('My list'),
('Another list'),
('A third list');

INSERT INTO task (title, list_id) VALUES
('My task', 1),
('My second task', 1),
('My third task', 1),

('Another task', 2),
('Yet another task', 2),
('Tasks galore', 2),

('Now you just trippin', 3),
('You know you too lazy for all this', 3),
('GTFO', 3);