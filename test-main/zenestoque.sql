-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Maio-2026 às 23:51
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `zenestoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `armazenamento`
--

CREATE TABLE `armazenamento` (
  `id_armazenamento` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `local` varchar(300) DEFAULT NULL,
  `capacidade` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `armazenamento`
--

INSERT INTO `armazenamento` (`id_armazenamento`, `nome`, `local`, `capacidade`, `id_status`) VALUES
(1, 'Prateleira A1', 'Corredor A', 100, 1),
(2, 'Prateleira A2', 'Corredor A', 100, 1),
(3, 'Prateleira B1', 'Corredor B', 120, 1),
(4, 'Prateleira B2', 'Corredor B', 120, 1),
(5, 'Geladeira 1', 'Setor Frios', 200, 1),
(6, 'Geladeira 2', 'Setor Frios', 200, 1),
(7, 'Freezer 1', 'Congelados', 150, 1),
(8, 'Freezer 2', 'Congelados', 150, 1),
(9, 'Depósito Principal', 'Fundos', 1000, 1),
(10, 'Depósito Secundário', 'Fundos', 500, 1),
(11, 'Estoque Limpeza', 'Sala 1', 300, 1),
(12, 'Estoque Higiene', 'Sala 2', 300, 1),
(13, 'Vitrine 1', 'Loja', 50, 1),
(14, 'Vitrine 2', 'Loja', 50, 1),
(15, 'Reserva', 'Mezanino', 400, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome`) VALUES
(1, 'Bebidas'),
(2, 'Doces'),
(3, 'Salgados'),
(4, 'Laticínios'),
(5, 'Congelados'),
(6, 'Padaria'),
(7, 'Limpeza'),
(8, 'Higiene'),
(9, 'Mercearia'),
(10, 'Frios'),
(11, 'Carnes'),
(12, 'Frutas'),
(13, 'Verduras'),
(14, 'Temperos'),
(15, 'Pet Shop');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id_estoque` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_armazenamento` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id_estoque`, `id_produto`, `id_armazenamento`, `quantidade`, `id_status`) VALUES
(2, 16, 1, 50, 1),
(3, 2, 1, 40, 1),
(4, 3, 2, 60, 1),
(5, 4, 3, 20, 1),
(7, 16, 1, 50, 1),
(8, 2, 1, 40, 1),
(9, 3, 2, 60, 1),
(10, 4, 3, 20, 1),
(11, 17, 7, 35, 1),
(12, 6, 5, 80, 1),
(13, 7, 11, 100, 1),
(15, 16, 1, 50, 1),
(16, 2, 1, 40, 1),
(17, 3, 2, 60, 1),
(18, 4, 3, 20, 1),
(19, 17, 7, 35, 1),
(20, 6, 5, 80, 1),
(21, 7, 11, 100, 1),
(22, 18, 11, 75, 1),
(23, 9, 5, 90, 1),
(24, 10, 6, 60, 1),
(25, 11, 7, 40, 1),
(26, 12, 2, 55, 1),
(27, 13, 3, 70, 1),
(28, 14, 9, 120, 1),
(29, 15, 12, 200, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`id_marca`, `nome`) VALUES
(1, 'Coca-Cola'),
(2, 'Pepsi'),
(3, 'Nestlé'),
(4, 'Bauducco'),
(5, 'Sadia'),
(6, 'Perdigão'),
(7, 'Ypê'),
(8, 'OMO'),
(9, 'Piracanjuba'),
(10, 'Itambé'),
(11, 'Aurora'),
(12, 'Qualy'),
(13, 'Adria'),
(14, 'Tio João'),
(15, 'Bombril');

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo`
--

CREATE TABLE `periodo` (
  `id_periodo` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `periodo`
--

INSERT INTO `periodo` (`id_periodo`, `nome`) VALUES
(1, '05h às 06h'),
(2, '06h às 08h'),
(3, '08h às 10h'),
(4, '10h às 12h'),
(5, '12h às 14h'),
(6, '14h às 16h'),
(7, '16h às 18h'),
(8, '18h às 20h'),
(9, '20h às 22h'),
(10, '22h às 00h'),
(11, 'Madrugada'),
(12, 'Manhã'),
(13, 'Tarde'),
(14, 'Noite'),
(15, 'Integral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `custo` double DEFAULT NULL,
  `lucro` double GENERATED ALWAYS AS (`preco` - `custo`) STORED,
  `descricao` varchar(300) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `preco`, `custo`, `descricao`, `id_categoria`, `id_tipo`, `id_marca`, `id_status`) VALUES
(2, 'Coca-Cola 2L', 12.99, 8.5, 'Refrigerante Coca-Cola 2L', 1, 1, 1, NULL),
(3, 'Fanta Laranja 2L', 9.99, 6.5, 'Refrigerante sabor laranja', 1, 5, 1, NULL),
(4, 'Sprite 2L', 9.99, 6.5, 'Refrigerante sabor limão', 1, 5, 1, NULL),
(6, 'Fanta Laranja 2L', 9.99, 6.5, 'Refrigerante sabor laranja', 1, 5, 1, NULL),
(7, 'Sprite 2L', 9.99, 6.5, 'Refrigerante sabor limão', 1, 5, 1, NULL),
(9, 'Fanta Laranja 2L', 9.99, 6.5, 'Refrigerante sabor laranja', 1, 5, 1, NULL),
(10, 'Sprite 2L', 9.99, 6.5, 'Refrigerante sabor limão', 1, 5, 1, NULL),
(11, 'Chocolate KitKat', 4.99, 2.5, 'Chocolate wafer', 2, 1, 3, NULL),
(12, 'Biscoito Bauducco', 5.99, 3.2, 'Biscoito recheado', 2, 2, 4, NULL),
(13, 'Pizza Sadia', 19.9, 13.5, 'Pizza congelada', 5, 1, 5, NULL),
(14, 'Mortadela Perdigão', 8.99, 5.5, 'Mortadela fatiada', 10, 10, 6, NULL),
(15, 'Amaciante Ypê', 12.99, 8, 'Amaciante concentrado', 7, 11, 7, NULL),
(16, 'Sabão Líquido OMO', 21.9, 15, 'Sabão líquido para roupas', 7, 11, 8, NULL),
(17, 'Leite Condensado Piracanjuba', 7.99, 5.2, 'Leite condensado tradicional', 4, 1, 9, NULL),
(18, 'Manteiga Itambé', 11.99, 7.5, 'Manteiga com sal', 4, 8, 10, NULL),
(19, 'Salsicha Aurora', 12.99, 8.5, 'Salsicha tradicional', 11, 2, 11, NULL),
(20, 'Requeijão Qualy', 9.9, 6.2, 'Requeijão cremoso', 4, 8, 12, NULL),
(21, 'Macarrão Parafuso Adria', 4.5, 2.3, 'Macarrão parafuso', 9, 1, 13, NULL),
(22, 'Feijão Carioca Tio João', 8.99, 5.9, 'Feijão carioca 1kg', 9, 10, 14, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id_status`, `nome`) VALUES
(1, 'ativo'),
(2, 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `nome` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nome`) VALUES
(1, 'Unidade'),
(2, 'Pacote'),
(3, 'Caixa'),
(4, 'Fardo'),
(5, 'Garrafa'),
(6, 'Lata'),
(7, 'Sachê'),
(8, 'Pote'),
(9, 'Bandeja'),
(10, 'Quilograma'),
(11, 'Litro'),
(12, 'Metro'),
(13, 'Cartela'),
(14, 'Galão'),
(15, 'Rolo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(500) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `nivel_acesso` int(11) DEFAULT NULL,
  `foto` varchar(1000) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `nome`, `cpf`, `email`, `senha`, `telefone`, `endereco`, `cargo`, `nivel_acesso`, `foto`, `id_status`) VALUES
(1, 'eduardo', '08899578721', 'teste@teste.com', '12345678', '4002-8922', 'Rua: Fatec de ferraz', 'Analista', 1, '../imagens/1780264252_logo futurize.PNG', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_estoque` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_armazenamento` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_venda` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `armazenamento`
--
ALTER TABLE `armazenamento`
  ADD PRIMARY KEY (`id_armazenamento`),
  ADD KEY `id_status` (`id_status`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id_estoque`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_armazenamento` (`id_armazenamento`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Índices para tabela `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_status` (`id_status`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_status` (`id_status`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_armazenamento` (`id_armazenamento`),
  ADD KEY `id_estoque` (`id_estoque`),
  ADD KEY `id_periodo` (`id_periodo`),
  ADD KEY `id_produto` (`id_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `armazenamento`
--
ALTER TABLE `armazenamento`
  MODIFY `id_armazenamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `armazenamento`
--
ALTER TABLE `armazenamento`
  ADD CONSTRAINT `armazenamento_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `estoque_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `estoque_ibfk_3` FOREIGN KEY (`id_armazenamento`) REFERENCES `armazenamento` (`id_armazenamento`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`),
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `produto_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_armazenamento`) REFERENCES `armazenamento` (`id_armazenamento`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`id_estoque`) REFERENCES `estoque` (`id_estoque`),
  ADD CONSTRAINT `venda_ibfk_3` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`),
  ADD CONSTRAINT `venda_ibfk_4` FOREIGN KEY (`id_produto`) REFERENCES `armazenamento` (`id_armazenamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
