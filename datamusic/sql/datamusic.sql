
DROP DATABASE IF EXISTS `datamusic`;
CREATE DATABASE `datamusic`;

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

USE `datamusic`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`
(
    `user_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(20) NOT NULL,
	`password` VARCHAR(20) NOT NULL,
    `last_changed` TIMESTAMP NOT NULL,
    PRIMARY KEY (`user_id`)
);

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media`
(
    `media_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(1000) NOT NULL,
    `artist` VARCHAR(100) NOT NULL,
    `description` VARCHAR(1000) NULL,
    `genre` VARCHAR(100) NOT NULL,
    `year` INTEGER NOT NULL,
    `type` VARCHAR(100) NOT NULL,
    `state` VARCHAR(10) NOT NULL,
    `price` DECIMAL (20,2) NULL,
    `quantity` INT NULL,
    `language`VARCHAR(100) NULL,
    `last_changed` TIMESTAMP NOT NULL,
    PRIMARY KEY (`media_id`)
);


DROP TABLE IF EXISTS `instrument`;
CREATE TABLE `instrument`
(
    `instrument_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(1000) NOT NULL,
    `description` VARCHAR(1000) NULL,
    `brand` VARCHAR(100) NOT NULL,
    `type` VARCHAR(100) NOT NULL,
    `state` VARCHAR(10) NOT NULL,
    `price` DECIMAL (20,2) NULL,
    `quantity` INT NULL,
    `last_changed` TIMESTAMP NOT NULL,
    PRIMARY KEY (`instrument_id`)
);

DROP TABLE IF EXISTS `accessory`;
CREATE TABLE `accessory`
(
    `accessory_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(1000) NOT NULL,
    `description` VARCHAR(1000) NULL,
    `brand` VARCHAR(100) NOT NULL,
    `type` VARCHAR(100) NOT NULL,
    `price` DECIMAL (20,2) NULL,
    `quantity` INT NULL,
    `last_changed` TIMESTAMP NOT NULL,
    PRIMARY KEY (`accessory_id`)
);