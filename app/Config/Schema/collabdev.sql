SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `collabdev` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `collabdev` ;

-- -----------------------------------------------------
-- Table `collabdev`.`grupos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `collabdev`.`grupos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `collabdev`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `collabdev`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `grupo_id` INT NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC),
  INDEX `fk_usuarios_grupos_idx` (`grupo_id` ASC),
  CONSTRAINT `fk_usuarios_grupos`
    FOREIGN KEY (`grupo_id`)
    REFERENCES `collabdev`.`grupos` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `collabdev`.`tipo_repositorios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `collabdev`.`tipo_repositorios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `collabdev`.`repositorios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `collabdev`.`repositorios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` TEXT NULL,
  `linguagem` VARCHAR(45) NULL,
  `usuario_id` INT NOT NULL,
  `tipo_repositorio_id` INT NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_repositorios_usuarios1_idx` (`usuario_id` ASC),
  INDEX `fk_repositorios_tipo_repositorios1_idx` (`tipo_repositorio_id` ASC),
  CONSTRAINT `fk_repositorios_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `collabdev`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_repositorios_tipo_repositorios1`
    FOREIGN KEY (`tipo_repositorio_id`)
    REFERENCES `collabdev`.`tipo_repositorios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `collabdev`.`equipes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `collabdev`.`equipes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = '	';


-- -----------------------------------------------------
-- Table `collabdev`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `collabdev`.`status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `collabdev`.`tarefas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `collabdev`.`tarefas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `descricao` TEXT NULL,
  `repositorio_id` INT NOT NULL,
  `status_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tarefas_repositorios1_idx` (`repositorio_id` ASC),
  INDEX `fk_tarefas_status1_idx` (`status_id` ASC),
  INDEX `fk_tarefas_usuarios1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_tarefas_repositorios1`
    FOREIGN KEY (`repositorio_id`)
    REFERENCES `collabdev`.`repositorios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tarefas_status1`
    FOREIGN KEY (`status_id`)
    REFERENCES `collabdev`.`status` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tarefas_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `collabdev`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `collabdev`.`tarefa_comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `collabdev`.`tarefa_comentarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NOT NULL,
  `tarefa_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tarefa_comentarios_tarefas1_idx` (`tarefa_id` ASC),
  INDEX `fk_tarefa_comentarios_usuarios1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_tarefa_comentarios_tarefas1`
    FOREIGN KEY (`tarefa_id`)
    REFERENCES `collabdev`.`tarefas` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tarefa_comentarios_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `collabdev`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `collabdev`.`equipe_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `collabdev`.`equipe_usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `equipe_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_times_has_usuarios_usuarios1_idx` (`usuario_id` ASC),
  INDEX `fk_times_has_usuarios_times1_idx` (`equipe_id` ASC),
  CONSTRAINT `fk_times_has_usuarios_times1`
    FOREIGN KEY (`equipe_id`)
    REFERENCES `collabdev`.`equipes` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_times_has_usuarios_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `collabdev`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `collabdev`.`equipe_repositorios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `collabdev`.`equipe_repositorios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `equipe_id` INT NOT NULL,
  `repositorio_id` INT NOT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_times_has_repositorios_times1_idx` (`equipe_id` ASC),
  INDEX `fk_equipe_repositorios_repositorios1_idx` (`repositorio_id` ASC),
  CONSTRAINT `fk_times_has_repositorios_times1`
    FOREIGN KEY (`equipe_id`)
    REFERENCES `collabdev`.`equipes` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_equipe_repositorios_repositorios1`
    FOREIGN KEY (`repositorio_id`)
    REFERENCES `collabdev`.`repositorios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE TABLE acos (
  id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  parent_id INTEGER(10) DEFAULT NULL,
  model VARCHAR(255) DEFAULT '',
  foreign_key INTEGER(10) UNSIGNED DEFAULT NULL,
  alias VARCHAR(255) DEFAULT '',
  lft INTEGER(10) DEFAULT NULL,
  rght INTEGER(10) DEFAULT NULL,
  PRIMARY KEY  (id)
);

CREATE TABLE aros_acos (
  id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  aro_id INTEGER(10) UNSIGNED NOT NULL,
  aco_id INTEGER(10) UNSIGNED NOT NULL,
  _create CHAR(2) NOT NULL DEFAULT 0,
  _read CHAR(2) NOT NULL DEFAULT 0,
  _update CHAR(2) NOT NULL DEFAULT 0,
  _delete CHAR(2) NOT NULL DEFAULT 0,
  PRIMARY KEY(id)
);

CREATE TABLE aros (
  id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  parent_id INTEGER(10) DEFAULT NULL,
  model VARCHAR(255) DEFAULT '',
  foreign_key INTEGER(10) UNSIGNED DEFAULT NULL,
  alias VARCHAR(255) DEFAULT '',
  lft INTEGER(10) DEFAULT NULL,
  rght INTEGER(10) DEFAULT NULL,
  PRIMARY KEY  (id)
);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

--
-- INSERT `grupos`
--

INSERT INTO `grupos` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Administrador', '2013-09-01 23:52:12', '2013-09-01 23:52:12'),
(2, 'Gerenciador', '2013-09-01 23:52:17', '2013-09-01 23:52:17'),
(3, 'Colaborador', '2013-09-01 23:52:22', '2013-09-01 23:52:22');

--
-- INSERT `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `login`, `senha`, `grupo_id`, `created`, `modified`) VALUES
(1, 'Administrador', 'admin@collabdev.com', 'admin', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 1, '2013-09-01 23:53:01', '2013-09-01 23:53:01'),
(2, 'Gerenciador', 'gerenciador@collabdev.com', 'gerenciador', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 2, '2013-09-01 23:56:36', '2013-09-01 23:56:36'),
(3, 'Colaborador', 'colaborador@collabdev.com', 'colaborador', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 3, '2013-09-01 23:58:51', '2013-09-04 02:59:27');

--
-- INSERT `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, '', NULL, 'controllers', 1, 114),
(2, 1, NULL, NULL, 'Equipes', 2, 21),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Grupos', 22, 33),
(9, 8, NULL, NULL, 'index', 23, 24),
(10, 8, NULL, NULL, 'view', 25, 26),
(11, 8, NULL, NULL, 'add', 27, 28),
(12, 8, NULL, NULL, 'edit', 29, 30),
(13, 8, NULL, NULL, 'delete', 31, 32),
(14, 1, NULL, NULL, 'Pages', 34, 37),
(15, 14, NULL, NULL, 'display', 35, 36),
(16, 1, NULL, NULL, 'Repositorios', 38, 49),
(17, 16, NULL, NULL, 'index', 39, 40),
(18, 16, NULL, NULL, 'view', 41, 42),
(19, 16, NULL, NULL, 'add', 43, 44),
(20, 16, NULL, NULL, 'edit', 45, 46),
(21, 16, NULL, NULL, 'delete', 47, 48),
(22, 1, NULL, NULL, 'Statuses', 50, 61),
(23, 22, NULL, NULL, 'index', 51, 52),
(24, 22, NULL, NULL, 'view', 53, 54),
(25, 22, NULL, NULL, 'add', 55, 56),
(26, 22, NULL, NULL, 'edit', 57, 58),
(27, 22, NULL, NULL, 'delete', 59, 60),
(28, 1, NULL, NULL, 'Tarefas', 62, 73),
(29, 28, NULL, NULL, 'index', 63, 64),
(30, 28, NULL, NULL, 'view', 65, 66),
(31, 28, NULL, NULL, 'add', 67, 68),
(32, 28, NULL, NULL, 'edit', 69, 70),
(33, 28, NULL, NULL, 'delete', 71, 72),
(34, 1, NULL, NULL, 'TipoRepositorios', 74, 85),
(35, 34, NULL, NULL, 'index', 75, 76),
(36, 34, NULL, NULL, 'view', 77, 78),
(37, 34, NULL, NULL, 'add', 79, 80),
(38, 34, NULL, NULL, 'edit', 81, 82),
(39, 34, NULL, NULL, 'delete', 83, 84),
(40, 1, NULL, NULL, 'Usuarios', 86, 107),
(41, 40, NULL, NULL, 'index', 87, 88),
(42, 40, NULL, NULL, 'view', 89, 90),
(43, 40, NULL, NULL, 'add', 91, 92),
(44, 40, NULL, NULL, 'edit', 93, 94),
(45, 40, NULL, NULL, 'delete', 95, 96),
(46, 40, NULL, NULL, 'login', 97, 98),
(47, 40, NULL, NULL, 'logout', 99, 100),
(48, 1, NULL, NULL, 'AclExtras', 108, 109),
(49, 1, NULL, NULL, 'Acl', 110, 113),
(50, 49, NULL, NULL, 'initDB', 111, 112),
(51, 40, NULL, NULL, 'dashboard', 101, 102),
(52, 2, NULL, NULL, 'relacionarUsuario', 13, 14),
(53, 40, NULL, NULL, 'conta', 103, 104),
(54, 40, NULL, NULL, 'alterarSenha', 105, 106),
(55, 2, NULL, NULL, 'removerUsuario', 15, 16),
(56, 2, NULL, NULL, 'relacionarRepositorio', 17, 18),
(57, 2, NULL, NULL, 'removerRepositorio', 19, 20);

--
-- INSERT `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Grupo', 1, '', 1, 4),
(2, NULL, 'Grupo', 2, '', 5, 8),
(3, NULL, 'Grupo', 3, '', 9, 12),
(4, 1, 'Usuario', 1, '', 2, 3),
(5, 2, 'Usuario', 2, '', 6, 7),
(6, 3, 'Usuario', 3, '', 10, 11);

--
-- INSERT `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1'),
(3, 2, 41, '1', '1', '1', '1'),
(4, 2, 43, '1', '1', '1', '1'),
(5, 2, 44, '1', '1', '1', '1'),
(6, 2, 42, '1', '1', '1', '1'),
(7, 2, 45, '1', '1', '1', '1'),
(8, 2, 17, '1', '1', '1', '1'),
(9, 2, 19, '1', '1', '1', '1'),
(10, 2, 20, '1', '1', '1', '1'),
(11, 2, 18, '1', '1', '1', '1'),
(12, 2, 21, '1', '1', '1', '1'),
(13, 2, 3, '1', '1', '1', '1'),
(14, 2, 5, '1', '1', '1', '1'),
(15, 2, 6, '1', '1', '1', '1'),
(16, 2, 4, '1', '1', '1', '1'),
(17, 2, 7, '1', '1', '1', '1'),
(18, 2, 29, '1', '1', '1', '1'),
(19, 2, 31, '1', '1', '1', '1'),
(20, 2, 32, '1', '1', '1', '1'),
(21, 2, 30, '1', '1', '1', '1'),
(22, 2, 33, '1', '1', '1', '1'),
(23, 3, 1, '-1', '-1', '-1', '-1'),
(24, 3, 29, '1', '1', '1', '1'),
(25, 3, 31, '1', '1', '1', '1'),
(26, 3, 32, '1', '1', '1', '1'),
(27, 3, 30, '1', '1', '1', '1'),
(28, 3, 33, '1', '1', '1', '1'),
(29, 2, 51, '1', '1', '1', '1'),
(30, 3, 51, '1', '1', '1', '1'),
(31, 3, 44, '1', '1', '1', '1'),
(32, 2, 47, '1', '1', '1', '1'),
(33, 3, 47, '1', '1', '1', '1'),
(34, 2, 52, '1', '1', '1', '1'),
(35, 2, 53, '1', '1', '1', '1'),
(36, 2, 54, '1', '1', '1', '1'),
(37, 3, 53, '1', '1', '1', '1'),
(38, 3, 54, '1', '1', '1', '1'),
(39, 2, 55, '1', '1', '1', '1'),
(40, 2, 56, '1', '1', '1', '1'),
(41, 2, 57, '1', '1', '1', '1');