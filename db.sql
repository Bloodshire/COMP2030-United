SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS TLDR;
CREATE DATABASE TLDR;

USE TLDR;

CREATE TABLE Task(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(100),
    completed boolean NOT NULL DEFAULT 0,
    updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) AUTO_INCREMENT = 1;

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON Practical3.Task TO dbadmin@localhost;

-- INSERT INTO Task(name) VALUES('Complete Checkpoint 1');
-- INSERT INTO Task(name) VALUES('Complete Checkpoint 2');
-- INSERT INTO Task(name) VALUES('Complete Checkpoint 3');
-- INSERT INTO Task(name) VALUES('Complete Checkpoint 4');
-- INSERT INTO Task(name) VALUES('Complete Checkpoint 5');
    