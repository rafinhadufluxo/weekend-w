DROP DATABASE IF EXISTS weekend;

CREATE DATABASE weekend DEFAULT CHARACTER SET uft8 COLLATE uft8_general_ci;

USE weekend;

DROP USER IF EXISTS 'admweekend'@'localhost';

CREATE USER 'admweekend'@'localhost' IDENTIFIED BY '123456'; 

GRANT SELECT, INSERT, UPDATE, DELETE ON rent.* TO 'admweekend'@'localhost';

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricante`
--
CREATE TABLE fabricante (
  id INTEGER AUTO_INCREMENT PRIMARY KEY,  
  nome VARCHAR(50) NOT NULL   
);
-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,  
  `nome` VARCHAR(50) NOT NULL, 
  `idFabricante` INTEGER,  
  `imagem` VARCHAR(50), 
  `descricao` TEXT, 
  `qtde` integer,
  `valor` real,
  FOREIGN KEY (idFabricante) REFERENCES fabricante(id) 
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingressos`
--

DROP TABLE IF EXISTS `ingressos`;
CREATE TABLE IF NOT EXISTS `ingressos` (
  `idIngresso` INTEGER AUTO_INCREMENT PRIMARY KEY, 
  `qtd` INTEGER, 
  `idCliente` INTEGER,
  `idEvento` INTEGER,
  `dataPedido` DATETIME,
  FOREIGN KEY (idCliente) REFERENCES cliente(idCliente),
  FOREIGN KEY (idEvento) REFERENCES evento(id)
);

-- --------------------------------------------------------

INSERT INTO `Cliente` (`idAdm`, `nome`, `email`, `senha`) VALUES
(1, 'admin', 'admin', 'admin@admin', 'rafinha');



