/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-05 22:46:16 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-05 22:47:40
 * @Description: su user creation.
 */
CREATE USER 'su'@'%' IDENTIFIED BY 'put_the_password_here';
CREATE DATABASE IF NOT EXISTS phpforum; -- Create the database if it doesn't exist
GRANT ALL PRIVILEGES ON phpforum.* TO 'su'@'%';
FLUSH PRIVILEGES;