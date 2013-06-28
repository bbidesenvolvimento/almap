-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 28/06/2013 às 10h36min
-- Versão do Servidor: 5.5.24
-- Versão do PHP: 5.3.10-1ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `bb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE IF NOT EXISTS `adm` (
  `cod_adm` int(100) NOT NULL AUTO_INCREMENT,
  `login_adm` varchar(255) NOT NULL,
  `senha_adm` varchar(255) NOT NULL,
  PRIMARY KEY (`cod_adm`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`cod_adm`, `login_adm`, `senha_adm`) VALUES
(2, 'fabricio', '1234'),
(3, 'admin', 'pieigual3,1415');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `codCLIENTE` int(10) NOT NULL AUTO_INCREMENT,
  `nomeCLIENTE` varchar(255) NOT NULL,
  `loginCLIENTE` varchar(255) NOT NULL,
  `senhaCLIENTE` varchar(255) NOT NULL,
  `usuarioTABLEAU` varchar(255) NOT NULL,
  `imgUSUARIO` varchar(255) NOT NULL,
  `codMaster` int(11) NOT NULL,
  PRIMARY KEY (`codCLIENTE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`codCLIENTE`, `nomeCLIENTE`, `loginCLIENTE`, `senhaCLIENTE`, `usuarioTABLEAU`, `imgUSUARIO`, `codMaster`) VALUES
(86, 'BBI', 'projetosbbi', 'projetos#we', 'bbi', 'pagsclientes/Topo-BBI.png', 19),
(81, 'C&A', 'fabiana.manfredi', 'c&a2013', 'DM9', 'pagsclientes/Barra branca.png', 16),
(62, 'Almap BBDO', 'almap.bbdo', '473393a776', 'almapbbdo', 'pagsclientes/', 17),
(72, 'Vivo', 'vivo.base', '639611', 'teste', 'pagsclientes/Topo-Africa.png', 20),
(67, 'ItaÃº Unibanco', 'itau.unibanco.base', 'f2f4fe70fc', 'dm9', 'pagsclientes/Barra branca.png', 16),
(66, 'ItaÃº Unibanco (Full)', 'itau.unibanco.full', '23a66b8eeb', 'dm9', 'pagsclientes/Barra branca.png', 16),
(83, 'ComentÃ¡rios Virologia', 'abbott.base', 'Hdgsyd6723dd', 'Abbott', 'pagsclientes/Barra branca.png', 22),
(75, 'MÃ­dia Dados', 'midiadados2013', 'midiadados2013', 'midiadados', 'pagsclientes/Topo-Gpo de MÃ­dia.png', 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `codComentario` int(11) NOT NULL AUTO_INCREMENT,
  `codPagina` int(11) NOT NULL,
  `texto` text NOT NULL,
  `dataComentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `codCliente` int(11) NOT NULL,
  `nomeCliente` varchar(250) NOT NULL,
  PRIMARY KEY (`codComentario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`codComentario`, `codPagina`, `texto`, `dataComentario`, `codCliente`, `nomeCliente`) VALUES
(29, 0, 'Digiterrr aqui seu comentÃ¡rio', '2012-12-10 19:11:56', 58, 'fabricio'),
(32, 180, 'Boa sorte com este processo!!!!!!', '2013-05-08 13:23:33', 80, 'Abbott'),
(33, 187, 'teste\r\n', '2013-05-17 19:44:38', 83, 'ComentÃ¡rios Virologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas`
--

CREATE TABLE IF NOT EXISTS `paginas` (
  `cod_pagina` int(10) NOT NULL AUTO_INCREMENT,
  `cod_cliente` int(10) NOT NULL,
  `nome_Pagina` varchar(255) NOT NULL,
  `url_Pagina` varchar(255) NOT NULL,
  `legenda` varchar(255) NOT NULL,
  `imgPagina` varchar(255) NOT NULL,
  PRIMARY KEY (`cod_pagina`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=207 ;

--
-- Extraindo dados da tabela `paginas`
--

INSERT INTO `paginas` (`cod_pagina`, `cod_cliente`, `nome_Pagina`, `url_Pagina`, `legenda`, `imgPagina`) VALUES
(5, 5, 'fdgdrtfy', 'fdgtryrtytry', 'dfgdfrtyrtytr', 'pagsclientes/imprime_ext_tyrtyrtperiodomm.pdf'),
(22, 15, 'Investimento PublicitÃ¡rio', 'views/Loducca_Unidas_Monitor/EvoluodeInvestimento', 'Investimento PublicitÃ¡rio', 'pagsclientes/icone.jpg'),
(18, 14, 'ConcorrÃªncia Ibope Monitor', 'views/Loducca_Unidas_Monitor/EvoluodeInvestimento', 'ConcorrÃªncia Ibope', 'pagsclientes/'),
(20, 3, 'pagina1', 'views/Loducca_Unidas_Monitor/EvoluodeInvestimento', 'pagina1', 'pagsclientes/vermelho.jpg'),
(21, 3, 'pagina2', '', 'pagina2', 'pagsclientes/vermelho.jpg'),
(23, 17, 'Flash da ConcorrÃªncia', 'views/Flash/Investimento', 'Flash ConcorrÃªncia', 'X:\\Images\\Icons\\3d-icons-part3\\PNG\\money.png'),
(24, 17, 'ConcorrÃªncia Monitor', 'views/CartoCrdito/TotalCategoria', 'Monitor', 'pagsclientes/Captura de tela 2012-08-29 Ã s 00.31.10.png'),
(25, 19, 'Flash da ConcorrÃªncia', 'views/Flash/Investimento', 'Flash', 'pagsclientes/lighting-bolt.png'),
(26, 19, 'ConcorÃªncia Monitor', 'views/CartoCrdito/TotalCategoria', 'Ibope Monitor', 'pagsclientes/chart.png'),
(27, 20, 'Investimento e CPP TV Aberta', 'views/Modelo_CPP/InvestimentoEmissora', 'Investimento e CPP TV Aberta', 'pagsclientes/chart.png'),
(28, 20, 'Performance Internet', 'views/Modelo_Internet/Dashboard', 'Performance Internet', 'pagsclientes/planet_earth.png'),
(29, 21, 'AnÃ¡lise CPP TV Aberta', 'views/MonitorVeculoTVAberta/AnalgsicoseAntinflamatrios', 'AnÃ¡lise CPP TV Aberta', 'pagsclientes/chart.png'),
(30, 21, 'Investimento PublicitÃ¡rio', 'views/CartoCrdito/TotalCategoria', 'Investimento PublicitÃ¡rio', 'pagsclientes/megaphone.png'),
(52, 24, 'teste 2', 'dflhjsdljfldj', 'teste 2', 'pagsclientes/box.png'),
(48, 23, 'Flash da ConcorrÃªncia', 'views/Modelo_Flash/Investimento', 'Flash da ConcorrÃªncia', 'pagsclientes/lighting-bolt.png'),
(201, 62, 'Marisa (Monitor)', 'views/Marisa/Panoramadosetor', 'Marisa (Monitor)', 'pagsclientes/Marisa.png'),
(49, 23, 'TÃ¡tica de MÃ­dia', 'views/Modelo_Ttica/Ttica', 'TÃ¡tica de MÃ­dia', 'pagsclientes/money.png'),
(205, 86, 'Monitor OLX', 'views/MonitorOLX/PanoramaGeral', 'Monitor OLX', 'pagsclientes/OLX.png'),
(200, 62, 'Havaianas (Monitor)', 'views/HavaianasMonitor_0/PanoramadoMercado', 'Havaianas (Monitor)', 'pagsclientes/Havaiana1.png'),
(155, 62, 'MÃ©tricas Site Ofertas VW', 'views/VWOfertas/VWOfertas', 'MÃ©tricas Site Ofertas VW', 'pagsclientes/planet_earth.png'),
(70, 35, 'PTS / POS & AudiÃªncias', 'views/PaineltesteGlobosat/Escolaridade', '', 'pagsclientes/cone.png'),
(57, 26, 'Performance Internet', 'views/Modelo_Internet/Dashboard', 'Performance Internet', 'pagsclientes/radioactive.png'),
(56, 24, 'teste 6', 'lfksdÃ§llÃ§sdkfÃ§l', 'teste 6', 'pagsclientes/gears.png'),
(59, 28, 'Investimento PublicitÃ¡rio', 'views/MonitorColgate/PanoramaInvestimentos', 'Investimento PublicitÃ¡rio - Colgate', 'pagsclientes/chart.png'),
(60, 29, 'Investimento PublicitÃ¡rio', 'views/MonitorGolLA/MercadoPublicitrio', 'Investimento PublicitÃ¡rio - Gol LA', 'pagsclientes/chart.png'),
(61, 30, 'Teste Tableau', 'views/Teste/Painel1', 'Teste Tableau', 'pagsclientes/CD.png'),
(63, 31, 'Consumo TV Aberta', 'views/Madeira/SalesForecast', 'Consumo TV Aberta', 'pagsclientes/tv.png'),
(64, 32, 'Consumo TV Aberta', 'views/ConsumoTVaberta/Programas', 'Consumo TV Aberta', 'pagsclientes/shopping_cart.png'),
(65, 33, 'Flash Ibope SP', 'views/FlashIta/Anunciantes', 'Flash Ibope SP', 'pagsclientes/lighting-bolt.png'),
(69, 34, 'Performance de Internet', 'views/Modelo_Internet/Dashboard', 'Performance de Internet', 'pagsclientes/planet_earth.png'),
(68, 34, 'Investimento PublicitÃ¡rio', 'views/Modelo_Monitor/EvoluodeInvestimento', 'Investimento PublicitÃ¡rio', 'pagsclientes/chart.png'),
(71, 36, 'PTS & AudiÃªncias', 'views/PaineltesteGlobosat/Escolaridade', 'PTS & AudiÃªncias', 'pagsclientes/cone.png'),
(72, 37, 'PTS / POP', 'views/PTSPOP/Escolaridade', 'PTS / POP', 'pagsclientes/cone.png'),
(73, 33, 'PainÃ©is ItaÃº', 'views/DashIta_06nov/EvoluoMensal', 'PainÃ©is ItaÃº', 'pagsclientes/megaphone.png'),
(74, 38, 'PainÃ©is ItaÃº', 'views/DashIta_06nov/EvoluoMensal', 'PainÃ©is ItaÃº', 'pagsclientes/megaphone.png'),
(75, 38, 'ExercÃ­cio teste Flash', 'views/FlashIta/Anunciantes', 'ExercÃ­cio teste Flash', 'pagsclientes/lighting-bolt.png'),
(79, 39, 'Dashboard ItaÃº', 'views/DashIta/EvoluoMensal', 'Dashboard ItaÃº', 'pagsclientes/lighting-bolt.png'),
(77, 39, 'Dashboard DM9_ItaÃº', 'views/DashIta_06nov/Anunciantes', 'Dashboard DM9_ItaÃº', 'pagsclientes/tv.png'),
(103, 40, 'Dashboard DM9_ItaÃº', 'views/DashboardDM9/Anunciantes', 'Dashboard DM9_ItaÃº', 'pagsclientes/megaphone.png'),
(102, 46, 'Dashboard ItaÃº', 'views/DashboardIta_final_0/EvoluoMensal', 'Dashboard ItaÃº', 'pagsclientes/lighting-bolt.png'),
(91, 44, 'BTV Audit Dashboard', 'views/VWBTVAudit/TRPANALYSIS', 'BTV Audit Dashboard', 'pagsclientes/search.png'),
(101, 40, 'Dashboard ItaÃº', 'views/DashboardIta_final/EvoluoMensal', 'Dashboard ItaÃº', 'pagsclientes/lighting-bolt.png'),
(196, 85, 'Monitor Havaianas', 'views/HavaianasMonitor_0/MercadoTotal', 'Monitor Havaianas', 'pagsclientes/Havaiana.png'),
(104, 49, 'Dashboard ItaÃº', 'views/DashboardIta_final_0/EvoluoMensal', 'Dashboard ItaÃº', 'pagsclientes/lighting-bolt.png'),
(105, 47, 'Dashboard DM9_ItaÃº', 'views/DashboardDM9/Anunciantes', 'Dashboard DM9_ItaÃº', 'pagsclientes/megaphone.png'),
(106, 47, 'Dashboard ItaÃº', 'views/DashboardIta_final_0/EvoluoMensal', 'Dashboard ItaÃº', 'pagsclientes/lighting-bolt.png'),
(181, 81, 'Monitor', 'views/MonitorCA_2012/LinhaMoleXLinhaDura', 'Monitor', 'pagsclientes/checkmark.png'),
(180, 80, 'Pool de Palavras', 'views/Abbott/Mapa', 'Pool de Palavras', 'pagsclientes/search.png'),
(110, 56, 'Controle da ConcorrÃªncia C&A', 'views/Painel_CA/PanoramaMensal', 'Controle da ConcorrÃªncia C&A', 'pagsclientes/shopping_cart.png'),
(202, 62, 'Pepsi (Monitor)', 'views/PepsiMonitor/PanoramadoMercado', 'Pepsi (Monitor)', 'pagsclientes/Lata Pepsi.jpg'),
(122, 66, 'Flash TV SP Completo', 'views/DashDM9_tb8/Anunciantes', 'Flash TV SP Completo', 'pagsclientes/megaphone.png'),
(199, 75, 'teste URL', 'views/testeURL/PERFILEPENETRAODOSCONSUMIDORESDOMEIO', 'teste URL', 'pagsclientes/Havaiana.png'),
(188, 62, 'Monitor VW', 'views/MonitorVW/PanoramaGeraldoSetor', 'Monitor VW', 'pagsclientes/search.png'),
(119, 61, 'Monitor C&A', 'views/MonitorCA_2012/LinhaMoleXLinhaDura', 'Monitor C&A', 'pagsclientes/money.png'),
(121, 67, 'Flash TV SP', 'views/Final/EvoluoMensal', 'Flash TV SP', 'pagsclientes/lighting-bolt.png'),
(124, 69, 'Teste', 'views/Abbott_sugestoBBI/Painel1', 'AnÃ¡lise de ComentÃ¡rios', 'pagsclientes/'),
(179, 76, 'Abbott', 'views/Abbott/Segmento', 'Pool de Palavras', 'pagsclientes/search.png'),
(194, 62, 'Audit VW', 'views/VWBTVAudit/BudgetControl', 'Audit VW', 'pagsclientes/usb_drive.png'),
(195, 84, 'Havaianas', 'views/HavaianasMonitor_0/MercadoTotal', 'Havaianas', 'pagsclientes/Logo_Havaianas.png'),
(133, 72, 'Cobertura Globo x IPC x DDD', 'views/SinalGloboDDD/SinalGloboXDDD', 'Mapa DDD', 'pagsclientes/Vivo bonequinho.jpg'),
(146, 75, 'MÃ­dia Digital', 'views/MDIADIGITAL/OSMAIORESUSURIOSDEINTERNETDOMUNDOeNMERODEINTERNAUTAPORGRANDESREGIES', 'Midia Digital', 'pagsclientes/play_button.png'),
(160, 75, 'MÃ­dia Internacional', 'views/MDIAINTERNACIONAL/INVESTIMENTOEMPROPAGANDANOMUNDO', 'MÃ­dia Internacional', 'pagsclientes/calendar.png'),
(186, 80, 'AnÃ¡lise de ComentÃ¡rios Consultores', 'views/Abbott/Mapa', 'AnÃ¡lise de ComentÃ¡rios Consultores', 'pagsclientes/briefcase.png'),
(163, 75, 'TelevisÃ£o', 'views/TELEVISO/PERFILDEMOGRFICOPENETRAOEEVOLUODAPENETRAONOMEIO', 'TelevisÃ£o', 'pagsclientes/tv.png'),
(164, 75, 'TV por Assinatura', 'views/TVPORASSINATURA/PERFILPENETRAOEEVOLUODAPENETRAODOMEIO', 'TV por Assinatura', 'pagsclientes/usb_drive.png'),
(165, 75, 'Pesquisa Ad-Hoc', 'views/PesquisaAd-Hoc/ALIMENTAO', 'Pesquisa Ad-Hoc', 'pagsclientes/picture-frame3.png'),
(166, 75, 'Out-of-Home', 'views/OUT-OF-HOME/PERFILDEMOGRFICOEPENETRAO', 'Out-of-Home', 'pagsclientes/clouds.png'),
(206, 62, 'VW Renavam', 'views/Renavam_0/Overview', 'VW Renavam', 'pagsclientes/pin.png'),
(198, 83, 'ComentÃ¡rios Virologia', 'views/ComentriosVirologia/Mapeamento', 'ComentÃ¡rios Virologia', 'pagsclientes/briefcase.png'),
(182, 81, 'Controle da ConcorrÃªncia', 'views/ControledaConcorrncia/PanoramaMensal', 'Controle da ConcorrÃªncia', 'pagsclientes/search.png'),
(191, 77, 'Modelo Animais', 'views/ModeloAnimais/PanoramaMercado', 'Modelo Animais', 'pagsclientes/treasure_chest.png'),
(184, 75, 'OOH', 'views/OOH_0/SEGMENTAODOOH-QUEMSOELES', 'OOH', 'pagsclientes/arrow_up.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariomaster`
--

CREATE TABLE IF NOT EXISTS `usuariomaster` (
  `codMaster` int(11) NOT NULL AUTO_INCREMENT,
  `nomeMaster` varchar(250) NOT NULL,
  `loginMaster` varchar(250) NOT NULL,
  `senhaMaster` varchar(250) NOT NULL,
  `imgMaster` varchar(250) NOT NULL,
  PRIMARY KEY (`codMaster`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `usuariomaster`
--

INSERT INTO `usuariomaster` (`codMaster`, `nomeMaster`, `loginMaster`, `senhaMaster`, `imgMaster`) VALUES
(16, 'DM9DDB', 'dm9ddb', 'dm9ddb2013', 'pagsclientes/Barra branca.png'),
(17, 'ALMAPBBO', 'almapbbdo', 'VW2013#1', 'pagsclientes/Topo Almap Clean.png'),
(19, 'BBI', 'bbi.master', 'pieigual3,1415', 'pagsclientes/Topo-BBI.png'),
(20, 'Ãfrica', 'africa', 'elefante', 'pagsclientes/Topo-Africa.png'),
(22, 'Abbott', 'luciana.lunga', 'abbott', 'pagsclientes/Barra branca.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariosimples`
--

CREATE TABLE IF NOT EXISTS `usuariosimples` (
  `codSimples` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuarioSP` varchar(250) NOT NULL,
  `senhaUsuarioSP` varchar(250) NOT NULL,
  `codCLIENTE` int(11) NOT NULL,
  `loginUsuarioSP` varchar(250) NOT NULL,
  `nomeCLIENTE` varchar(250) NOT NULL,
  `usuarioTABLEAU` varchar(250) NOT NULL,
  `imgUSUARIO` varchar(250) NOT NULL,
  `codMaster` int(11) NOT NULL,
  PRIMARY KEY (`codSimples`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Extraindo dados da tabela `usuariosimples`
--

INSERT INTO `usuariosimples` (`codSimples`, `nomeUsuarioSP`, `senhaUsuarioSP`, `codCLIENTE`, `loginUsuarioSP`, `nomeCLIENTE`, `usuarioTABLEAU`, `imgUSUARIO`, `codMaster`) VALUES
(14, 'Renata Lena', 'dm9', 66, 'renata.lena', 'ItaÃº Unibanco (Full)', 'dm9', 'pagsclientes/Barra branca.png', 16),
(17, 'ItaÃº Unibanco', 'itau2012', 67, 'itau.unibanco', 'ItaÃº Unibanco', 'dm9', 'pagsclientes/Barra branca.png', 16),
(20, 'Axel Schroeder', 'Oudhrwe', 62, 'axel.schroeder', 'Volkswagen', 'almapbbdo', 'pagsclientes/Topo Almap Clean.png', 17),
(21, 'Carla Nogueira', '1131515', 62, 'carla.nogueira', 'Volkswagen', 'almapbbdo', 'pagsclientes/Topo Almap Clean.png', 17),
(22, 'Artur Martins', 'KJSAlkjh', 62, 'artur.martins', 'Volkswagen', 'almapbbdo', 'pagsclientes/Topo Almap Clean.png', 17),
(23, 'Ana Paula LobÃ£o', 'POSFIod', 62, 'ana.lobao', 'Volkswagen', 'almapbbdo', 'pagsclientes/Topo Almap Clean.png', 17),
(24, 'FÃ¡bio Souza', 'OISfnnd', 62, 'fabio.souza', 'Volkswagen', 'almapbbdo', 'pagsclientes/Topo Almap Clean.png', 17),
(25, 'Fabio Rabelo', 'Ã‡LAJfdda', 62, 'fabio.rabelo', 'Volkswagen', 'almapbbdo', 'pagsclientes/Topo Almap Clean.png', 17),
(26, 'Gustavo Chiarella', 'LKAJDgggd', 62, 'gustavo.chiarella', 'Volkswagen', 'almapbbdo', 'pagsclientes/Topo Almap Clean.png', 17),
(40, 'Fabiana Manfredi', 'c&a2013', 68, 'fabiana.manfredi', 'C&A', 'dm9', 'pagsclientes/Barra branca.png', 16),
(41, 'Geraldine Gheron', 'cortexmedia2013', 62, 'geraldine.gheron', 'Volkswagen', 'almapbbdo', 'pagsclientes/Topo Almap Clean.png', 17),
(42, 'Ana Cester', '12345', 62, 'Ana.Cester', 'Volkswagen', 'almapbbdo', 'pagsclientes/Topo Almap Clean.png', 17),
(43, 'Christiano Silva', 'silvacp1', 83, 'christiano.silva', 'ComentÃ¡rios Virologia', 'Abbott', 'pagsclientes/Barra branca.png', 22),
(44, 'Roberta Correa', 'hornerm1', 83, 'roberta.correa', 'ComentÃ¡rios Virologia', 'Abbott', 'pagsclientes/Barra branca.png', 22),
(45, 'Alex Carneiro', 'abbott#4', 83, 'alex.carneiro', 'ComentÃ¡rios Virologia', 'Abbott', 'pagsclientes/Barra branca.png', 22),
(46, 'Marcia Schontag', 'abbott#5', 83, 'marcia.schontag', 'ComentÃ¡rios Virologia', 'Abbott', 'pagsclientes/Barra branca.png', 22),
(47, 'Erick Burato', 'abbott#6', 83, 'erick.burato', 'ComentÃ¡rios Virologia', 'Abbott', 'pagsclientes/Barra branca.png', 22),
(48, 'Yuri Castro', 'abbott#7', 83, 'yuri.castro', 'ComentÃ¡rios Virologia', 'Abbott', 'pagsclientes/Barra branca.png', 22),
(49, 'Adriano Vinhati', '6833hsbc', 83, 'adriano.vinhati', 'ComentÃ¡rios Virologia', 'Abbott', 'pagsclientes/Barra branca.png', 22),
(50, 'Willian Ruberti', 'abbott#8', 83, 'willian.ruberti', 'ComentÃ¡rios Virologia', 'Abbott', 'pagsclientes/Barra branca.png', 22);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
