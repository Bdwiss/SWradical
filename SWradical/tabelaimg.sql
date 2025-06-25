--
-- Base de Dados: `banco`
--
create database banco;
use banco;
-- --------------------------------------------------------

--
-- Estrutura da tabela `tabelaimg`
--

CREATE TABLE IF NOT EXISTS `tabelaimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cpf` int(11) NOT NULL,
  `funcionario` varchar(80) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `admicao` datetime NOT NULL,
  `salario` float NOT NULL,
  `imagem` varchar(50) NOT NULL
);

--
-- Extraindo dados da tabela `tabelaimg`
--

INSERT INTO `tabelaimg` (`cpf`, `funcionario`, `descricao`, `admicao`, `salario`, `imagem`) VALUES
(635656, 'Leon Martins', 'Gerente de edição, casado com a gerente de marketing, perdeu as chaves da empresa, assistência técnica da AyLu.corp', '2019-06-23', '15000.00', 'leon.png'),
(53634, 'Nilce Moretto', 'Gerente de marketing, casada com a gerente de edição, achou as chaves da empresa, editora da AyLu.corp', '2019-06-23', '16000.00', 'nilce.png'),
(3466, 'Henrique Marangon', 'Programador experiente, gerente de mídia da empresa e integrante da equipe de marketing 5x2 da AyLu.corp', '2014-08-08', '55000.00', 'henrique.png'),
(524542, 'André Young Ferreira', 'Gerente de RH, desenvolvedor, chefe criativo, ex CEO 1x6 da AyLu.corp', '2001-09-11', '60009.00', 'andre.jpg'),
(3634, 'Kleber Coelho', 'Desenvolvedor musical, tem experiência com fast food, editor, estagiário 6x1 da AyLu.corp', '2024-06-02', '900.00', 'kleber.png'),
(2566546, 'Rafael Lange Severino', 'Game dev, profissional de investigação, CEO 0x7 da AyLu.corp', '2012-10-29', '70000.00', 'rafael.png'),
(52346524523, 'Juliano Alvarenga Barros', 'Beta tester, criador de conteúdo da AyLu.corp', '2012-08-30', '10000.00', 'juliano.png'),
(254235, 'Eduardo Pugliese Benvenuti', 'Editor, gerente de contabilidade da AyLu.corp', '2013-04-30', '12000.00', 'edu.png');

