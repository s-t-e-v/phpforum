/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-06 10:32:45 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-08 00:21:59
 * @Description: phpforum database
 */

-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS phpforum;

-- Use the database
USE phpforum;

-- user table
CREATE TABLE IF NOT EXISTS user(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    picture_profil VARCHAR(255) DEFAULT 'default_pp.png' NOT NULL
) ENGINE=INNODB;

-- forum table
CREATE TABLE IF NOT EXISTS forum(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    id_user INT NOT NULL, 
    CONSTRAINT fk_id_user_forum
    FOREIGN KEY (id_user)
        REFERENCES user(id)
        ON DELETE CASCADE
) ENGINE=INNODB;

-- default_forum table
CREATE TABLE IF NOT EXISTS default_forum(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL UNIQUE,
    id_forum INT, -- NULL value refers to the original forum 
    CONSTRAINT fk_id_user_default_forum
    FOREIGN KEY (id_user)
        REFERENCES user(id)
        ON DELETE CASCADE,
    CONSTRAINT fk_id_forum_default_forum
    FOREIGN KEY (id_forum)
        REFERENCES forum(id)
) ENGINE=INNODB;

-- topic table
CREATE TABLE IF NOT EXISTS topic(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    id_user INT NOT NULL,
    id_forum INT NOT NULL,
    CONSTRAINT fk_id_user_topic
    FOREIGN KEY (id_user)
        REFERENCES user(id)
        ON DELETE CASCADE,
    CONSTRAINT fk_id_forum_topic
    FOREIGN KEY (id_forum)
        REFERENCES forum(id)
        ON DELETE CASCADE
) ENGINE=INNODB;

-- message table
CREATE TABLE IF NOT EXISTS message(
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT,
    created_at DATETIME NOT NULL,
    id_user INT NOT NULL,
    id_topic INT NOT NULL,
    CONSTRAINT fk_id_user_message
    FOREIGN KEY (id_user)
        REFERENCES user(id)
        ON DELETE CASCADE,
    CONSTRAINT fk_id_topic_message
    FOREIGN KEY (id_topic)
        REFERENCES topic(id)
        ON DELETE CASCADE
) ENGINE=INNODB;
