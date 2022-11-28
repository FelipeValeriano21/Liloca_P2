-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Nov-2022 às 20:09
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_liloca`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `consulta_clientes` (IN `id_Cliente` INT)   select * from cliente$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consulta_festas` (`idFesta` INT)   select * from festa$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consulta_produtos` (`idProduto` INT)   select * from produto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_cliente` (IN `userid` INT)   BEGIN
set @userid = userid;  
DELETE FROM cliente
 WHERE idcliente=userid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_festa` (IN `festaid` INT)   BEGIN
set @festaid = festaid;  
DELETE FROM festa
 WHERE idFesta=festaid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_produto` (IN `userid` INT)   BEGIN
set @userid = userid;  
DELETE FROM produto
 WHERE idProduto=userid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editar_cliente` (IN `txtid` INT, IN `txtnome` VARCHAR(30), IN `txtemail` VARCHAR(30), IN `txttelefone` INT(11), IN `txtendereco` VARCHAR(30), IN `txtcpf` INT(11))   BEGIN

set @txtid = txtid;
set @txttxtnome = txtnome;  
set @txtemail = txtemail;  
set @txttelefone = txttelefone;  
set @txtendereco = txtendereco; 
set @txtcpf = txtcpf; 

update cliente set nome = txtnome , email = txtemail , telefone = txttelefone, endereco = txtendereco, cpf = txtcpf WHERE idCliente = txtid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editar_festa` (IN `txtidFesta` INT, IN `txtCliente_idCliente` INT(11), IN `txtaniversariante` VARCHAR(30), IN `txtidade` INT(11), IN `txtendereco` VARCHAR(30), IN `txttema` VARCHAR(30), IN `txtcores` VARCHAR(30), IN `txtdata_festa` DATE)   BEGIN

SET @txtidFesta=txtidFesta;
SET @txtCliente_idCliente=txtCliente_idCliente;
SET @txtaniversariante=txtaniversariante;
SET @txtidade=txtidade;
SET @txtendereco=txtendereco;
SET @txttema=txttema;
SET @txtcores = txtcores; 
SET @txtdata_festa = txtdata_festa;

update festa set idCliente_fk = txtCliente_idCliente , aniversariante = txtaniversariante , idade = txtidade, endereco = txtendereco, tema = txttema, data_festa = txtdata_festa, cores = txtcores  WHERE idFesta = txtidFesta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editar_produto` (IN `txtid` INT, IN `txtnome` VARCHAR(30), IN `txtestoque` INT(11), IN `txttipo` VARCHAR(30), IN `txtmedicao` VARCHAR(30), IN `txtvalor_unit` FLOAT(5))   BEGIN

SET @txtid=txtid;
SET @txtnome=txtnome;
SET @txtestoque=txtestoque;
SET @txttipo=txttipo;
SET @txtmedicao=txtmedicao;
SET @txtvalor_unit=txtvalor_unit;

update produto set nome = txtnome , estoque = txtestoque , tipo = txttipo, medida = txtmedicao, valor_unit = txtvalor_unit WHERE idProduto = txtid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Inserir_cliente` (IN `txtidCliente` INT, IN `txtnome` VARCHAR(30), IN `txtemail` VARCHAR(30), IN `txttelefone` INT(11), IN `txtendereco` VARCHAR(30), IN `txtcpf` INT(11))   BEGIN

SET @txtidCliente=txtidCliente;
SET @txtnome=txtnome;
SET @txtemail=txtemail;
SET @txttelefone=txttelefone;
SET @txtendereco=txtendereco;
SET @txtcpf=txtcpf;
PREPARE STMT FROM
    "INSERT INTO cliente (idCliente, nome, email, telefone, endereco, cpf) VALUES (?,?,?,?,?,?)";
    EXECUTE STMT USING @txtidCliente,@txtnome,@txtemail,@txttelefone,@txtendereco,@txtcpf;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Inserir_festa` (IN `txtidFesta` INT, IN `txtCliente_idCliente` INT(11), IN `txtaniversariante` VARCHAR(30), IN `txtidade` INT(11), IN `txtendereco` VARCHAR(30), IN `txttema` VARCHAR(30), IN `txtcores` VARCHAR(30), IN `txtdata_festa` DATE)   BEGIN

SET @txtidFesta=txtidFesta;
SET @txtCliente_idCliente=txtCliente_idCliente;
SET @txtaniversariante=txtaniversariante;
SET @txtidade=txtidade;
SET @txtendereco=txtendereco;
SET @txttema=txttema;
SET @txtdata_festa = txtdata_festa;
SET @txtcores = txtcores; 

PREPARE STMT FROM
    "INSERT INTO festa (idFesta, idCliente_fk, aniversariante, idade, endereco, tema, data_festa, cores) VALUES (?,?,?,?,?,?,?,?)";
    
    EXECUTE STMT USING @txtidFesta,@txtCliente_idCliente,@txtaniversariante,@txtidade,@txtendereco,@txttema,@txtdata_festa,@txtcores;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Inserir_produto` (IN `txtid` INT, IN `txtnome` VARCHAR(30), IN `txtestoque` INT(11), IN `txttipo` VARCHAR(11), IN `txtmedicao` VARCHAR(30), IN `txtvalor_unit` FLOAT(11))   BEGIN

SET @txtid=txtid;
SET @txtnome=txtnome;
SET @txtestoque=txtestoque;
SET @txttipo=txttipo;
SET @txtmedicao=txtmedicao;
SET @txtvalor_unit=txtvalor_unit;
PREPARE STMT FROM
    "INSERT INTO produto (idProduto, nome, estoque, tipo, medida, valor_unit) VALUES (?,?,?,?,?,?)";
    EXECUTE STMT USING @txtid, @txtnome,@txtestoque, @txttipo, @txtmedicao, @txtvalor_unit;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(10) UNSIGNED NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `cpf` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nome`, `email`, `telefone`, `endereco`, `cpf`) VALUES
(1, 'Felipe Reis', 'felipe@gmail.com', '58741153', 'Rua Botafogo 23', 55555555),
(2, 'Rosana', 'Rosana@gmai.com', '56569889', 'Madrid Espanha', 455454554);

-- --------------------------------------------------------

--
-- Estrutura da tabela `festa`
--

CREATE TABLE `festa` (
  `idFesta` int(10) UNSIGNED NOT NULL,
  `idCliente_fk` int(10) UNSIGNED NOT NULL,
  `aniversariante` varchar(200) DEFAULT NULL,
  `idade` int(10) UNSIGNED DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `tema` varchar(200) DEFAULT NULL,
  `data_festa` date DEFAULT NULL,
  `cores` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `festa`
--

INSERT INTO `festa` (`idFesta`, `idCliente_fk`, `aniversariante`, `idade`, `endereco`, `tema`, `data_festa`, `cores`) VALUES
(1, 1, 'Denise', 30, 'Rua Hala Madrid', 'Corinthians', '2022-12-01', 'Preto'),
(3, 2, 'Matheus', 12, 'Rua Visca Barca', 'Musica', '2023-01-11', 'Marrom');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_de_pedido`
--

CREATE TABLE `itens_de_pedido` (
  `pedido_fk` int(10) UNSIGNED NOT NULL,
  `produto_fk` int(10) UNSIGNED NOT NULL,
  `valor` int(5) DEFAULT NULL,
  `quantidade` int(5) DEFAULT NULL,
  `medida` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens_de_pedido`
--

INSERT INTO `itens_de_pedido` (`pedido_fk`, `produto_fk`, `valor`, `quantidade`, `medida`) VALUES
(1, 3, 150, 2, 'kg'),
(1, 5, 50, 1, 'kg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(10) UNSIGNED NOT NULL,
  `idFesta_fk` int(10) UNSIGNED NOT NULL,
  `data_pedido` date DEFAULT NULL,
  `prazo` date DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `tipo_entrega` varchar(200) DEFAULT NULL,
  `frete` double DEFAULT NULL,
  `sinal` double DEFAULT NULL,
  `restante` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idFesta_fk`, `data_pedido`, `prazo`, `data_entrega`, `tipo_entrega`, `frete`, `sinal`, `restante`) VALUES
(1, 1, '2022-08-06', '2022-08-05', '2022-08-06', 'Delivery', 90, 45, 45),
(2, 3, '2022-11-28', '2022-01-10', '2022-01-10', 'Buscar na loja', 90, 50, 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(10) UNSIGNED NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `estoque` int(5) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `medida` float DEFAULT NULL,
  `valor_unit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `estoque`, `tipo`, `medida`, `valor_unit`) VALUES
(3, 'Bolo de Chocolate', 10, 'Comida', 2, 150),
(5, 'Bolo de cenoura', 5, 'Comida', 1, 50);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `festa`
--
ALTER TABLE `festa`
  ADD PRIMARY KEY (`idFesta`),
  ADD KEY `idCliente_fk` (`idCliente_fk`);

--
-- Índices para tabela `itens_de_pedido`
--
ALTER TABLE `itens_de_pedido`
  ADD PRIMARY KEY (`pedido_fk`,`produto_fk`),
  ADD KEY `Pedido_has_Produtos_FKIndex1` (`pedido_fk`),
  ADD KEY `Pedido_has_Produtos_FKIndex2` (`produto_fk`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idFesta_fk` (`idFesta_fk`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `festa`
--
ALTER TABLE `festa`
  ADD CONSTRAINT `idCliente_fk` FOREIGN KEY (`idCliente_fk`) REFERENCES `cliente` (`idCliente`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `idFesta_fk` FOREIGN KEY (`idFesta_fk`) REFERENCES `festa` (`idFesta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
