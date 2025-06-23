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
(102030, 'Roberto Cagalheu da Silva', 'Estagiário da AyLu.corp no setor de logística', '2025-06-19', '1200.00', 'roberto.jpg'),
(112233, 'Assassin''s Creed - Unity - PS4', 'Paris, 1789. A Revolução Francesa transforma a antes magnifica cidade em um lugar de terror e caos. Suas ruas de paralelepípedos estão vermelhas com o sangue de pessoas comuns que se atreveram a levantar-se contra a aristocracia opressiva ...', '2017-05-01', '129.00', 'AssassinCreed.png'),
(302010, 'God Of War III - Remasterizado - PS4', 'Originalmente desenvolvido pelo Santa Monica Studio da Sony Computer Entertainment, exclusivamente para o sistema PLAYSTATION®3, God of War® III foi remasterizado para o sistema PLAYSTATION®4, com compatibilidade de 1080p em 60fps para suas ...', '2017-05-01', '99.49', 'GodOfWar.png'),
(332211, 'Yooka-Laylee - PS4', 'Yooka-Laylee é uma nova plataforma de mundo aberto do principal criador por trás dos Banjo-Kazooie e Donkey Kong Country. Renovada na Playtonic Games, a equipe está construindo um sucessor espiritual para seu trabalho mais estimado do passado ...', '2017-05-01', '169.90', 'YookaLaylee.png'),
(123456, 'The Last Guardian - PS4', 'The Last Guardian – PS4 é um dos games mais aguardados do momento. Ele possui uma narrativa de flashback, com um homem maduro contando histórias de quando era jovem, justamente na época em que encontra uma criatura conhecida como ''Trico'', que ...', '2017-05-01', '149.00', ''),
(696969, 'O Grande PAPYRUS', 'NYE HE HE HE !', '2008-04-30', '969697000000.00', 'Captura de tela 2025-06-23 074109.png');

