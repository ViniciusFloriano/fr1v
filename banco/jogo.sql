-- -----------------------------------------------------
-- Schema BD_Jogo
-- -----------------------------------------------------
DROP database if exists bd_jogo;
CREATE SCHEMA IF NOT EXISTS `BD_Jogo` DEFAULT CHARACTER SET utf8 ;
USE `BD_Jogo` ;

-- -----------------------------------------------------
-- Table `BD_Jogo`.`tb_jogo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jogo`.`tb_jogo` (
  `id_jogo` INT NOT NULL AUTO_INCREMENT UNIQUE,
  `nome_jogo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_jogo`)
)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `BD_Jogo`.`tb_cadastro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jogo`.`tb_cadastro` (
  `cpf_cadastro` CHAR(14) NOT NULL UNIQUE,
  `nome_usuario_cadastro` VARCHAR(30) NOT NULL UNIQUE,
  `senha_cadastro` VARCHAR(45) NOT NULL,
  `data_nascimento_cadastro` DATE NOT NULL,
  `email_cadastro` VARCHAR(70) NOT NULL,
  `nome_cadastro` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`cpf_cadastro`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `BD_Jogo`.`tb_acesso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jogo`.`tb_acesso` (
  `id_acesso` INT NOT NULL AUTO_INCREMENT UNIQUE,
  `data_acesso` DATETIME NOT NULL,
  `id_jogo` INT NOT NULL,
  `cpf_cadastro` CHAR(14) NOT NULL,
  PRIMARY KEY (`id_acesso`),
  CONSTRAINT `fk_id_jogo`
    FOREIGN KEY (`id_jogo`)
    REFERENCES `BD_Jogo`.`tb_jogo` (`id_jogo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_cpf_cadastro`
    FOREIGN KEY (`cpf_cadastro`)
    REFERENCES `BD_Jogo`.`tb_cadastro` (`cpf_cadastro`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `BD_Jogo`.`avaliação`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_Jogo`.`tb_avaliacao` (
  `id_avaliacao` INT NOT NULL AUTO_INCREMENT UNIQUE,
  `nota_avaliacao` INT NOT NULL,
  `id_jogo` INT NOT NULL,
  `cpf_cadastro` CHAR(14) NOT NULL,
  PRIMARY KEY (`id_avaliacao`),
  CONSTRAINT `id_jogo_fk`
    FOREIGN KEY (`id_jogo`)
    REFERENCES `BD_Jogo`.`tb_jogo` (`id_jogo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `cpf_cadastro_fk`
    FOREIGN KEY (`cpf_cadastro`)
    REFERENCES `BD_Jogo`.`tb_cadastro` (`cpf_cadastro`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO tb_jogo values
(DEFAULT, 'Jogo da Cobrinha'),
(DEFAULT, 'Jogo dos Numeros'),
(DEFAULT, 'Jogo da Velha');
