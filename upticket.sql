-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para helpdesk
CREATE DATABASE IF NOT EXISTS `helpdesk` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `helpdesk`;

-- Copiando estrutura para tabela helpdesk.corporations
CREATE TABLE IF NOT EXISTS `corporations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(4) NOT NULL,
  `corp_type` tinyint(4) NOT NULL COMMENT 'client or provider',
  `pf_pj` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fantasy` varchar(100) DEFAULT NULL,
  `cpf` varchar(100) DEFAULT NULL,
  `cnpj` varchar(100) DEFAULT NULL,
  `rg_ie` varchar(100) DEFAULT NULL,
  `zipcode` varchar(50) DEFAULT NULL,
  `addr` varchar(100) DEFAULT NULL,
  `addr_num` varchar(100) DEFAULT NULL,
  `addr_compl` varchar(100) DEFAULT NULL,
  `addr_neighb` varchar(50) DEFAULT NULL,
  `addr_city` varchar(50) DEFAULT NULL,
  `addr_state` varchar(50) DEFAULT NULL,
  `addr_ref` varchar(50) DEFAULT NULL,
  `addr_coord` varchar(50) DEFAULT NULL,
  `internal_obs` mediumtext,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela helpdesk.corporations: ~0 rows (aproximadamente)
DELETE FROM `corporations`;
/*!40000 ALTER TABLE `corporations` DISABLE KEYS */;
/*!40000 ALTER TABLE `corporations` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.corporations_contacts
CREATE TABLE IF NOT EXISTS `corporations_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_corporation` int(11) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela helpdesk.corporations_contacts: ~0 rows (aproximadamente)
DELETE FROM `corporations_contacts`;
/*!40000 ALTER TABLE `corporations_contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `corporations_contacts` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.corporations_contracts
CREATE TABLE IF NOT EXISTS `corporations_contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_corporation` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `c_type` varchar(50) NOT NULL COMMENT 'compra ou venda',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela helpdesk.corporations_contracts: ~0 rows (aproximadamente)
DELETE FROM `corporations_contracts`;
/*!40000 ALTER TABLE `corporations_contracts` DISABLE KEYS */;
/*!40000 ALTER TABLE `corporations_contracts` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.corporations_users
CREATE TABLE IF NOT EXISTS `corporations_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_corporation` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela helpdesk.corporations_users: ~0 rows (aproximadamente)
DELETE FROM `corporations_users`;
/*!40000 ALTER TABLE `corporations_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `corporations_users` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_leader` int(11) DEFAULT NULL,
  `signature` text,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela helpdesk.departments: ~3 rows (aproximadamente)
DELETE FROM `departments`;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `active`, `name`, `email`, `id_leader`, `signature`, `create_date`, `update_date`) VALUES
	(1, 1, 'Suporte', 'noc@bandalargaup.com.br', 1, '', '2018-07-11 10:04:00', NULL),
	(3, 1, 'N3', 'noc@bandalargaup.com.br', 0, '', '2018-07-11 10:04:00', NULL),
	(18, 1, 'tesate', 'teste@terster', NULL, 'asdsadsa', '2018-07-14 20:05:46', NULL),
	(19, 1, 'testeaaa', 'tester@gmail', NULL, 'teste&lt;img src=&quot;https://i.imgur.com/AawLEtX.jpg&quot; style=&quot;max-width: 100%;&quot;&gt;&lt;div&gt;&lt;a href=&quot;http://localhost/upticket&quot; title=&quot;UP Desk&quot; target=&quot;_blank&quot;&gt;teste&lt;/a&gt;&lt;/div&gt;', '2018-07-14 20:12:24', '2018-07-14 21:11:35'),
	(20, 1, 'Diretoria', '123123@gmail', NULL, 'teste&lt;div&gt;teste&lt;/div&gt;', '2018-07-14 21:12:21', '2018-07-14 21:15:16');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.help_topics
CREATE TABLE IF NOT EXISTS `help_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `category` varchar(50) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `id_department` int(11) NOT NULL,
  `auto_id_staff` int(11) DEFAULT NULL,
  `admin_notes` mediumtext,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela helpdesk.help_topics: ~0 rows (aproximadamente)
DELETE FROM `help_topics`;
/*!40000 ALTER TABLE `help_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `help_topics` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.permissions_groups
CREATE TABLE IF NOT EXISTS `permissions_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `params` varchar(200) NOT NULL,
  `admin_notes` text,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela helpdesk.permissions_groups: ~2 rows (aproximadamente)
DELETE FROM `permissions_groups`;
/*!40000 ALTER TABLE `permissions_groups` DISABLE KEYS */;
INSERT INTO `permissions_groups` (`id`, `active`, `name`, `params`, `admin_notes`, `create_date`, `update_date`) VALUES
	(1, 1, 'Full Access', '1,2', 'teste', '2018-07-09 02:24:07', '2018-07-09 02:24:07'),
	(18, 1, 'Acesso PadrÃ£o', '20,21,23,24,2,6,7,13,17,18', 'Acesso PadrÃ£o', '2018-07-11 09:55:02', '2018-07-11 09:57:03');
/*!40000 ALTER TABLE `permissions_groups` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.permissions_params
CREATE TABLE IF NOT EXISTS `permissions_params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_group` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela helpdesk.permissions_params: ~22 rows (aproximadamente)
DELETE FROM `permissions_params`;
/*!40000 ALTER TABLE `permissions_params` DISABLE KEYS */;
INSERT INTO `permissions_params` (`id`, `p_group`, `name`, `description`) VALUES
	(1, 'admin', 'admin', 'PermissÃ£o para acessar painel administrativo'),
	(2, 'tickets', 'criar', 'PermissÃ£o para criar tickets em nome de outros usuÃ¡rios'),
	(3, 'tickets', 'editar', 'PermissÃ£o para editar tickets'),
	(4, 'tickets', 'alocar', 'PermissÃ£o para alocar tickets para agentes ou teams'),
	(5, 'tickets', 'transferir', 'PermissÃ£o para transferir tickets entre setores'),
	(6, 'tickets', 'responder', 'PermissÃ£o para responder tickets'),
	(7, 'tickets', 'fechar', 'PermissÃ£o para fechar tickets'),
	(8, 'tickets', 'apagar', 'PermissÃ£o para apagar tickets'),
	(12, 'tickets', 'editar interaÃ§Ãµes', 'PermissÃ£o para editar interaÃ§Ãµes de outros agentes'),
	(13, 'tarefas', 'criar', 'PermissÃ£o para criar novas tarefas'),
	(14, 'tarefas', 'editar', 'PermissÃ£o para editar tarefas'),
	(15, 'tarefas', 'alocar', 'PermissÃ£o para alocar tarefas para agentes ou times'),
	(16, 'tarefas', 'transferir', 'PermissÃ£o para transferir tarefas entre setores'),
	(17, 'tarefas', 'responder', 'PermissÃ£o para responder tarefas'),
	(18, 'tarefas', 'fechar', 'PermissÃ£o para fechar tarefas'),
	(19, 'tarefas', 'apagar', 'PermissÃ£o para apagar tarefas'),
	(20, 'clientes', 'criar', 'PermissÃ£o para adicionar novos clientes'),
	(21, 'clientes', 'editar', 'PermissÃ£o para gerenciar informaÃ§Ãµes dos clientes'),
	(22, 'clientes', 'apagar', 'PermissÃ£o para apagar clientes'),
	(23, 'empresas', 'criar', 'PermissÃ£o para adicionar novas empresas'),
	(24, 'empresas', 'editar', 'PermissÃ£o para gerenciar informaÃ§Ãµes das empresas'),
	(25, 'empresas', 'apagar', 'PermissÃ£o para apagar empresas');
/*!40000 ALTER TABLE `permissions_params` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `p_group` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `dir_list_show` tinyint(1) NOT NULL,
  `vacation` tinyint(1) NOT NULL,
  `teams` varchar(200) DEFAULT NULL,
  `admin_notes` mediumtext,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela helpdesk.staff: ~2 rows (aproximadamente)
DELETE FROM `staff`;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`id`, `active`, `login`, `pass`, `name`, `surname`, `email`, `phone`, `mobile`, `admin`, `p_group`, `department`, `dir_list_show`, `vacation`, `teams`, `admin_notes`, `create_date`, `update_date`, `last_login`) VALUES
	(1, 1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Ewerton', 'Lucena', 'ewertonlucena@gmail.com', '83 9 8729 4051', '83 9 8729 4051', 1, 1, 1, 0, 0, NULL, NULL, '2018-06-14 14:36:24', NULL, NULL),
	(2, 1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Ewerton', 'Lucena', 'ewertonlucena@gmail.com', '83 9 8729 4051', '83 9 8729 4051', 1, 18, 3, 0, 0, NULL, NULL, '2018-06-14 14:36:24', NULL, NULL);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.task
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `id_corporation` int(11) DEFAULT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `source` varchar(50) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `internal_notes` varchar(100) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela helpdesk.task: ~0 rows (aproximadamente)
DELETE FROM `task`;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
/*!40000 ALTER TABLE `task` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.tasks_attachments
CREATE TABLE IF NOT EXISTS `tasks_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_task` int(11) NOT NULL,
  `id_task_interaction` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela helpdesk.tasks_attachments: ~0 rows (aproximadamente)
DELETE FROM `tasks_attachments`;
/*!40000 ALTER TABLE `tasks_attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks_attachments` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.tasks_interactions
CREATE TABLE IF NOT EXISTS `tasks_interactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_task` int(11) NOT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `reply` mediumtext NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela helpdesk.tasks_interactions: ~0 rows (aproximadamente)
DELETE FROM `tasks_interactions`;
/*!40000 ALTER TABLE `tasks_interactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks_interactions` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `leader_id` int(11) NOT NULL,
  `disable_alerts` tinyint(4) NOT NULL,
  `admin_notes` mediumtext,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela helpdesk.teams: ~0 rows (aproximadamente)
DELETE FROM `teams`;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.tickets
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_corporation` int(11) DEFAULT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `source` varchar(50) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `assigned_id` varchar(100) DEFAULT NULL,
  `subject` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `internal_notes` varchar(100) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela helpdesk.tickets: ~0 rows (aproximadamente)
DELETE FROM `tickets`;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.tickets_attachments
CREATE TABLE IF NOT EXISTS `tickets_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(11) NOT NULL,
  `id_ticket_interaction` int(11) DEFAULT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela helpdesk.tickets_attachments: ~0 rows (aproximadamente)
DELETE FROM `tickets_attachments`;
/*!40000 ALTER TABLE `tickets_attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets_attachments` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.tickets_interactions
CREATE TABLE IF NOT EXISTS `tickets_interactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(11) NOT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `reply` mediumtext NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela helpdesk.tickets_interactions: ~0 rows (aproximadamente)
DELETE FROM `tickets_interactions`;
/*!40000 ALTER TABLE `tickets_interactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets_interactions` ENABLE KEYS */;

-- Copiando estrutura para view helpdesk.view_department_staff
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `view_department_staff` (
	`id` INT(11) NOT NULL,
	`name` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
	`id_department` INT(11) NOT NULL,
	`department` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;

-- Copiando estrutura para view helpdesk.view_department_staff
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `view_department_staff`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_department_staff` AS SELECT staff.id, staff.name, departments.id as id_department, departments.name as department FROM departments, staff WHERE staff.department = departments.id ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
