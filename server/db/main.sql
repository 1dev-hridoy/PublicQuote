-- User table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Quote table
CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(191) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Example category data
INSERT INTO category (name) VALUES 
('Inspirational Quotes'),
('Motivational Quotes'),
('Love Quotes'),
('Life Quotes'),
('Success Quotes'),
('Friendship Quotes'),
('Happiness Quotes'),
('Wisdom Quotes'),
('Positive Quotes'),
('Funny Quotes'),
('Sad Quotes'),
('Attitude Quotes'),
('Philosophical Quotes'),
('Mindset Quotes'),
('Leadership Quotes'),
('Spiritual Quotes'),
('Family Quotes'),
('Self-Love Quotes'),
('Hard Work Quotes'),
('Education Quotes');



-- Quotes table
CREATE TABLE quotes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quote_text TEXT NOT NULL,
    author VARCHAR(255) NOT NULL,
    category_id INT NOT NULL,
    status ENUM('DRAFT', 'PUBLISHED', 'ARCHIVED') NOT NULL DEFAULT 'DRAFT',
    tags TEXT,
    source TEXT,
    context TEXT,
    published_by VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE RESTRICT
);