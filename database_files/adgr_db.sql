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
  `aptPourDon` VARCHAR(45) NULL,
  `login` VARCHAR(255) NULL,
  `motDePasse` VARCHAR(255) NULL,
  `sexe` VARCHAR(45) NULL,
  `etatCarte` VARCHAR(45) NULL,
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
  `idContact` INT NOT NULL AUTO_INCREMENT,
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


-- -----------------------------------------------------
-- Table `adgr_db`.`notification`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adgr_db`.`notification` (
  `idnotification` INT NOT NULL AUTO_INCREMENT,
  `dateNotif` DATE NULL,
  `user_iduser` INT NOT NULL,
  `collecte_idcollecte` INT NOT NULL,
  `donneur_iddonneur` INT NOT NULL,
  `remarque` LONGTEXT NULL,
  `typeNotif` VARCHAR(45) NULL,
  `reponse` VARCHAR(45) NULL,
  PRIMARY KEY (`idnotification`, `user_iduser`, `collecte_idcollecte`, `donneur_iddonneur`),
  INDEX `fk_notification_user1_idx` (`user_iduser` ASC),
  INDEX `fk_notification_collecte1_idx` (`collecte_idcollecte` ASC),
  INDEX `fk_notification_donneur1_idx` (`donneur_iddonneur` ASC),
  CONSTRAINT `fk_notification_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `adgr_db`.`user` (`iduser`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notification_collecte1`
    FOREIGN KEY (`collecte_idcollecte`)
    REFERENCES `adgr_db`.`collecte` (`idcollecte`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notification_donneur1`
    FOREIGN KEY (`donneur_iddonneur`)
    REFERENCES `adgr_db`.`donneur` (`iddonneur`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adgr_db`.`categorie_depense`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adgr_db`.`categorie_depense` (
  `idcategorie_depense` INT NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(200) NULL,
  PRIMARY KEY (`idcategorie_depense`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adgr_db`.`depense`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adgr_db`.`depense` (
  `iddepense` INT NOT NULL AUTO_INCREMENT,
  `collecte_idcollecte` INT NOT NULL,
  `montant` DOUBLE NULL,
  `remarques` LONGTEXT NULL,
  `categorie_depense_idcategorie_depense` INT NOT NULL,
  PRIMARY KEY (`iddepense`, `collecte_idcollecte`, `categorie_depense_idcategorie_depense`),
  INDEX `fk_depense_collecte1_idx` (`collecte_idcollecte` ASC),
  INDEX `fk_depense_categorie_depense1_idx` (`categorie_depense_idcategorie_depense` ASC),
  CONSTRAINT `fk_depense_collecte1`
    FOREIGN KEY (`collecte_idcollecte`)
    REFERENCES `adgr_db`.`collecte` (`idcollecte`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_depense_categorie_depense1`
    FOREIGN KEY (`categorie_depense_idcategorie_depense`)
    REFERENCES `adgr_db`.`categorie_depense` (`idcategorie_depense`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
