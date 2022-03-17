CREATE TABLE `contato` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `idade` varchar(30) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `nascimento` date NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
