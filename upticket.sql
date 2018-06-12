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

-- Copiando estrutura para tabela helpdesk.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `groups_allowed` varchar(200) NOT NULL,
  `signature` text NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela helpdesk.departments: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.help_topics
CREATE TABLE IF NOT EXISTS `help_topics` (
  `id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `id_department` int(11) NOT NULL,
  `auto_id_staff` int(11) DEFAULT NULL,
  `admin_notes` text,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela helpdesk.help_topics: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `help_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `help_topics` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.permissions_groups
CREATE TABLE IF NOT EXISTS `permissions_groups` (
  `id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `params` varchar(200) NOT NULL,
  `departments` varchar(200) DEFAULT NULL,
  `admin_notes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela helpdesk.permissions_groups: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `permissions_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions_groups` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.permissions_params
CREATE TABLE IF NOT EXISTS `permissions_params` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela helpdesk.permissions_params: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `permissions_params` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions_params` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `login` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `group` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `dir_list_show` tinyint(1) NOT NULL,
  `vacation` tinyint(1) NOT NULL,
  `teams` varchar(200) DEFAULT NULL,
  `admin_notes` text,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela helpdesk.staff: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.stakeholder
CREATE TABLE IF NOT EXISTS `stakeholder` (
  `id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT 'client or provider',
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
  `internal_obs` text,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela helpdesk.stakeholder: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `stakeholder` DISABLE KEYS */;
/*!40000 ALTER TABLE `stakeholder` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.stakeholder_contacts
CREATE TABLE IF NOT EXISTS `stakeholder_contacts` (
  `id` int(11) NOT NULL,
  `id_stakeholder` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela helpdesk.stakeholder_contacts: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `stakeholder_contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `stakeholder_contacts` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.stakeholder_contracts
CREATE TABLE IF NOT EXISTS `stakeholder_contracts` (
  `id` int(11) NOT NULL,
  `id_stakeholder` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `type` varchar(50) NOT NULL COMMENT 'compra ou venda',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela helpdesk.stakeholder_contracts: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `stakeholder_contracts` DISABLE KEYS */;
/*!40000 ALTER TABLE `stakeholder_contracts` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.stakeholder_users
CREATE TABLE IF NOT EXISTS `stakeholder_users` (
  `id` int(11) NOT NULL,
  `id_stakeholder` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela helpdesk.stakeholder_users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `stakeholder_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `stakeholder_users` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL,
  `active` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `leader_id` int(11) NOT NULL,
  `disable_alerts` tinyint(4) NOT NULL,
  `admin_notes` text,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela helpdesk.teams: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;

-- Copiando estrutura para tabela helpdesk.tickets
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_stakeholder` int(11) NOT NULL,
  `source` varchar(50) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `internal_notes` varchar(100) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela helpdesk.tickets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
