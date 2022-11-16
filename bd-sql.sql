-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.8-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para pisite
CREATE DATABASE IF NOT EXISTS `pisite` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `pisite`;

-- Copiando estrutura para tabela pisite.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id_blog` int(3) NOT NULL AUTO_INCREMENT,
  `título_blog` varchar(50) DEFAULT NULL,
  `texto_blog` varchar(500) DEFAULT NULL,
  `data_blog` date DEFAULT NULL,
  `nome_img_blog` varchar(50) DEFAULT NULL,
  `id_cont` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_blog`),
  KEY `id_cont` (`id_cont`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_cont`) REFERENCES `conteudo` (`id_cont`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela pisite.blog: ~3 rows (aproximadamente)
INSERT INTO `blog` (`id_blog`, `título_blog`, `texto_blog`, `data_blog`, `nome_img_blog`, `id_cont`) VALUES
	(1, 'Manuntenção Site', 'O site do PandoraBox e seus aplicativos afiliados passarão por um período de manuntenção a partir de 21/07, os ajustes técnicos durarão uma semana. Não se preocupe, voltamos em breve!', '2022-07-19', 'blog-03.jpg', 4),
	(2, 'Novo Projeto', 'Um novo projeto está em desenvolvimento. LibraTour será o primeiro projeto do PandoraBox a ser dedicado a acessibilidade e turismo simultaneamente, um avanço a um mundo novo de ideias!', '2022-09-10', 'blog-02.jpg', 4),
	(3, 'Novo Design', 'Some placeholder content for the first collapse component of this multi-collapse example. This panel is hidden by default but revealed when the user activates the relevant trigger.', '2022-11-07', 'ser-01.jpg', 4);

-- Copiando estrutura para tabela pisite.carrossel
CREATE TABLE IF NOT EXISTS `carrossel` (
  `id_car` int(3) NOT NULL AUTO_INCREMENT,
  `titulo_car` varchar(50) DEFAULT NULL,
  `texto_car` varchar(300) DEFAULT NULL,
  `nome_img_mem` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_car`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela pisite.carrossel: ~3 rows (aproximadamente)
INSERT INTO `carrossel` (`id_car`, `titulo_car`, `texto_car`, `nome_img_mem`) VALUES
	(1, 'LibraTour!', 'O novo projeto da PandoraBox, LibraTour, está disponível agora para todos computadores!', 'car-01.jpg'),
	(2, 'LibraTour: Atualizações!', 'O jogo agora está com novas fases e mais ferramentas para seu aprendizado! Descubra como guiar as experiências de todos com inclusão e conforto.', 'car-02.jpg'),
	(3, 'PandoraBox: Novos Recursos!', 'O site da equipe ganhou novas funções e atualizações, tudo para garantir uma experiência mais confortável a todos.', 'car-03.jpg');

-- Copiando estrutura para tabela pisite.contato
CREATE TABLE IF NOT EXISTS `contato` (
  `id_conta` int(3) NOT NULL AUTO_INCREMENT,
  `tipo_conta` varchar(50) DEFAULT NULL,
  `texto_conta` varchar(60) DEFAULT NULL,
  `nome_img_conta` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_conta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela pisite.contato: ~4 rows (aproximadamente)
INSERT INTO `contato` (`id_conta`, `tipo_conta`, `texto_conta`, `nome_img_conta`) VALUES
	(1, 'localizacao', 'Av. Clara Gianotti de Souza, 257 - Centro, Registro', 'cont-map.png'),
	(2, 'email', 'Pandora.Box@gmail.com', 'cont-email.png'),
	(3, 'telefone', '+ 55 13 99109-2673', 'cont-tel.png'),
	(4, 'telefone', '+ 55 13 3841-2034', 'cont-tel-2.png');

-- Copiando estrutura para tabela pisite.conteudo
CREATE TABLE IF NOT EXISTS `conteudo` (
  `id_cont` int(3) NOT NULL AUTO_INCREMENT,
  `titulo_cont` varchar(30) DEFAULT NULL,
  `texto_cont` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_cont`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela pisite.conteudo: ~4 rows (aproximadamente)
INSERT INTO `conteudo` (`id_cont`, `titulo_cont`, `texto_cont`) VALUES
	(1, 'QUEM SOMOS', 'O PandoraBox é um grupo criado em 2022 a partir da reunião de cinco desenvolvedores em treinamento, que tinham como intuito desenvolver um projeto tecnológico. Atualmente o grupo se mantém no ramo tecnológico e conta com todos seus participantes originais, sendo eles: Andres A., Oliveira A., Almeida C., Souza F. e Almeida L.'),
	(2, 'SERVIÇOS', NULL),
	(3, 'PORTFÓLIO', NULL),
	(4, 'ATUALIZAÇÕES', NULL);

-- Copiando estrutura para tabela pisite.imgprojeto
CREATE TABLE IF NOT EXISTS `imgprojeto` (
  `id_img` int(3) NOT NULL AUTO_INCREMENT,
  `nome_img` varchar(40) DEFAULT NULL,
  `id_proj` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_img`),
  KEY `id_proj` (`id_proj`),
  CONSTRAINT `imgprojeto_ibfk_1` FOREIGN KEY (`id_proj`) REFERENCES `projeto` (`id_proj`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela pisite.imgprojeto: ~5 rows (aproximadamente)
INSERT INTO `imgprojeto` (`id_img`, `nome_img`, `id_proj`) VALUES
	(1, 'port-1.jpg', 1),
	(2, 'port-2.jpg', 1),
	(3, 'port-3.jpg', 1),
	(4, 'port-icon-1.png', 1),
	(5, 'port-icon-2.png', 1);

-- Copiando estrutura para tabela pisite.membro
CREATE TABLE IF NOT EXISTS `membro` (
  `id_mem` int(3) NOT NULL AUTO_INCREMENT,
  `nome_mem` varchar(50) DEFAULT NULL,
  `nome_img_mem` varchar(50) DEFAULT NULL,
  `id_cont` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_mem`),
  KEY `id_cont` (`id_cont`),
  CONSTRAINT `membro_ibfk_1` FOREIGN KEY (`id_cont`) REFERENCES `conteudo` (`id_cont`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela pisite.membro: ~5 rows (aproximadamente)
INSERT INTO `membro` (`id_mem`, `nome_mem`, `nome_img_mem`, `id_cont`) VALUES
	(1, 'Andres A.', 'grupo-allan.jpeg', 1),
	(2, 'Oliveira A.', 'grupo-andre.jpeg', 1),
	(3, 'Almeida C.', 'grupo-carlos.jpeg', 1),
	(4, 'Souza F.', 'grupo-felipe.jpg', 1),
	(5, 'Almeida L.', 'grupo-luiz.jpeg', 1);

-- Copiando estrutura para tabela pisite.mensagem
CREATE TABLE IF NOT EXISTS `mensagem` (
  `id_msg` int(3) NOT NULL AUTO_INCREMENT,
  `email_msg` varchar(50) DEFAULT NULL,
  `texto_msg` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_msg`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela pisite.mensagem: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela pisite.projeto
CREATE TABLE IF NOT EXISTS `projeto` (
  `id_proj` int(3) NOT NULL AUTO_INCREMENT,
  `nome_proj` varchar(50) DEFAULT NULL,
  `descricao_proj` varchar(500) DEFAULT NULL,
  `versao_proj` varchar(20) DEFAULT NULL,
  `data_atualizacao_proj` date DEFAULT NULL,
  `id_cont` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_proj`),
  KEY `id_cont` (`id_cont`),
  CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`id_cont`) REFERENCES `conteudo` (`id_cont`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela pisite.projeto: ~1 rows (aproximadamente)
INSERT INTO `projeto` (`id_proj`, `nome_proj`, `descricao_proj`, `versao_proj`, `data_atualizacao_proj`, `id_cont`) VALUES
	(1, 'LibraTour', 'LibraTour é um jogo sério para computador que auxilia no aprendizado de libras através de fases dinâmicas, as quais se dividem em modalidades competitivas e casuais. Especialmente dedicado a guias turristicos, o jogo conta com um dicionário para localização rápida de palavras e um conteúdo rico em expressões essenciais a profissão, fora um sistema de rankings para motivação e competição saúdavel entre colegas de serviço, a fim de tornar o ensino mais divertido.', '0.1.12', '2022-11-10', 3);

-- Copiando estrutura para tabela pisite.servico
CREATE TABLE IF NOT EXISTS `servico` (
  `id_serv` int(3) NOT NULL AUTO_INCREMENT,
  `titulo_serv` varchar(50) DEFAULT NULL,
  `texto_serv` varchar(300) DEFAULT NULL,
  `nome_img_serv` varchar(50) DEFAULT NULL,
  `id_cont` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_serv`),
  KEY `id_cont` (`id_cont`),
  CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`id_cont`) REFERENCES `conteudo` (`id_cont`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela pisite.servico: ~6 rows (aproximadamente)
INSERT INTO `servico` (`id_serv`, `titulo_serv`, `texto_serv`, `nome_img_serv`, `id_cont`) VALUES
	(1, 'DESIGN DIGITAL', 'Desenvolvimento de designs para sites, logos, etc.', 'icon-design.png', 2),
	(2, 'HTML, CSS', 'Programação de sites para web em HTML e CSS.', 'icon-html.png', 2),
	(3, 'JAVASCRIPT', 'Programação de sites para web em JavaScript.', 'icon-js.png', 2),
	(4, 'PHP', 'Programação de sites para web em PHP.', 'icon-php.png', 2),
	(5, 'BANCO DE DADOS', 'Desenvolvimento de Banco de Dados para sites e softwares.', 'icon-bd.png', 2),
	(6, 'MANUNTENÇÃO', 'Manuntenção e implementação de sites e softwares.', 'icon-manutencao.png', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
