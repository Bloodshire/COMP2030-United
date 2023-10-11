SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS TLDR;
CREATE DATABASE TLDR;

USE TLDR;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    given_name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    date_of_birth DATE NOT NULL,
    street_address VARCHAR(255) NOT NULL,
    suburb VARCHAR(50) NOT NULL,
    state VARCHAR(50) NOT NULL,
    postcode VARCHAR(10) NOT NULL,
    license_no VARCHAR(50) NOT NULL,
    role_id INT NOT NULL,
    instructor_id INT,
    UNIQUE (email),
    FOREIGN KEY (instructor_id) REFERENCES users(user_id)
);



CREATE TABLE roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL
);

CREATE TABLE logbook (
    entry_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    approver_id INT NOT NULL,
    date DATE NOT NULL,
    start_time TIME NOT NULL,
    finish_time TIME NOT NULL,
    duration INT NOT NULL,
    from_location VARCHAR(255) NOT NULL,
    to_location VARCHAR(255) NOT NULL,
    road_condition VARCHAR(255) NOT NULL,
    weather_condition VARCHAR(255) NOT NULL,
    traffic_condition VARCHAR(255) NOT NULL,
    FOREIGN KEY (student_id) REFERENCES users (user_id),
    FOREIGN KEY (approver_id) REFERENCES users (user_id)
);

CREATE TABLE approvals (
    approval_id INT AUTO_INCREMENT PRIMARY KEY,
    logbook_entry_id INT NOT NULL,
    approver_id INT NOT NULL,
    approval_date DATE NOT NULL,
    approved BOOLEAN NOT NULL,
    FOREIGN KEY (logbook_entry_id) REFERENCES logbook (entry_id),
    FOREIGN KEY (approver_id) REFERENCES users (user_id)
);

CREATE TABLE pending_entries (
    pending_entry_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    approver_id INT NOT NULL,
    entry_date DATE NOT NULL,
    activity_description TEXT NOT NULL,
    submitted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES users (user_id),
    FOREIGN KEY (approver_id) REFERENCES users (user_id)
);

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON TLDR.users TO dbadmin@localhost;
GRANT all privileges ON TLDR.roles TO dbadmin@localhost;
GRANT all privileges ON TLDR.logbook TO dbadmin@localhost;
GRANT all privileges ON TLDR.pending_entries TO dbadmin@localhost;

-- Insert users into the 'roles' table
INSERT INTO roles (role_name) VALUES
    ('Instructor'),
    ('Qualified Supervisor Driver'),
    ('Student');

-- Insert users into the 'users' table with their respective roles and hashed passwords
INSERT INTO users (email, password, given_name, surname, date_of_birth, street_address, suburb, state, postcode, license_no, role_id)
VALUES
    ('instructor1@example.com', '$2y$10$mrKQy6U46EC9cGdebUe7zeFsVoeG6yvC5.BJ/a1bTXXvKvXdDUx3G', 'Hans', 'Zimmer', '1980-01-15', '123 Main St', 'Hendon', 'CA', '90210', 'FN1023', 1),
    ('instructor2@example.com', '$2y$10$mrKQy6U46EC9cGdebUe7zeFsVoeG6yvC5.BJ/a1bTXXvKvXdDUx3G', 'Christopher', 'Nolan', '1975-07-30', '456 Elm St', 'Hendon', 'NY', '10001', 'FN7829', 1),
    ('qsd1@example.com', '$2y$10$JvTv5GkQhn5TB89e23lapuqs/0cMzTW0lr6A8FgcUWMLYEq1ab.Ei', 'James', 'Cameron', '1982-03-22', '789 Oak St', 'TX', 'Hendon', '77002', 'FN2710', 2),
    ('qsd2@example.com', '$2y$10$JvTv5GkQhn5TB89e23lapuqs/0cMzTW0lr6A8FgcUWMLYEq1ab.Ei', 'Michael', 'Bay', '1978-12-10', '101 Pine St', 'FL', 'Hendon', '33001', 'FN7291', 2);


INSERT INTO users (email, password, given_name, surname, date_of_birth, street_address, suburb, state, postcode, license_no, role_id, instructor_id)
VALUES
    ('student1@example.com', '$2y$10$Yt2kewZAyQC.ywQkUA9NIu88LGuB3avxobGmQtpB18WUwrkpObO6K', 'Michael', 'Kayal', '1995-05-20', '111 Cedar St', 'Hendon', 'CA', '90210', 'FN8972', 3, 1),
    ('student2@example.com', '$2y$10$Yt2kewZAyQC.ywQkUA9NIu88LGuB3avxobGmQtpB18WUwrkpObO6K', 'Harrison', 'Reeve', '1993-09-12', '222 Maple St', 'Conolly', 'NY', '10001', 'FN0908', 3, 2);

