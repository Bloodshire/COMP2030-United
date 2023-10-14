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

CREATE TABLE cbta_progress (
    student_id INT NOT NULL,
    cbta_unit INT NOT NULL,
    cbta_task INT NOT NULL,
    completion_status BOOLEAN NOT NULL,
    completion_date DATE,
    approver_id INT NOT NULL,
    FOREIGN KEY (student_id) REFERENCES users(user_id),
    FOREIGN KEY (approver_id) REFERENCES users(user_id) -- Reference to the instructor who approved the unit/task
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
    approved TINYINT(1) NOT NULL,
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

CREATE TABLE payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    instructor_id INT NOT NULL,
    student_id INT NOT NULL,
    invoice_amount DECIMAL(10, 2) NOT NULL,
    due_date DATE NOT NULL,
    payment_status TINYINT(1) NOT NULL, -- 0 = Outstanding payment; 1 = Paid; 2 = Unpaid and expired;
    description TEXT,
    FOREIGN KEY (instructor_id) REFERENCES users(user_id),
    FOREIGN KEY (student_id) REFERENCES users(user_id)
);

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON TLDR.users TO dbadmin@localhost;
GRANT all privileges ON TLDR.roles TO dbadmin@localhost;
GRANT all privileges ON TLDR.logbook TO dbadmin@localhost;
GRANT all privileges ON TLDR.pending_entries TO dbadmin@localhost;
GRANT all privileges ON TLDR.approvals TO dbadmin@localhost;
GRANT all privileges ON TLDR.cbta_progress TO dbadmin@localhost;
GRANT all privileges ON TLDR.payments TO dbadmin@localhost;


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


    -- Instructor password: PasswordI1
    -- QSD password: PasswordQ1
    -- Student password: PasswordS1

    -- Insert logbook entries for students that need approval
INSERT INTO logbook (student_id, approver_id, date, start_time, finish_time, duration, from_location, to_location, road_condition, weather_condition, traffic_condition)
VALUES
    (5, 1, '2023-05-01', '08:00:00', '09:30:00', 90, '123 Elm St', '456 Oak St', 'D', 'C', 'L'),
    (5, 1, '2023-06-02', '18:00:00', '19:30:00', 90, '123 Elm St', '456 Oak St', 'W', 'R', 'H'),
    (6, 2, '2023-05-02', '09:30:00', '11:00:00', 90, '789 Pine St', '101 Cedar St', 'W', 'R', 'H');

-- Insert approvals for logbook entries that need approval
INSERT INTO approvals (logbook_entry_id, approver_id, approval_date, approved)
VALUES
    (1, 1, '2023-05-03', 0),  -- Logbook entry 1 needs approval from instructor 1
    (2, 2, '2023-05-03', 0);  -- Logbook entry 2 needs approval from instructor 2
