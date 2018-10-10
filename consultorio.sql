-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Out-2018 às 13:46
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consultorio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acompanhante`
--

CREATE TABLE `acompanhante` (
  `id` bigint(10) NOT NULL,
  `id_paciente` bigint(10) NOT NULL,
  `id_usuario` bigint(10) NOT NULL,
  `responsavel` int(1) NOT NULL,
  `parentesco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `acompanhante`
--

INSERT INTO `acompanhante` (`id`, `id_paciente`, `id_usuario`, `responsavel`, `parentesco`, `status`) VALUES
(1, 1, 1, 1, 'Pessoal', 1),
(3, 1, 3, 0, 'Irmão', 1),
(5, 12, 5, 1, '', 1),
(6, 5, 13, 1, 'Irmã', 1),
(7, 5, 14, 2, 'Irmã', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE `contrato` (
  `id` bigint(10) NOT NULL,
  `id_paciente` bigint(10) NOT NULL,
  `datainicio` bigint(10) NOT NULL,
  `datatermino` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`id`, `id_paciente`, `datainicio`, `datatermino`) VALUES
(1, 1, 0, 0),
(2, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `financeiro`
--

CREATE TABLE `financeiro` (
  `id` bigint(10) NOT NULL,
  `id_paciente` bigint(10) NOT NULL,
  `valor` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataconsulta` bigint(10) NOT NULL,
  `datapagamento` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `financeiro`
--

INSERT INTO `financeiro` (`id`, `id_paciente`, `valor`, `dataconsulta`, `datapagamento`) VALUES
(1, 1, '381,90', 0, 0),
(3, 1, '381,90', 0, 1538703939),
(4, 1, '381,90', 0, 0),
(5, 11, '130', 0, 0),
(6, 11, '130', 0, 0),
(7, 11, '130', 0, 0),
(8, 11, '130.5', 0, 0),
(9, 11, '130.5', 0, 0),
(10, 0, '130.5', 0, 0),
(11, 0, '149,90', 0, 0),
(12, 5, '149,90', 0, 0),
(13, 0, '150,98', 1, 0),
(14, 5, '150,97', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacao_pessoal`
--

CREATE TABLE `informacao_pessoal` (
  `id` bigint(10) NOT NULL,
  `usuario` bigint(10) NOT NULL,
  `fixo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(10) NOT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacao` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orgao_expedidor` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataatualizacao` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `informacao_pessoal`
--

INSERT INTO `informacao_pessoal` (`id`, `usuario`, `fixo`, `celular`, `endereco`, `numero`, `complemento`, `observacao`, `email`, `cpf`, `identidade`, `orgao_expedidor`, `dataatualizacao`) VALUES
(1, 1, '', '992897323', 'R', 250, '', '', '', '137', '27177', 'DETRAN-RJ', 0),
(2, 0, '9999-9999', '99999-9999', 'Gouvia', 865, '', '', 'f@f.c', '13744018709', '211774409', 'DETRAN-RJ', 1539105437),
(4, 0, '9999-9999', '99999-9999', '', 0, '', '', 'f2@f.c', '13744018709', '13744018709', 'DETRAN-RJ', 1539131391),
(5, 0, '9999-9999', '99999-9999', '', 0, '', '', 'f2@f.c', '13744018709', '13744018709', 'DETRAN-RJ', 1539131414),
(6, 0, '9999-9999', '99999-9999', '', 0, '', '', 'f2@f.c', '13744018709', '13744018709', 'DETRAN-RJ', 1539131495),
(7, 0, '9999-9999', '99999-9999', '', 0, '', '', 'f2@f.c', '13744018709', '13744018709', 'DETRAN-RJ', 1539131534),
(8, 0, '9999-9999', '99999-9999', '', 0, '', '', 'f2@f.c', '13744018709', '13744018709', 'DETRAN-RJ', 1539131672),
(9, 0, '9999-9999', '99999-9999', '', 0, '', '', 'f2@f.c', '13744018709', '13744018709', 'DETRAN-RJ', 1539131794),
(10, 0, '9999-9999', '99999-9999', '', 0, '', '', 'f2@f.c', '13744018709', '13744018709', 'DETRAN-RJ', 1539131804),
(11, 0, '9999-9999', '99999-9999', '', 0, '', '', 'f2@f.c', '13744018709', '13744018709', 'DETRAN-RJ', 1539131813),
(12, 0, '9999-9999', '99999-9999', 'Endereço', 12, '0', '', 'f2@f.c', '13744018709', '0', 'DETRAN-RJ', 1539131975),
(13, 0, '9999-9999', '99999-9999', 'Endereço', 12, '0', '', 'f2@f.c', '13744018709', '0', 'DETRAN-RJ', 1539131999),
(14, 0, '9999-9999', '99999-9999', 'Endereço', 12, '0', '', 'f2@f.c', '13744018709', '0', 'DETRAN-RJ', 1539132002),
(15, 0, '', '9999-9999', 'Endereço', 12, '0', '0', 'f2@f.c', '', '13744018709', 'DETRAN-RJ', 1539132028),
(16, 0, '9999-9999', '99999-9999', '', 0, '', '', 'f2@f.c', '13744018709', '0', 'DETRAN-RJ', 1539133194),
(17, 0, '9999-9999', '99999-9999', '', 0, '', '', 'f@f.c', '13744018709', '0', 'DETRAN-RJ', 1539140237),
(18, 0, '0', '0', '0', 0, '0', '0', 'g@g.c', '0', '0', '0', 1539142572),
(19, 0, '0', '0', '0', 0, '0', '0', 'g@g.c', '0', '0', '0', 1539142674),
(20, 0, '0', '0', '0', 0, '0', '0', 'g@g.c', '0', '0', '0', 1539142693),
(21, 0, '0', '0', '0', 0, '0', '0', 'g@g.c', '0', '0', '0', 1539142715),
(22, 0, '0', '0', '0', 0, '0', '0', 'g@g.c', '0', '0', '0', 1539142749),
(23, 0, '0', '0', '0', 0, '0', '0', 'g@g.c', '0', '0', '0', 1539142764),
(24, 0, '0', '0', '0', 0, '0', '0', 'i@i.c', '0', '0', '0', 1539142855),
(25, 0, '', '', '', 0, '', '', '', '0', '0', '0', 1539143091),
(26, 0, '0', '0', '0', 0, '0', '0', '0@c', '0', '0', '0', 1539143425);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prontuario`
--

CREATE TABLE `prontuario` (
  `id` bigint(20) NOT NULL,
  `id_paciente` bigint(20) NOT NULL,
  `dataconsulta` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horaconsulta` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `informacoes` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `prontuario`
--

INSERT INTO `prontuario` (`id`, `id_paciente`, `dataconsulta`, `horaconsulta`, `informacoes`) VALUES
(1, 1, '09/10/2018', '10:39', 'Morto'),
(2, 5, '0', '0', 'Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(10) NOT NULL,
  `id_pessoal` bigint(10) NOT NULL,
  `tipo` int(5) NOT NULL DEFAULT '2',
  `nome` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascimento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `dataregistro` bigint(10) NOT NULL,
  `dataatualizacao` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `id_pessoal`, `tipo`, `nome`, `nascimento`, `sexo`, `status`, `dataregistro`, `dataatualizacao`) VALUES
(1, 1, 2, 'Frederico Dutra', '24/09/1992', 'masculino', 1, 0, 0),
(3, 1, 2, 'Frederico Dutra 2', '24/09/1991', 'masculino', 1, 0, 0),
(4, 15, 0, 'Pablo Escobar', '24/09/1992', 'Masculino', 1, 1539132029, 1539132029),
(5, 16, 2, 'Pablo Escobar', '24/09/1992', 'Masculino', 1, 1539133194, 1539133194),
(6, 17, 1, 'Teste', '24/09/1990', 'Masculino', 1, 1539140237, 1539140237),
(7, 18, 1, 'Maria', '24/09/1990', 'Feminino', 1, 1539142573, 1539142573),
(8, 19, 1, 'Maria', '24/09/1990', 'Feminino', 1, 1539142675, 1539142675),
(9, 20, 1, 'Maria', '24/09/1990', 'Feminino', 1, 1539142694, 1539142694),
(10, 21, 1, 'Maria', '24/09/1992', 'Feminino', 1, 1539142715, 1539142715),
(11, 22, 1, 'Maria', '24/09/1992', 'Feminino', 1, 1539142750, 1539142750),
(12, 23, 1, 'Maria', '24/09/1992', 'Feminino', 1, 1539142764, 1539142764),
(13, 24, 1, 'Maria', '24/09/1990', 'Feminino', 1, 1539142856, 1539142856),
(14, 25, 3, 'Teste2', '24/09/1992', 'Masculino', 1, 1539143092, 1539143092),
(15, 26, 2, 'Cacetinhos', '1', 'Masculino', 1, 1539143426, 1539143426);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acompanhante`
--
ALTER TABLE `acompanhante`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pessoal` (`id_usuario`);

--
-- Indexes for table `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financeiro`
--
ALTER TABLE `financeiro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informacao_pessoal`
--
ALTER TABLE `informacao_pessoal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prontuario`
--
ALTER TABLE `prontuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acompanhante`
--
ALTER TABLE `acompanhante`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `financeiro`
--
ALTER TABLE `financeiro`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `informacao_pessoal`
--
ALTER TABLE `informacao_pessoal`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `prontuario`
--
ALTER TABLE `prontuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
