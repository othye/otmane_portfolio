-- MySQL Script generated by MySQL Workbench
-- mar. 03 juil. 2018 14:07:48 CEST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema portfolio
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema portfolio
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `portfolio` DEFAULT CHARACTER SET utf8 ;
USE `portfolio` ;

-- -----------------------------------------------------
-- Table `portfolio`.`portfolio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio`.`portfolio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `url` TEXT NULL,
  `id_user` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio`.`contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio`.`contact` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name_exp` VARCHAR(255) NULL,
  `phone_exp` VARCHAR(255) NULL,
  `mail_exp` VARCHAR(255) NULL,
  `subject` TEXT NULL,
  `message` TEXT NULL,
  `id_user` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL,
  `first_name` VARCHAR(255) NULL,
  `address` TEXT NULL,
  `zip` INT NULL,
  `city` VARCHAR(255) NULL,
  `mail` TEXT NULL,
  `mobile` VARCHAR(255) NULL,
  `phone` VARCHAR(255) NULL,
  `more_info` TEXT NULL,
  `portfolio_id` INT NOT NULL,
  `contact_id` INT NOT NULL,
  PRIMARY KEY (`id`, `portfolio_id`, `contact_id`),
  INDEX `fk_users_portfolio_idx` (`portfolio_id` ASC),
  INDEX `fk_users_contact1_idx` (`contact_id` ASC),
  CONSTRAINT `fk_users_portfolio`
    FOREIGN KEY (`portfolio_id`)
    REFERENCES `portfolio`.`portfolio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_contact1`
    FOREIGN KEY (`contact_id`)
    REFERENCES `portfolio`.`contact` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
