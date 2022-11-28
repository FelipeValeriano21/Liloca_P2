-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Nov-2022 às 10:59
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `consulta_clientes` (`id_Cliente` INT)   select * from cliente$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `editar_festa` (IN `txtidFesta` INT, IN `txtCliente_idCliente` INT(9), IN `txtnome` VARCHAR(30), IN `txtidade` INT(11), IN `txtendereco` VARCHAR(30), IN `txttema` VARCHAR(30), IN `txtcores` VARCHAR(30), IN `txtdata_festa` DATE)   BEGIN

SET @txtidFesta=txtidFesta;
SET @txtCliente_idCliente=txtCliente_idCliente;
SET @txtnome=txtnome;
SET @txtidade=txtidade;
SET @txtendereco=txtendereco;
SET @txttema=txttema;
SET @txtcores=txtcores;
SET @txtdata_festa=txtdata_festa;

update festa set Cliente_idCliente=txtCliente_idCliente , nome=txtnome , idade=txtidade, endereco=txtendereco, tema=txttema, cores=txtcores, data_festa=txtdata_festa  WHERE idFesta = txtidFesta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editar_produto` (IN `txtid` INT, IN `txtnome` VARCHAR(30), IN `txtvalor_unit` INT(11), IN `txtquantidade` INT(11), IN `txtmedicao` VARCHAR(30))   BEGIN

SET @txtid=txtid;
SET @txtnome=txtnome;
SET @txtvalor_unit=txtvalor_unit;
SET @txtquantidade=txtquantidade;
SET @txtmedicao=txtmedicao;

update produto set nome = txtnome , valor_unit = txtvalor_unit , quantidade=txtquantidade, medicao=txtmedicao  WHERE idProduto = txtid;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `Inserir_festa` (IN `txtidFesta` INT, IN `txtCliente_idCliente` INT(9), IN `txtnome` VARCHAR(30), IN `txtidade` INT(11), IN `txtendereco` VARCHAR(30), IN `txttema` VARCHAR(30), IN `txtcores` VARCHAR(30), IN `txtdata_festa` DATE)   BEGIN

SET @txtidFesta=txtidFesta;
SET @txtCliente_idCliente=txtCliente_idCliente;
SET @txtnome=txtnome;
SET @txtidade=txtidade;
SET @txtendereco=txtendereco;
SET @txttema=txttema;
SET @txtcores=txtcores;
SET @txtdata_festa=txtdata_festa;

PREPARE STMT FROM
    "INSERT INTO festa (idFesta, Cliente_idCliente, nome, idade, endereco, tema, cores, data_festa) VALUES (?,?,?,?,?,?,?,?)";
    EXECUTE STMT USING @txtidFesta,@txtCliente_idCliente,@txtnome,@txtidade,@txtendereco,@txttema,@txtcores,@txtdata_festa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Inserir_produto` (IN `txtid` INT, IN `txtnome` VARCHAR(30), IN `txtvalor_unit` INT(11), IN `txtquantidade` INT(11), IN `txtmedicao` VARCHAR(30))   BEGIN

SET @txtid=txtid;
SET @txtnome=txtnome;
SET @txtvalor_unit=txtvalor_unit;
SET @txtquantidade=txtquantidade;
SET @txtmedicao=txtmedicao;
PREPARE STMT FROM
    "INSERT INTO produto (idProduto, nome, valor_unit, quantidade, medicao) VALUES (?,?,?,?,?)";
    EXECUTE STMT USING @txtid, @txtnome, @txtvalor_unit, @txtquantidade, @txtmedicao;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebida`
--

CREATE TABLE `bebida` (
  `idBebida` int(10) UNSIGNED NOT NULL,
  `Produto_idProduto` int(10) UNSIGNED NOT NULL,
  `medida` int(10) UNSIGNED DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `sabor` varchar(45) DEFAULT NULL,
  `quantidade` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(10) UNSIGNED NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `cpf` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nome`, `email`, `telefone`, `endereco`, `cpf`) VALUES
(22, 'Felipe Valeriano ', 'felipeReis@hotmail.com.br', '1196285263', 'Rua Manuel Soares Filho 51', 546465588),
(28, 'Ayrton Senna Cabani', 'Ayrton@gmail.com', '2147483647', 'Rua Botafogo 52', 2147483647),
(42, 'Manuela Silva', 'Manuela@gmail.com', '1196354536', 'Rua Gagliano 25', 123456);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comida`
--

CREATE TABLE `comida` (
  `idComida` int(10) UNSIGNED NOT NULL,
  `Produto_idProduto` int(10) UNSIGNED NOT NULL,
  `medicao` int(11) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `decoracao`
--

CREATE TABLE `decoracao` (
  `idDecoracao` int(10) UNSIGNED NOT NULL,
  `Produto_idProduto` int(10) UNSIGNED NOT NULL,
  `tamanho` int(10) UNSIGNED DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `festa`
--

CREATE TABLE `festa` (
  `idFesta` int(10) UNSIGNED NOT NULL,
  `Cliente_idCliente` int(10) UNSIGNED NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `idade` int(10) UNSIGNED DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `tema` varchar(200) DEFAULT NULL,
  `cores` varchar(200) DEFAULT NULL,
  `data_festa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `festa`
--

INSERT INTO `festa` (`idFesta`, `Cliente_idCliente`, `nome`, `idade`, `endereco`, `tema`, `cores`, `data_festa`) VALUES
(3, 3, 'Felipe', 19, 'Madrid Espanha', 'Musica', 'Marrom', '2023-11-05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `Pedido_idPedido` int(10) UNSIGNED NOT NULL,
  `Produto_idProduto` int(10) UNSIGNED NOT NULL,
  `valor` int(10) UNSIGNED DEFAULT NULL,
  `quantidade` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(10) UNSIGNED NOT NULL,
  `data_pedido` date DEFAULT NULL,
  `data_festa` date DEFAULT NULL,
  `prazo` date DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `tipo_entrega` varchar(200) DEFAULT NULL,
  `frete` double DEFAULT NULL,
  `sinal` double DEFAULT NULL,
  `restante` double DEFAULT NULL,
  `id_festa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(10) UNSIGNED NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `valor_unit` double DEFAULT NULL,
  `quantidade` int(20) NOT NULL,
  `medicao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `valor_unit`, `quantidade`, `medicao`) VALUES
(1, 'Bolo de Chocolate', 42, 30, '1kg'),
(5, 'Refrigerante', 5, 25, '2L'),
(6, 'Brigadeiro', 2, 500, '10g');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`idBebida`,`Produto_idProduto`),
  ADD KEY `Bebida_FKIndex1` (`Produto_idProduto`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`idComida`,`Produto_idProduto`),
  ADD KEY `Comida_FKIndex1` (`Produto_idProduto`);

--
-- Índices para tabela `decoracao`
--
ALTER TABLE `decoracao`
  ADD PRIMARY KEY (`idDecoracao`,`Produto_idProduto`),
  ADD KEY `Decoracao_FKIndex1` (`Produto_idProduto`);

--
-- Índices para tabela `festa`
--
ALTER TABLE `festa`
  ADD PRIMARY KEY (`idFesta`),
  ADD KEY `Festa_FKIndex1` (`Cliente_idCliente`);

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`Pedido_idPedido`,`Produto_idProduto`),
  ADD KEY `Pedido_has_Produto_FKIndex1` (`Pedido_idPedido`),
  ADD KEY `Pedido_has_Produto_FKIndex2` (`Produto_idProduto`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bebida`
--
ALTER TABLE `bebida`
  MODIFY `idBebida` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `comida`
--
ALTER TABLE `comida`
  MODIFY `idComida` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `decoracao`
--
ALTER TABLE `decoracao`
  MODIFY `idDecoracao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `festa`
--
ALTER TABLE `festa`
  MODIFY `idFesta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
