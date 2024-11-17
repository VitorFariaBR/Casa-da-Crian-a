-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/11/2024 às 01:30
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `casa_da_crianca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `ID_ALUNO` int(11) NOT NULL,
  `CPF_ALUNO` varchar(14) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `DATA_NASC` date NOT NULL,
  `MATRICULA` varchar(20) DEFAULT NULL,
  `ENDERECO_COMPLETO` varchar(255) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL,
  `CIDADE` varchar(50) DEFAULT NULL,
  `TELEFONE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno_turma`
--

CREATE TABLE `aluno_turma` (
  `ID_ALUNO` int(11) NOT NULL,
  `ID_TURMA` int(11) NOT NULL,
  `DATA_INSCRICAO` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `ID_DISCIPLINA` int(11) NOT NULL,
  `NOME_DISCIPLINA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario_aula`
--

CREATE TABLE `horario_aula` (
  `ID_HORARIO` int(11) NOT NULL,
  `ID_TURMA` int(11) NOT NULL,
  `DIA_SEMANA` enum('Segunda','Terça','Quarta','Quinta','Sexta','Sábado') NOT NULL,
  `HORA_INICIO` time NOT NULL,
  `HORA_FIM` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `presenca`
--

CREATE TABLE `presenca` (
  `ID_PRESENCA` int(11) NOT NULL,
  `ID_ALUNO` int(11) NOT NULL,
  `ID_TURMA` int(11) NOT NULL,
  `DATA_ATIVIDADE` date NOT NULL,
  `HORA_ATIVIDADE` time NOT NULL,
  `STATUS` enum('Presente','Ausente','Justificado') NOT NULL,
  `OBSERVACOES` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `CPF_PROFESSOR` varchar(14) NOT NULL,
  `NOME` varchar(80) DEFAULT NULL,
  `TIPO_USER` int(11) NOT NULL DEFAULT 1,
  `TELEFONE` varchar(14) DEFAULT NULL,
  `DATA_NASC` date DEFAULT NULL,
  `CIDADE` varchar(20) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL,
  `ENDERECO` varchar(50) DEFAULT NULL,
  `ID_USER` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorio_socioeconomico`
--

CREATE TABLE `relatorio_socioeconomico` (
  `ID_RELATORIO` int(11) NOT NULL,
  `ID_ALUNO` int(11) NOT NULL,
  `SEGMENTO_ANO` varchar(50) DEFAULT NULL,
  `NIS` varchar(20) DEFAULT NULL,
  `CPF_RESPONSAVEL` varchar(14) DEFAULT NULL,
  `NOME_RESPONSAVEL` varchar(100) DEFAULT NULL,
  `RENDA_MENSAL_RESPONSAVEL` decimal(10,2) DEFAULT NULL,
  `OCUPACAO_RESPONSAVEL` varchar(50) DEFAULT NULL,
  `LOCAL_TRABALHO_RESPONSAVEL` varchar(100) DEFAULT NULL,
  `TELEFONE_RESPONSAVEL` varchar(20) DEFAULT NULL,
  `TOTAL_MEMBROS_FAMILIA` int(11) DEFAULT NULL,
  `RENDA_FAMILIAR_TOTAL` decimal(10,2) DEFAULT NULL,
  `RENDA_FAMILIAR_PER_CAPITA` decimal(10,2) DEFAULT NULL,
  `POSSUI_IMOVEL` tinyint(1) DEFAULT NULL,
  `POSSUI_VEICULO` tinyint(1) DEFAULT NULL,
  `DESCRICAO_VEICULO` varchar(50) DEFAULT NULL,
  `DESPESAS_MORADIA` decimal(10,2) DEFAULT NULL,
  `DESPESAS_LUZ` decimal(10,2) DEFAULT NULL,
  `DESPESAS_AGUA` decimal(10,2) DEFAULT NULL,
  `DESPESAS_ALIMENTACAO` decimal(10,2) DEFAULT NULL,
  `DESPESAS_TRANSPORTE` decimal(10,2) DEFAULT NULL,
  `DESPESAS_SAUDE` decimal(10,2) DEFAULT NULL,
  `DESPESAS_EDUCACAO` decimal(10,2) DEFAULT NULL,
  `DESPESAS_OUTROS` decimal(10,2) DEFAULT NULL,
  `TOTAL_DESPESAS` decimal(10,2) DEFAULT NULL,
  `BENEFICIO_ANTERIOR` tinyint(1) DEFAULT NULL,
  `BENEFICIO_DESCRICAO` varchar(255) DEFAULT NULL,
  `OBSERVACOES` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `secretario`
--

CREATE TABLE `secretario` (
  `CPF_SECRETARIO` varchar(14) NOT NULL,
  `NOME` varchar(80) DEFAULT NULL,
  `TIPO_USER` int(11) NOT NULL DEFAULT 0,
  `TELEFONE` varchar(14) DEFAULT NULL,
  `DATA_NASC` date DEFAULT NULL,
  `CIDADE` varchar(20) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL,
  `ENDERECO` varchar(50) DEFAULT NULL,
  `ID_USER` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `ID_TURMA` int(11) NOT NULL,
  `CPF_PROFESSOR` varchar(14) NOT NULL,
  `ID_DISCIPLINA` int(11) NOT NULL,
  `QTD_MAX_ALUNOS` int(11) NOT NULL,
  `QTD_AULAS_SEMANAIS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_USER` int(4) NOT NULL,
  `USERNAME` varchar(35) DEFAULT NULL,
  `PASSWORD` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`ID_USER`, `USERNAME`, `PASSWORD`) VALUES
(1, 'ADM', '12345');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`ID_ALUNO`),
  ADD UNIQUE KEY `CPF_ALUNO` (`CPF_ALUNO`),
  ADD UNIQUE KEY `MATRICULA` (`MATRICULA`);

--
-- Índices de tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD PRIMARY KEY (`ID_ALUNO`,`ID_TURMA`),
  ADD KEY `ID_TURMA` (`ID_TURMA`);

--
-- Índices de tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`ID_DISCIPLINA`);

--
-- Índices de tabela `horario_aula`
--
ALTER TABLE `horario_aula`
  ADD PRIMARY KEY (`ID_HORARIO`),
  ADD KEY `ID_TURMA` (`ID_TURMA`);

--
-- Índices de tabela `presenca`
--
ALTER TABLE `presenca`
  ADD PRIMARY KEY (`ID_PRESENCA`),
  ADD KEY `ID_ALUNO` (`ID_ALUNO`),
  ADD KEY `ID_TURMA` (`ID_TURMA`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`CPF_PROFESSOR`),
  ADD UNIQUE KEY `CPF_PROFESSOR` (`CPF_PROFESSOR`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Índices de tabela `relatorio_socioeconomico`
--
ALTER TABLE `relatorio_socioeconomico`
  ADD PRIMARY KEY (`ID_RELATORIO`),
  ADD KEY `ID_ALUNO` (`ID_ALUNO`);

--
-- Índices de tabela `secretario`
--
ALTER TABLE `secretario`
  ADD PRIMARY KEY (`CPF_SECRETARIO`),
  ADD UNIQUE KEY `CPF_SECRETARIO` (`CPF_SECRETARIO`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`ID_TURMA`),
  ADD KEY `CPF_PROFESSOR` (`CPF_PROFESSOR`),
  ADD KEY `ID_DISCIPLINA` (`ID_DISCIPLINA`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `ID_ALUNO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `ID_DISCIPLINA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `horario_aula`
--
ALTER TABLE `horario_aula`
  MODIFY `ID_HORARIO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `presenca`
--
ALTER TABLE `presenca`
  MODIFY `ID_PRESENCA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `relatorio_socioeconomico`
--
ALTER TABLE `relatorio_socioeconomico`
  MODIFY `ID_RELATORIO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `ID_TURMA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USER` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD CONSTRAINT `aluno_turma_ibfk_1` FOREIGN KEY (`ID_ALUNO`) REFERENCES `aluno` (`ID_ALUNO`),
  ADD CONSTRAINT `aluno_turma_ibfk_2` FOREIGN KEY (`ID_TURMA`) REFERENCES `turma` (`ID_TURMA`);

--
-- Restrições para tabelas `horario_aula`
--
ALTER TABLE `horario_aula`
  ADD CONSTRAINT `horario_aula_ibfk_1` FOREIGN KEY (`ID_TURMA`) REFERENCES `turma` (`ID_TURMA`);

--
-- Restrições para tabelas `presenca`
--
ALTER TABLE `presenca`
  ADD CONSTRAINT `presenca_ibfk_1` FOREIGN KEY (`ID_ALUNO`) REFERENCES `aluno` (`ID_ALUNO`),
  ADD CONSTRAINT `presenca_ibfk_2` FOREIGN KEY (`ID_TURMA`) REFERENCES `turma` (`ID_TURMA`);

--
-- Restrições para tabelas `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `usuario` (`ID_USER`) ON DELETE SET NULL;

--
-- Restrições para tabelas `relatorio_socioeconomico`
--
ALTER TABLE `relatorio_socioeconomico`
  ADD CONSTRAINT `relatorio_socioeconomico_ibfk_1` FOREIGN KEY (`ID_ALUNO`) REFERENCES `aluno` (`ID_ALUNO`);

--
-- Restrições para tabelas `secretario`
--
ALTER TABLE `secretario`
  ADD CONSTRAINT `secretario_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `usuario` (`ID_USER`);

--
-- Restrições para tabelas `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`CPF_PROFESSOR`) REFERENCES `professor` (`CPF_PROFESSOR`),
  ADD CONSTRAINT `turma_ibfk_2` FOREIGN KEY (`ID_DISCIPLINA`) REFERENCES `disciplina` (`ID_DISCIPLINA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
