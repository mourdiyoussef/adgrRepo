-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema adgr_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema adgr_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `adgr_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `adgr_db` ;

-- -----------------------------------------------------
-- Table `adgr_db`.`donneur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adgr_db`.`donneur` (
  `iddonneur` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NULL,
  `prenom` VARCHAR(100) NULL,
  `dernierDon` DATE NULL,
  `codeAd` VARCHAR(45) NULL,
  `dateNaissance` DATE NULL,
  `adresse` VARCHAR(255) NULL,
  `fonction` VARCHAR(150) NULL,
  `etatMatrimonial` VARCHAR(45) NULL,
  `nbrEnfant` INT NULL,
  `groupeSonguin` VARCHAR(10) NULL,
  `mail` VARCHAR(100) NULL,
  `tel` VARCHAR(45) NULL,
  `cin` VARCHAR(45) NULL,
  `photo` VARCHAR(255) NULL,
  `dateInscription` DATE NULL,
  `aptPourDon` TINYINT NULL,
  `login` VARCHAR(255) NULL,
  `motDePasse` VARCHAR(255) NULL,
  `remarques` LONGTEXT NULL,
  PRIMARY KEY (`iddonneur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adgr_db`.`collecte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adgr_db`.`collecte` (
  `idcollecte` INT NOT NULL AUTO_INCREMENT,
  `dateCollecte` DATE NULL,
  `lieuCollecte` VARCHAR(255) NULL,
  `typeCollecte` VARCHAR(45) NULL,
  `remarqueCollecte` LONGTEXT NULL,
  PRIMARY KEY (`idcollecte`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adgr_db`.`don`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adgr_db`.`don` (
  `iddonneur` INT NOT NULL,
  `idcollecte` INT NOT NULL,
  `idDon` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idDon`, `iddonneur`, `idcollecte`),
  INDEX `fk_donneur_has_collecte_collecte1_idx` (`idcollecte` ASC),
  INDEX `fk_donneur_has_collecte_donneur_idx` (`iddonneur` ASC),
  CONSTRAINT `fk_donneur_has_collecte_donneur`
    FOREIGN KEY (`iddonneur`)
    REFERENCES `adgr_db`.`donneur` (`iddonneur`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_donneur_has_collecte_collecte1`
    FOREIGN KEY (`idcollecte`)
    REFERENCES `adgr_db`.`collecte` (`idcollecte`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adgr_db`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adgr_db`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL,
  `prenom` VARCHAR(45) NULL,
  `login` VARCHAR(255) NULL,
  `motdePasse` VARCHAR(255) NULL,
  `typeUser` VARCHAR(255) NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adgr_db`.`contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adgr_db`.`contact` (
  `idContact` INT NOT NULL,
  `type` VARCHAR(45) NULL,
  `nom` VARCHAR(45) NULL,
  `prenom` VARCHAR(45) NULL,
  `mail` VARCHAR(45) NULL,
  `tel` VARCHAR(45) NULL,
  `adresse` VARCHAR(255) NULL,
  `fonction` VARCHAR(45) NULL,
  `remarque` LONGTEXT NULL,
  PRIMARY KEY (`idContact`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;