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

