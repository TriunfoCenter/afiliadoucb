-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2024 at 10:32 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afiliadocb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `login`, `senha`) VALUES
(1, 'castro', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `anotacoes`
--

CREATE TABLE `anotacoes` (
  `id` int NOT NULL,
  `anotacao` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int NOT NULL,
  `nome` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `link`) VALUES
(49, 'iPhone', NULL),
(50, 'Smartphones', NULL),
(51, 'TV\'s', NULL),
(52, 'Eletrodomésticos', NULL),
(53, 'Móveis', NULL),
(54, 'Informática', NULL),
(55, 'Eletroportáteis', NULL),
(56, 'Inverno', NULL),
(57, 'Beleza', NULL),
(58, 'Utilidades Domésticas', NULL),
(59, 'Áudio', NULL),
(60, 'Games', NULL),
(61, 'Ar e Ventilação', NULL),
(62, 'Perfumaria', NULL),
(63, 'Automotivo', NULL),
(64, 'Ferramentas', NULL),
(65, 'Acessórios', NULL),
(66, 'Bebidas', NULL),
(67, 'Cama & Banho', NULL),
(68, 'Malas e acessórios', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `assunto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempoatras` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `texto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cliente` tinyint(1) DEFAULT NULL,
  `data` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hora` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `nome`, `tempoatras`, `texto`, `cliente`, `data`, `hora`) VALUES
(1, 'João Silva', '2 horas atrás', 'Ótimo serviço!', 1, '13-03-2023', '09:00'),
(2, 'Maria Oliveira', '1 dia atrás', 'Preciso de mais informações.', 0, '14-03-2023', '10:15'),
(3, 'Carlos Almeida', '3 horas atrás', 'Excelente atendimento ao cliente.', 1, '15-03-2023', '11:30'),
(4, 'Ana Fonseca', '2 horas atrás', 'Estou muito satisfeito com o produto.', 1, '16-03-2023', '12:45'),
(5, 'Pedro Silva', '1 dia atrás', 'Podiam melhorar o tempo de entrega.', 0, '17-03-2023', '14:00'),
(6, 'Lucas Vanessa', '3 horas atrás', 'Ótimo suporte ao cliente.', 1, '18-03-2023', '15:20');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int NOT NULL,
  `chavepix` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `carteirabtc` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `googlerecaptchakey` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `googlerecaptchasecret` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `verifyemail` tinyint(1) DEFAULT NULL,
  `verifysms` tinyint(1) DEFAULT NULL,
  `mobileordesktop` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `manutencao` tinyint(1) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `chavepix`, `carteirabtc`, `token`, `googlerecaptchakey`, `googlerecaptchasecret`, `verifyemail`, `verifysms`, `mobileordesktop`, `manutencao`, `email`) VALUES
(1, 'chave_pix_aleatoria', 'carteira_btc_aleatoria', 'token_aleatorio', 'google_recaptcha_key_aleatoria', 'google_recaptcha_secret_aleatorio', 0, 0, 'A', 0, 'castro@app.com');

-- --------------------------------------------------------

--
-- Table structure for table `cupom`
--

CREATE TABLE `cupom` (
  `id` int NOT NULL,
  `validopara` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `codigocupom` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `porcentagemdedesconto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `criadopor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `criadoem` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historicologin`
--

CREATE TABLE `historicologin` (
  `id` int NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `clientagent` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maisvendidos`
--

CREATE TABLE `maisvendidos` (
  `id` int NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `marca` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_general_ci,
  `nome` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `preco` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `desconto` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moderadores`
--

CREATE TABLE `moderadores` (
  `id` int NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mensagensrespondidas` int DEFAULT '0',
  `visitas` int DEFAULT '0',
  `imagem` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `criadoem` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moderadores`
--

INSERT INTO `moderadores` (`id`, `login`, `senha`, `email`, `mensagensrespondidas`, `visitas`, `imagem`, `criadoem`) VALUES
(1, 'usuario1', 'senha123', 'usuario1@example.com', 576, 55, 'imagem1.jpg', '1 Dia atrás'),
(2, 'usuario2', 'senha456', 'usuario2@example.com', 11, 12, 'imagem2.jpg', '2 Dias atrás'),
(3, 'usuario3', 'senha789', 'usuario3@example.com', 12, 300, 'imagem3.jpg', '3 Dias atrás');

-- --------------------------------------------------------

--
-- Table structure for table `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int NOT NULL,
  `produto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `valor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `forma_pagamento` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `produto`, `valor`, `forma_pagamento`, `img`) VALUES
(1, 'Camiseta', '29.99', 'Cartão de Crédito', 'camiseta.jpg'),
(2, 'Tênis', '99.90', 'Boleto Bancário', 'tenis.jpg'),
(3, 'Calça Jeans', '49.50', 'PIX', 'calca_jeans.jpg'),
(4, 'Bermuda', '39.99', 'Transferência Bancária', 'bermuda.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pagepainel`
--

CREATE TABLE `pagepainel` (
  `id` int NOT NULL,
  `titulo_site` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pagepainel`
--

INSERT INTO `pagepainel` (`id`, `titulo_site`, `favicon`, `banner`, `titulo`, `cor`) VALUES
(1, 'Triunfo Store', 'favicon1.png', 'banner1.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `id` int NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `marca` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_general_ci,
  `quantidadevisitas` int DEFAULT '0',
  `destaque` tinyint(1) DEFAULT '0',
  `link` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `valoratual` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `valoranterior` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `valorpix` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tamanho` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rastreio`
--

CREATE TABLE `rastreio` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `codigo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_general_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `saida` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `chegada` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dias` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `localizacao_atual` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_envio` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redessociais`
--

CREATE TABLE `redessociais` (
  `whatsapp` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Youtube` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Instagram` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `redessociais`
--

INSERT INTO `redessociais` (`whatsapp`, `facebook`, `linkedin`, `twitter`, `Youtube`, `Instagram`, `id`) VALUES
('+55629844094949', 'castrofaceb', 'castrolinkedin', 'castrotwitter', 'castroyoutube', 'castroinsta', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smtp`
--

CREATE TABLE `smtp` (
  `id` bigint UNSIGNED NOT NULL,
  `host` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `porta` int DEFAULT NULL,
  `usuario` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `senha` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smtp`
--

INSERT INTO `smtp` (`id`, `host`, `porta`, `usuario`, `senha`, `email`) VALUES
(1, 'smtp.hostinger.com', 587, 'triunfostore_u2952092', 'senhasmtp', 'suporte@triunfostore.com.br');

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE `total` (
  `id` int NOT NULL,
  `qntdepix` int DEFAULT NULL,
  `qntdeboleto` int DEFAULT NULL,
  `qntdeVendas` int DEFAULT '0',
  `qntdepedidos` int DEFAULT NULL,
  `qntdeclientes` int DEFAULT NULL,
  `qntdeprodutos` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `total`
--

INSERT INTO `total` (`id`, `qntdepix`, `qntdeboleto`, `qntdeVendas`, `qntdepedidos`, `qntdeclientes`, `qntdeprodutos`) VALUES
(1, 20, 3, 100, 12, 33, 55);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cep` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ncelular` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `carrinho` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `genero` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idade` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nascimento` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rua` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `receber_email` tinyint(1) DEFAULT NULL,
  `quantidadeCliques` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `quantidadeVisitas` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ncelular2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `receber_whats` tinyint(1) DEFAULT NULL,
  `fisicaoujuridica` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cnpj` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `entregue` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pago` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cancelado` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qntdePedidosEfetuados` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendas`
--

CREATE TABLE `vendas` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cep` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ncelular` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `carrinho` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `client_agent` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `localidade` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `genero` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idade` int DEFAULT NULL,
  `nascimento` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rua` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `criado` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `metodopagamento` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendas`
--

INSERT INTO `vendas` (`id`, `nome`, `cpf`, `endereco`, `ip`, `cep`, `complemento`, `ncelular`, `email`, `senha`, `carrinho`, `client_agent`, `localidade`, `genero`, `idade`, `nascimento`, `rua`, `bairro`, `cidade`, `estado`, `criado`, `total`, `status`, `metodopagamento`) VALUES
(1, 'João Silva', '123.456.789-01', 'Rua das Flores, 123', '192.168.1.1', '12345-678', 'Apto 101', '99999-9999', 'joao@example.com', 'senha123', 'produto1,produto2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.0.0 Safari/537.36', 'São Paulo', 'Masculino', 30, '1994-01-01', 'Rua Principal', 'Centro', 'São Paulo', 'SP', NULL, NULL, NULL, NULL),
(2, 'Maria Oliveira', '987.654.321-09', 'Av. dos Passarinhos, 456', '10.0.0.1', '54321-987', 'Casa 2', '88888-8888', 'maria@example.com', 'senha456', 'produto3,produto4', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 11_0_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.0.0 Safari/537.36', 'Rio de Janeiro', 'Feminino', 25, '1999-05-20', 'Avenida Principal', 'Centro', 'Rio de Janeiro', 'RJ', NULL, NULL, NULL, NULL),
(3, 'José Santos', '111.222.333-44', 'Rua das Pedras, 789', '192.168.0.1', '67890-123', 'Bloco B', '77777-7777', 'jose@example.com', 'senha789', 'produto5,produto6', 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko', 'Belo Horizonte', 'Masculino', 35, '1989-10-15', 'Rua Secundária', 'Bairro Novo', 'Belo Horizonte', 'MG', NULL, NULL, NULL, NULL),
(4, 'Ana Lima', '555.666.777-88', 'Av. das Árvores, 1010', '10.0.0.2', '13579-246', 'Bloco C, Ap. 303', '66666-6666', 'ana@example.com', 'senhaabc', 'produto7,produto8', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.0 Mobile/15E148 Safari/604.1', 'Curitiba', 'Feminino', 28, '1996-12-05', 'Avenida Principal', 'Centro', 'Curitiba', 'PR', NULL, NULL, NULL, NULL),
(5, 'Carlos Pereira', '999.888.777-66', 'Rua dos Coqueiros, 321', '192.168.2.1', '54321-135', 'Apto 202', '55555-5555', 'carlos@example.com', 'senha123abc', 'produto9,produto10', 'Mozilla/5.0 (Linux; Android 12; Pixel 6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.0.0 Mobile Safari/537.36', 'Porto Alegre', 'Masculino', 40, '1984-07-10', 'Rua Nova', 'Centro', 'Porto Alegre', 'RS', NULL, NULL, NULL, NULL),
(6, 'Mariana Silva', '123.412.341-23', 'Av. dos Girassóis, 567', '10.0.0.3', '98765-432', 'Casa 3', '44444-4444', 'mariana@example.com', 'senha456def', 'produto11,produto12', 'Mozilla/5.0 (Linux; Android 11; SM-G991B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.0.0 Mobile Safari/537.36', 'Recife', 'Feminino', 22, '2001-11-30', 'Avenida Principal', 'Centro', 'Recife', 'PE', NULL, NULL, NULL, NULL),
(7, 'Pedro Costa', '777.555.666-44', 'Rua das Rosas, 987', '192.168.3.1', '54321-678', 'Bloco D, Ap. 404', '33333-3333', 'pedro@example.com', 'senha789ghi', 'produto13,produto14', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_8 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1', 'Salvador', 'Masculino', 32, '1992-08-25', 'Rua das Flores', 'Bairro Novo', 'Salvador', 'BA', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `anotacoes`
--
ALTER TABLE `anotacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupom`
--
ALTER TABLE `cupom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historicologin`
--
ALTER TABLE `historicologin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderadores`
--
ALTER TABLE `moderadores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagepainel`
--
ALTER TABLE `pagepainel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redessociais`
--
ALTER TABLE `redessociais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp`
--
ALTER TABLE `smtp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anotacoes`
--
ALTER TABLE `anotacoes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cupom`
--
ALTER TABLE `cupom`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historicologin`
--
ALTER TABLE `historicologin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moderadores`
--
ALTER TABLE `moderadores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pagepainel`
--
ALTER TABLE `pagepainel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redessociais`
--
ALTER TABLE `redessociais`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smtp`
--
ALTER TABLE `smtp`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `total`
--
ALTER TABLE `total`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
