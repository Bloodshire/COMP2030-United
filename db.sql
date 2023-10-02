SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS TLDR;
CREATE DATABASE TLDR;

USE TLDR;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    UNIQUE (email)
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
INSERT INTO users (email, password, full_name, role_id) VALUES
    ('instructor1@example.com', 'password1', 'Instructor 1', 1),
    ('instructor2@example.com', PASSWORD('password2'), 'Instructor 2', 1),
    ('qsd1@example.com', PASSWORD('password3'), 'QSD 1', 2),
    ('qsd2@example.com', PASSWORD('password4'), 'QSD 2', 2),
    ('student1@example.com', PASSWORD('password5'), 'Student 1', 3), 
    ('student2@example.com', PASSWORD('password6'), 'Student 2', 3); 
