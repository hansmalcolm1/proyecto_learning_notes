-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema proyecto_adsi
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema proyecto_adsi
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `proyecto_adsi` DEFAULT CHARACTER SET utf8 ;
USE `proyecto_adsi` ;

-- -----------------------------------------------------
-- Table `proyecto_adsi`.`docente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`docente` (
  `id_docente` INT NOT NULL AUTO_INCREMENT,
  `nom_docente` VARCHAR(80) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_docente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_adsi`.`Matricula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`Matricula` (
  `idMatricula` INT NOT NULL AUTO_INCREMENT,
  `Condicion` VARCHAR(60) NOT NULL,
  `ano_lectivo` INT NULL,
  `calendario` CHAR NULL,
  `estado` INT NULL,
  PRIMARY KEY (`idMatricula`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_adsi`.`estudiante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`estudiante` (
  `id_alumno` INT NOT NULL AUTO_INCREMENT,
  `nom_alumno` VARCHAR(180) NOT NULL,
  `documento` VARCHAR(20) NOT NULL,
  `celular` VARCHAR(15) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `direccion` VARCHAR(45) NULL,
  `telefono_fijo` VARCHAR(45) NULL,
  PRIMARY KEY (`id_alumno`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_adsi`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`curso` (
  `idcurso` INT NOT NULL AUTO_INCREMENT,
  `nom_curso` VARCHAR(45) NOT NULL,
  `docente_id_docente` INT NOT NULL,
  PRIMARY KEY (`idcurso`),
  INDEX `fk_curso_docente1_idx` (`docente_id_docente` ASC),
  CONSTRAINT `fk_curso_docente1`
    FOREIGN KEY (`docente_id_docente`)
    REFERENCES `proyecto_adsi`.`docente` (`id_docente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_adsi`.`registro_matricula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`registro_matricula` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Matricula_idMatricula` INT NOT NULL,
  `estudiante_id_alumno` INT NOT NULL,
  `curso_idcurso` INT NOT NULL,
  `promedio` DECIMAL NOT NULL DEFAULT 0.0,
  INDEX `fk_table1_Matricula1_idx` (`Matricula_idMatricula` ASC) ,
  INDEX `fk_table1_estudiante1_idx` (`estudiante_id_alumno` ASC) ,
  INDEX `fk_table1_curso1_idx` (`curso_idcurso` ASC) ,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_table1_Matricula1`
    FOREIGN KEY (`Matricula_idMatricula`)
    REFERENCES `proyecto_adsi`.`Matricula` (`idMatricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_estudiante1`
    FOREIGN KEY (`estudiante_id_alumno`)
    REFERENCES `proyecto_adsi`.`estudiante` (`id_alumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_curso1`
    FOREIGN KEY (`curso_idcurso`)
    REFERENCES `proyecto_adsi`.`curso` (`idcurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_adsi`.`observacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`observacion` (
  `id_observa` INT NOT NULL AUTO_INCREMENT,
  `observación` LONGTEXT NULL,
  `Fecha_observa` DATETIME NOT NULL,
  `registro_matricula_id` INT NOT NULL,
  PRIMARY KEY (`id_observa`),
  INDEX `fk_observacion_registro_matricula1_idx` (`registro_matricula_id` ASC) ,
  CONSTRAINT `fk_observacion_registro_matricula1`
    FOREIGN KEY (`registro_matricula_id`)
    REFERENCES `proyecto_adsi`.`registro_matricula` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_adsi`.`materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`materia` (
  `idmateria` INT NOT NULL AUTO_INCREMENT,
  `nom_materia` VARCHAR(45) NOT NULL,
  `curso_idcurso` INT NOT NULL,
  `docente_id_docente` INT NOT NULL,
  PRIMARY KEY (`idmateria`),
  INDEX `fk_materia_curso1_idx` (`curso_idcurso` ASC) ,
  INDEX `fk_materia_docente1_idx` (`docente_id_docente` ASC) ,
  CONSTRAINT `fk_materia_curso1`
    FOREIGN KEY (`curso_idcurso`)
    REFERENCES `proyecto_adsi`.`curso` (`idcurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_materia_docente1`
    FOREIGN KEY (`docente_id_docente`)
    REFERENCES `proyecto_adsi`.`docente` (`id_docente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_adsi`.`tarea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`tarea` (
  `idtarea` INT NOT NULL AUTO_INCREMENT,
  `descripcion_tarea` LONGTEXT NOT NULL,
  `titulo_tarea` VARCHAR(45) NOT NULL,
  `fecha_entrega` DATETIME NOT NULL,
  `materia_idmateria1` INT NOT NULL,
  `periodo` VARCHAR(45) NULL,
  PRIMARY KEY (`idtarea`),
  INDEX `fk_tarea_materia1_idx` (`materia_idmateria1` ASC) ,
  CONSTRAINT `fk_tarea_materia1`
    FOREIGN KEY (`materia_idmateria1`)
    REFERENCES `proyecto_adsi`.`materia` (`idmateria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_adsi`.`cronograma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`cronograma` (
  `idcronograma` INT NOT NULL AUTO_INCREMENT,
  `actividad` LONGTEXT NOT NULL,
  `responsable` VARCHAR(80) NOT NULL,
  `fecha_actividad` VARCHAR(80) NOT NULL,
  `docente_id_docente` INT NOT NULL,
  PRIMARY KEY (`idcronograma`),
  INDEX `fk_cronograma_docente1_idx` (`docente_id_docente` ASC) ,
  CONSTRAINT `fk_cronograma_docente1`
    FOREIGN KEY (`docente_id_docente`)
    REFERENCES `proyecto_adsi`.`docente` (`id_docente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_adsi`.`definitivas_periodo_materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`definitivas_periodo_materia` (
  `idcalificacion` INT NOT NULL AUTO_INCREMENT,
  `nota_periodo_1` FLOAT NOT NULL,
  `nota2` FLOAT NOT NULL,
  `nota3` FLOAT NOT NULL,
  `nota4` FLOAT NOT NULL,
  `def_periodo` FLOAT NOT NULL,
  `materia_idmateria` INT NOT NULL,
  `estudiante_id_alumno` INT NOT NULL,
  INDEX `fk_calificacion_materia1_idx` (`materia_idmateria` ASC) ,
  PRIMARY KEY (`idcalificacion`),
  INDEX `fk_calificacion_estudiante1_idx` (`estudiante_id_alumno` ASC) ,
  CONSTRAINT `fk_calificacion_materia1`
    FOREIGN KEY (`materia_idmateria`)
    REFERENCES `proyecto_adsi`.`materia` (`idmateria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Update_id_fk_calificacion_estudiante1`
    FOREIGN KEY (`estudiante_id_alumno`)
    REFERENCES `proyecto_adsi`.`estudiante` (`id_alumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_adsi`.`estudiante_has_tarea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`estudiante_has_tarea` (
  `estudiante_id_alumno` INT NOT NULL AUTO_INCREMENT,
  `tarea_idtarea` INT NOT NULL,
  `nota` DECIMAL NOT NULL,
  `observacion` VARCHAR(45) NOT NULL,
  INDEX `fk_estudiante_has_tarea_tarea1_idx` (`tarea_idtarea` ASC) ,
  INDEX `fk_estudiante_has_tarea_estudiante1_idx` (`estudiante_id_alumno` ASC) ,
  PRIMARY KEY (`estudiante_id_alumno`),
  CONSTRAINT `fk_estudiante_has_tarea_estudiante1`
    FOREIGN KEY (`estudiante_id_alumno`)
    REFERENCES `proyecto_adsi`.`estudiante` (`id_alumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_has_tarea_tarea1`
    FOREIGN KEY (`tarea_idtarea`)
    REFERENCES `proyecto_adsi`.`tarea` (`idtarea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_adsi`.`acudientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`acudientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `documento` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `parentesco` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `estudiante_id_alumno` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_acudientes_estudiante1_idx` (`estudiante_id_alumno` ASC) ,
  CONSTRAINT `fk_acudientes_estudiante1`
    FOREIGN KEY (`estudiante_id_alumno`)
    REFERENCES `proyecto_adsi`.`estudiante` (`id_alumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_adsi`.`evaluacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`evaluacion` (
  `idevaluacion` INT NOT NULL AUTO_INCREMENT,
  `descripcion_evaluacion` LONGTEXT NOT NULL,
  `titulo_evaluacion` VARCHAR(45) NOT NULL,
  `fecha_evaluacion` DATETIME NOT NULL,
  `materia_idmateria1` INT NOT NULL,
  `periodo` VARCHAR(45) NULL,
  PRIMARY KEY (`idevaluacion`),
  INDEX `fk_tarea_materia1_idx` (`materia_idmateria1` ASC) ,
  CONSTRAINT `fk_tarea_materia10`
    FOREIGN KEY (`materia_idmateria1`)
    REFERENCES `proyecto_adsi`.`materia` (`idmateria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_adsi`.`estudiante_has_evaluacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`estudiante_has_evaluacion` (
  `estudiante_id_alumno` INT NOT NULL,
  `evaluacion_idtarea` INT NOT NULL,
  `nota` DECIMAL NULL,
  `observacion` VARCHAR(45) NULL,
  PRIMARY KEY (`estudiante_id_alumno`, `evaluacion_idtarea`),
  INDEX `fk_estudiante_has_evaluacion_evaluacion1_idx` (`evaluacion_idtarea` ASC) ,
  INDEX `fk_estudiante_has_evaluacion_estudiante1_idx` (`estudiante_id_alumno` ASC) ,
  CONSTRAINT `fk_estudiante_has_evaluacion_estudiante1`
    FOREIGN KEY (`estudiante_id_alumno`)
    REFERENCES `proyecto_adsi`.`estudiante` (`id_alumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_has_evaluacion_evaluacion1`
    FOREIGN KEY (`evaluacion_idtarea`)
    REFERENCES `proyecto_adsi`.`evaluacion` (`idevaluacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `proyecto_adsi`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(60) NOT NULL,
  `password` VARCHAR(60) NOT NULL,
  `rol_id` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
