-- MySQL Script generated by MySQL Workbench
-- Sat 15 May 2021 06:13:05 PM EEST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema webhotels
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema webhotels
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `webhotels` ;
USE `webhotels` ;

-- -----------------------------------------------------
-- Table `webhotels`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhotels`.`Users` (
  `userID` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL,
  `password` VARCHAR(300) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `isValid` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`userID`, `username`, `email`),
  UNIQUE INDEX `userID_UNIQUE` (`userID` ASC) VISIBLE,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webhotels`.`Hotels`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhotels`.`Hotels` (
  `hotelID` INT NOT NULL AUTO_INCREMENT,
  `hotelName` VARCHAR(45) NOT NULL,
  `town` VARCHAR(50) NOT NULL,
  `address` VARCHAR(50) NOT NULL,
  `phone` VARCHAR(10) NOT NULL,
  `numberOfRooms` INT NOT NULL,
  `longtitude` DECIMAL(7) NOT NULL,
  `latitude` DECIMAL(7) NOT NULL,
  `rate` INT NOT NULL,
  `pool` TINYINT NOT NULL,
  `gym` TINYINT NOT NULL,
  `cinema` TINYINT NOT NULL,
  `Users_userID` INT NOT NULL,
  `Users_username` VARCHAR(30) NOT NULL,
  `Users_email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`hotelID`),
  UNIQUE INDEX `hotelID_UNIQUE` (`hotelID` ASC) VISIBLE,
  UNIQUE INDEX `address_UNIQUE` (`address` ASC) VISIBLE,
  UNIQUE INDEX `phone_UNIQUE` (`phone` ASC) VISIBLE,
  INDEX `fk_Hotels_Users1_idx` (`Users_userID` ASC, `Users_username` ASC, `Users_email` ASC) VISIBLE,
  CONSTRAINT `fk_Hotels_Users1`
    FOREIGN KEY (`Users_userID` , `Users_username` , `Users_email`)
    REFERENCES `webhotels`.`Users` (`userID` , `username` , `email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webhotels`.`Pictures`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhotels`.`Pictures` (
  `pictureID` INT NOT NULL AUTO_INCREMENT,
  `path` VARCHAR(50) NOT NULL,
  `description` VARCHAR(75) NOT NULL,
  `Hotel_hotelID` INT NOT NULL,
  PRIMARY KEY (`pictureID`, `Hotel_hotelID`),
  INDEX `fk_pictures_Hotel1_idx` (`Hotel_hotelID` ASC) VISIBLE,
  CONSTRAINT `fk_pictures_Hotel1`
    FOREIGN KEY (`Hotel_hotelID`)
    REFERENCES `webhotels`.`Hotels` (`hotelID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
