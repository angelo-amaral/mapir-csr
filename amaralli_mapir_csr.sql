
--SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
--SET time_zone = "+00:00";

--
-- Banco de dados: `amaralli_mapir_csr`
--
CREATE DATABASE IF NOT EXISTS `amaralli_mapir_csr` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `amaralli_mapir_csr`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `m_requisito_software`
--

DROP TABLE IF EXISTS `m_requisito_software`;
CREATE TABLE IF NOT EXISTS `m_requisito_software` (
  `ID_Req_Sw` varchar(6) NOT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `story_points` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID_Req_Sw`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tabela truncada antes do insert `m_requisito_software`
--

TRUNCATE TABLE `m_requisito_software`;
--
-- Despejando dados para a tabela `m_requisito_software`
--

INSERT INTO `m_requisito_software` (`ID_Req_Sw`, `Titulo`, `story_points`) VALUES
('β01', 'Tela de Manutenção dos Produtos', 13),
('β02', 'Tela de controle de estoque com geração de relatórios', 13),
('β03', 'Consulta de disponibilidade de estoque dos produtos', 5),
('β04', 'Tela de Manutenção de Clientes', 5),
('β05', 'Bloqueio de cadastro de clientes por inadimplência', 3),
('β06', 'Tela de configuração da geração de relatórios', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `m_requisito_sistema`
--

--DROP TABLE IF EXISTS `m_requisito_sistema`;
CREATE TABLE IF NOT EXISTS `m_requisito_sistema` (
  `ID_Req_Sis` varchar(6) NOT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Req_Sis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tabela truncada antes do insert `m_requisito_sistema`
--

TRUNCATE TABLE `m_requisito_sistema`;
--
-- Despejando dados para a tabela `m_requisito_sistema`
--

INSERT INTO `m_requisito_sistema` (`ID_Req_Sis`, `Titulo`) VALUES
('α01', 'O controle de inventário deve manter registro dos produtos com saldo de estoque e permitir pesquisas'),
('α02', 'Somente produtos registrados no inventário podem ser vendidos; Clientes precisam de um cadastro ativo para poderem comprar'),
('α03', 'Clientes inadimplentes devem ter seus cadastros inativados');

-- --------------------------------------------------------

--
-- Estrutura para tabela `m_requisito_usuario`
--

DROP TABLE IF EXISTS `m_requisito_usuario`;
CREATE TABLE IF NOT EXISTS `m_requisito_usuario` (
  `ID_Req_Usu` varchar(6) NOT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Req_Usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tabela truncada antes do insert `m_requisito_usuario`
--

TRUNCATE TABLE `m_requisito_usuario`;
--
-- Despejando dados para a tabela `m_requisito_usuario`
--

INSERT INTO `m_requisito_usuario` (`ID_Req_Usu`, `Titulo`) VALUES
('ω01', 'Criar um e-Commerce com site de vendas e controle de inventário');


-- --------------------------------------------------------

--
-- Estrutura para tabela `m_requisito_sistema_usuario`
--

DROP TABLE IF EXISTS `m_requisito_sistema_usuario`;
CREATE TABLE IF NOT EXISTS `m_requisito_sistema_usuario` (
  `ID_Req_Sis` varchar(6) NOT NULL,
  `ID_Req_Usu` varchar(6) NOT NULL,
  PRIMARY KEY (`ID_Req_Sis`,`ID_Req_Usu`),
  KEY `fk_req_sis_usu_usu` (`ID_Req_Usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tabela truncada antes do insert `m_requisito_sistema_usuario`
--

TRUNCATE TABLE `m_requisito_sistema_usuario`;
--
-- Despejando dados para a tabela `m_requisito_sistema_usuario`
--

INSERT INTO `m_requisito_sistema_usuario` (`ID_Req_Sis`, `ID_Req_Usu`) VALUES
('α01', 'ω01'),
('α02', 'ω01'),
('α03', 'ω01');

-- --------------------------------------------------------


--
-- Estrutura para tabela `m_requisito_software_sistema`
--

DROP TABLE IF EXISTS `m_requisito_software_sistema`;
CREATE TABLE IF NOT EXISTS `m_requisito_software_sistema` (
  `ID_Req_Sw` varchar(6) NOT NULL,
  `ID_Req_Sis` varchar(6) NOT NULL,
  PRIMARY KEY (`ID_Req_Sw`,`ID_Req_Sis`),
  KEY `fk_req_sw_sis_sis` (`ID_Req_Sis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tabela truncada antes do insert `m_requisito_software_sistema`
--

TRUNCATE TABLE `m_requisito_software_sistema`;
--
-- Despejando dados para a tabela `m_requisito_software_sistema`
--

INSERT INTO `m_requisito_software_sistema` (`ID_Req_Sw`, `ID_Req_Sis`) VALUES
('β01', 'α01'),
('β02', 'α01'),
('β03', 'α01'),
('β03', 'α02'),
('β04', 'α02'),
('β04', 'α03'),
('β05', 'α03'),
('β06', 'α01');


--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `m_requisito_sistema_usuario`
--
ALTER TABLE `m_requisito_sistema_usuario`
  ADD CONSTRAINT `fk_req_sis_usu_sis` FOREIGN KEY (`ID_Req_Sis`) REFERENCES `m_requisito_sistema` (`ID_Req_Sis`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_req_sis_usu_usu` FOREIGN KEY (`ID_Req_Usu`) REFERENCES `m_requisito_usuario` (`ID_Req_Usu`) ON UPDATE CASCADE;

--
-- Restrições para tabelas `m_requisito_software_sistema`
--
ALTER TABLE `m_requisito_software_sistema`
  ADD CONSTRAINT `fk_req_sw_sis_sis` FOREIGN KEY (`ID_Req_Sis`) REFERENCES `m_requisito_sistema` (`ID_Req_Sis`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_req_sw_sis_sw` FOREIGN KEY (`ID_Req_Sw`) REFERENCES `m_requisito_software` (`ID_Req_Sw`) ON UPDATE CASCADE;
COMMIT;
