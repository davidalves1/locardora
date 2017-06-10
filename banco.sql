CREATE DATABASE `locardora` ;
USE `locardora` ;

-- -----------------------------------------------------
-- Table `locardora`.`cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `locardora`.`cliente` (
  `idcliente` INT(10)  NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(60) NOT NULL ,
  `cpf` VARCHAR(14) NOT NULL ,
  `cnh` VARCHAR(11) NOT NULL ,
  `endereco` VARCHAR(200) NOT NULL ,
  `bairro` VARCHAR(50) NOT NULL ,
  `cidade` VARCHAR(50) NOT NULL ,
  `cep` VARCHAR(9) NOT NULL ,
  `estado` INT NOT NULL ,
  `telefone` VARCHAR(13) NOT NULL ,
  PRIMARY KEY (`idcliente`) );


-- -----------------------------------------------------
-- Table `locardora`.`funcionario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `locardora`.`funcionario` (
  `idfuncionario` INT(10)  NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(15) NOT NULL ,
  `senha` VARCHAR(10) NOT NULL ,
  `data` DATE NOT NULL ,
  `hora` TIME NOT NULL ,
  PRIMARY KEY (`idfuncionario`) );


-- -----------------------------------------------------
-- Table `locardora`.`marca`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `locardora`.`marca` (
  `idmarca` INT(10)  NOT NULL ,
  `desc_marca` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`idmarca`) );


-- -----------------------------------------------------
-- Table `locardora`.`modelo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `locardora`.`modelo` (
  `idmodelo` INT(10)  NOT NULL ,
  `desc_modelo` VARCHAR(100) NOT NULL ,
  `marca_idmarca` INT(10)  NOT NULL ,
  PRIMARY KEY (`idmodelo`) ,
  INDEX `fk_modelo_marca` (`marca_idmarca` ASC) ,
  CONSTRAINT `fk_modelo_marca`
    FOREIGN KEY (`marca_idmarca` )
    REFERENCES `locardora`.`marca` (`idmarca` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `locardora`.`veiculo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `locardora`.`veiculo` (
  `idveiculo` INT(10)  NOT NULL AUTO_INCREMENT ,
  `placa` VARCHAR(8) NOT NULL ,
  `ano` INT(10)  NOT NULL ,
  `diaria` FLOAT NOT NULL ,
  `preco` FLOAT NOT NULL ,
  `modelo_idmodelo` INT(10)  NOT NULL ,
  PRIMARY KEY (`idveiculo`) ,
  INDEX `fk_veiculo_modelo1` (`modelo_idmodelo` ASC) ,
  CONSTRAINT `fk_veiculo_modelo1`
    FOREIGN KEY (`modelo_idmodelo` )
    REFERENCES `locardora`.`modelo` (`idmodelo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `locardora`.`reserva`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `locardora`.`reserva` (
  `idreserva` INT(10)  NOT NULL ,
  `datareserva` DATE NOT NULL ,
  `hora` TIME NOT NULL ,
  `obs` VARCHAR(300) NOT NULL ,
  `cliente_idcliente` INT(10)  NOT NULL ,
  `funcionario_idfuncionario` INT(10)  NOT NULL ,
  `veiculo_idveiculo` INT(10)  NOT NULL ,
  PRIMARY KEY (`idreserva`) ,
  INDEX `fk_reserva_cliente1` (`cliente_idcliente` ASC) ,
  INDEX `fk_reserva_funcionario1` (`funcionario_idfuncionario` ASC) ,
  INDEX `fk_reserva_veiculo1` (`veiculo_idveiculo` ASC) ,
  CONSTRAINT `fk_reserva_cliente1`
    FOREIGN KEY (`cliente_idcliente` )
    REFERENCES `locardora`.`cliente` (`idcliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserva_funcionario1`
    FOREIGN KEY (`funcionario_idfuncionario` )
    REFERENCES `locardora`.`funcionario` (`idfuncionario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserva_veiculo1`
    FOREIGN KEY (`veiculo_idveiculo` )
    REFERENCES `locardora`.`veiculo` (`idveiculo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);