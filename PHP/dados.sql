CREATE DATABASE `casa_da_crianca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE 'casa_da_crianca';

CREATE TABLE `crianca` (
  'id' int(11) NOT NULL,
  'nome' varchar(35) NOT NULL,
  'endereco' varchar(35) NOT NULL,
  'telefone' int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `usuarios` (
  'id' int(11) NOT NULL,
  'username' varchar(35) NOT NULL,
  'password' varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

ALTER TABLE 'crianca' ADD PRIMARY KEY ('id');

ALTER TABLE 'crianca' MODIFY 'id' INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE 'crianca' AUTO_INCREMENT = 4;