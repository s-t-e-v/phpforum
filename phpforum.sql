# CREATE USER 'su'@'%' IDENTIFIED BY 'put_the_password_here';
# CREATE DATABASE phpforum;
# GRANT ALL PRIVILEGES ON phpforum.* TO 'su'@'%';
# FLUSH PRIVILEGES;

USE phpforum;

# user table
CREATE TABLE IF NOT EXISTS user(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    picture_profil VARCHAR(255) NOT NULL,
    default_forum INT NOT NULL DEFAULT 0,
    CONSTRAINT fk_default_forum
    FOREIGN KEY (default_forum)
        REFERENCES forum(id)
) ENGINE=INNODB;

# forum table
CREATE TABLE IF NOT EXISTS forum(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at DATETIME,
    id_user INT NOT NULL,
    CONSTRAINT fk_id_user
    FOREIGN KEY (id_user)
        REFERENCES user(id)
) ENGINE=INNODB;

# topic table
CREATE TABLE IF NOT EXISTS topic(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    created_at DATETIME,
    id_user INT NOT NULL,
    id_forum INT NOT NULL,
    CONSTRAINT fk_id_user_topic
    FOREIGN KEY (id_user)
        REFERENCES user(id),
    CONSTRAINT fk_id_forum_topic
    FOREIGN KEY (id_forum)
        REFERENCES forum(id)
) ENGINE=INNODB;

# message table
CREATE TABLE IF NOT EXISTS message(
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT,
    created_at DATETIME,
    id_user INT NOT NULL,
    id_topic INT NOT NULL,
    CONSTRAINT fk_id_user_message
    FOREIGN KEY (id_user)
        REFERENCES user(id),
    CONSTRAINT fk_id_topic_message
    FOREIGN KEY (id_topic)
        REFERENCES topic(id)
) ENGINE=INNODB;
