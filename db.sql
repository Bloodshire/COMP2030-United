SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS TLDR;
CREATE DATABASE TLDR;

USE TLDR;

CREATE TABLE Account(
    account_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    accType VARCHAR(10) NOT NULL
) AUTO_INCREMENT = 1;

CREATE TABLE Logbook (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    approved BIT DEFAULT 0,
    learner_id INT NOT NULL,
    QSD_id INT NULL,
    instructor_id INT NULL,
    date DATE NOT NULL,
    startTime TIME NOT NULL,
    finishTime TIME NOT NULL,
    duration INT NOT NULL,
    from_location VARCHAR(255) NOT NULL,
    to_location VARCHAR(255) NOT NULL,
    road_condition VARCHAR(255) NOT NULL,
    weather_condition VARCHAR(255) NOT NULL,
    traffic_condition VARCHAR(255) NOT NULL,
    FOREIGN KEY (learner_id) REFERENCES Learner(learner_id),
    FOREIGN KEY (QSD_id) REFERENCES QSD(QSD_id),
    FOREIGN KEY (instructor_id) REFERENCES Instructor(instructor_id)
);

CREATE TABLE Instructor (
    instructor_id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT NOT NULL,
    licenceNo VARCHAR(255) NOT NULL,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    FOREIGN KEY (account_id) REFERENCES Account(account_id)
);

CREATE TABLE Learner (
    learner_id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT NOT NULL,
    permitNo VARCHAR(255) NOT NULL,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    foreignCountry VARCHAR(255) NULL,
    yearsHeld INT NULL,
    FOREIGN KEY (account_id) REFERENCES account(account_id)
);

CREATE TABLE QSD (
    QSD_id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT NOT NULL,
    licenceNo VARCHAR(255) NOT NULL,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    FOREIGN KEY (account_id) REFERENCES account(account_id) 
);

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON TLDR.Account TO dbadmin@localhost;
GRANT all privileges ON TLDR.Logbook TO dbadmin@localhost;
GRANT all privileges ON TLDR.Learner TO dbadmin@localhost;
GRANT all privileges ON TLDR.Instructor TO dbadmin@localhost;
GRANT all privileges ON TLDR.QSD TO dbadmin@localhost;


-- INSERT INTO Task(name) VALUES('Complete Checkpoint 1');
-- INSERT INTO Task(name) VALUES('Complete Checkpoint 2');
-- INSERT INTO Task(name) VALUES('Complete Checkpoint 3');
-- INSERT INTO Task(name) VALUES('Complete Checkpoint 4');
-- INSERT INTO Task(name) VALUES('Complete Checkpoint 5');
    