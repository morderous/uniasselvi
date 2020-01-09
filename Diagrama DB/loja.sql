-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_loja
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_loja
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_loja` DEFAULT CHARACTER SET utf8 ;
USE `db_loja` ;

-- -----------------------------------------------------
-- Table `db_loja`.`tb_cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_loja`.`tb_cliente` (
  `idtb_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome_cliente` VARCHAR(100) NOT NULL,
  `cpf_cliente` VARCHAR(11) NOT NULL,
  `email_cliente` VARCHAR(60) NULL,
  PRIMARY KEY (`idtb_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_loja`.`tb_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_loja`.`tb_produto` (
  `idtb_produto` INT NOT NULL,
  `nome_produto` VARCHAR(50) NULL,
  `valor_unitario_produto` DOUBLE NULL,
  `quantidade` INT NULL,
  PRIMARY KEY (`idtb_produto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_loja`.`tb_pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_loja`.`tb_pedido` (
  `idtb_pedido` INT NOT NULL,
  `data pedido` DATETIME NULL,
  `cod_barras` VARCHAR(20) NULL,
  `fk_cliente` INT NOT NULL,
  PRIMARY KEY (`idtb_pedido`),
  INDEX `fk_tb_pedido_tb_cliente_idx` (`fk_cliente` ASC) ,
  CONSTRAINT `fk_tb_pedido_tb_cliente`
    FOREIGN KEY (`fk_cliente`)
    REFERENCES `db_loja`.`tb_cliente` (`idtb_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_loja`.`tb_pedido_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_loja`.`tb_pedido_produto` (
  `fk_pedido` INT NOT NULL,
  `fk_produto` INT NOT NULL,
  PRIMARY KEY (`fk_pedido`, `fk_produto`),
  INDEX `fk_tb_pedido_has_tb_produto_tb_produto1_idx` (`fk_produto` ASC),
  INDEX `fk_tb_pedido_has_tb_produto_tb_pedido1_idx` (`fk_pedido` ASC),
  CONSTRAINT `fk_tb_pedido_has_tb_produto_tb_pedido1`
    FOREIGN KEY (`fk_pedido`)
    REFERENCES `db_loja`.`tb_pedido` (`idtb_pedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_pedido_has_tb_produto_tb_produto1`
    FOREIGN KEY (`fk_produto`)
    REFERENCES `db_loja`.`tb_produto` (`idtb_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
