-- FloraMind Database Schema
-- This script creates the database and table for storing iris flower predictions

-- Create database
CREATE DATABASE IF NOT EXISTS floramind 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

-- Use the database
USE floramind;

-- Create predictions table
CREATE TABLE IF NOT EXISTS predictions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sepal_length DECIMAL(5,2) NOT NULL COMMENT 'Sepal length in centimeters',
    sepal_width DECIMAL(5,2) NOT NULL COMMENT 'Sepal width in centimeters',
    petal_length DECIMAL(5,2) NOT NULL COMMENT 'Petal length in centimeters',
    petal_width DECIMAL(5,2) NOT NULL COMMENT 'Petal width in centimeters',
    prediction VARCHAR(100) NOT NULL COMMENT 'Predicted Iris species (Iris-setosa, Iris-versicolor, or Iris-virginica)',
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'When the prediction was made',
    INDEX idx_timestamp (timestamp),
    INDEX idx_prediction (prediction)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Optional: Insert sample data for testing
-- INSERT INTO predictions (sepal_length, sepal_width, petal_length, petal_width, prediction) VALUES
-- (5.1, 3.5, 1.4, 0.2, 'Iris-setosa'),
-- (6.7, 3.0, 5.2, 2.3, 'Iris-virginica'),
-- (5.7, 2.8, 4.1, 1.3, 'Iris-versicolor');
