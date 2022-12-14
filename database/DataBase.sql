-- MySQL Script generated by MySQL Workbench
-- Tue Nov 22 18:25:33 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema Devitter
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Devitter
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Devitter` DEFAULT CHARACTER SET utf8 ;
USE `Devitter` ;

-- -----------------------------------------------------
-- Table `Devitter`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Devitter`.`User` ;

CREATE TABLE IF NOT EXISTS `Devitter`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(254) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `biography` VARCHAR(160) NULL DEFAULT NULL,
  `password` VARCHAR(16) NOT NULL,
  `dev_type` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Devitter`.`Post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Devitter`.`Post` ;

CREATE TABLE IF NOT EXISTS `Devitter`.`Post` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(255) NOT NULL,
  `created_at` DATETIME(1) NULL DEFAULT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Post_User1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_Post_User1`
    FOREIGN KEY (`user_id`)
    REFERENCES `Devitter`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Devitter`.`Follow`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Devitter`.`Follow` ;

CREATE TABLE IF NOT EXISTS `Devitter`.`Follow` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `followed_id` INT NOT NULL,
  `follower_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Follow_User1_idx` (`follower_id` ASC) VISIBLE,
  INDEX `fk_Followed_User_idx` (`followed_id` ASC) VISIBLE,
  CONSTRAINT `fk_Follow_User1`
    FOREIGN KEY (`follower_id`)
    REFERENCES `Devitter`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Followed_User`
    FOREIGN KEY (`followed_id`)
    REFERENCES `Devitter`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
