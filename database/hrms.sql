-- =========================
-- HRMS DATABASE SCHEMA
-- =========================

-- 1. User & Role Management
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role_id INT,
    department VARCHAR(100),
    designation VARCHAR(100),
    is_active BOOLEAN DEFAULT TRUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

-- 2. Attendance & Breaks
CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    date DATE,
    punch_in DATETIME,
    punch_out DATETIME,
    total_working_hours TIME,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE breaks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    attendance_id INT,
    break_type VARCHAR(50),
    break_start DATETIME,
    break_end DATETIME,
    FOREIGN KEY (attendance_id) REFERENCES attendance(id)
);

-- 3. Leaves
CREATE TABLE leaves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    leave_type ENUM('Sick', 'Casual', 'Annual', 'Other'),
    start_date DATE,
    end_date DATE,
    reason TEXT,
    status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
    applied_on DATETIME DEFAULT CURRENT_TIMESTAMP,
    approved_by INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (approved_by) REFERENCES users(id)
);

-- 4. Holidays
CREATE TABLE holidays (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    date DATE,
    description TEXT
);

-- 5. Projects
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    client_name VARCHAR(100),
    budget DECIMAL(10, 2),
    deadline DATE,
    description TEXT
);

CREATE TABLE project_members (
    project_id INT,
    user_id INT,
    PRIMARY KEY (project_id, user_id),
    FOREIGN KEY (project_id) REFERENCES projects(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- 6. Tasks
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT,
    title VARCHAR(100),
    description TEXT,
    assigned_to INT,
    priority ENUM('Low', 'Medium', 'High', 'Urgent') DEFAULT 'Medium',
    status ENUM('To-Do', 'In Progress', 'On Hold', 'Done') DEFAULT 'To-Do',
    due_date DATE,
    FOREIGN KEY (project_id) REFERENCES projects(id),
    FOREIGN KEY (assigned_to) REFERENCES users(id)
);

CREATE TABLE task_comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task_id INT,
    user_id INT,
    comment TEXT,
    commented_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (task_id) REFERENCES tasks(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- 7. Timesheets
CREATE TABLE timesheets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    task_id INT,
    date DATE,
    hours_worked DECIMAL(5,2),
    description TEXT,
    status ENUM('Submitted', 'Approved', 'Rejected') DEFAULT 'Submitted',
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (task_id) REFERENCES tasks(id)
);

-- 8. Notifications
CREATE TABLE notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    message TEXT,
    is_read BOOLEAN DEFAULT FALSE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- 9. Session Logs
CREATE TABLE session_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    login_time DATETIME,
    logout_time DATETIME,
    ip_address VARCHAR(45),
    device_info TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
