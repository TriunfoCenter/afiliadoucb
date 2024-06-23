<?php
session_start();
include('../../../src/settings/conexao.php');

// Consulta ao banco de dados para obter as categorias
$sql = "SELECT nome, link FROM categorias";
$result = $conn->query($sql);

$categorias = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categorias[] = array(
            "titulo" => $row["nome"],
            "link" => $row["link"],
            "linkTitulo" => null,
            "linkTarget" => null
        );
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);

// Estrutura JSON a ser substituída
$novo_json = json_encode(array(
    "titulo" => "Produtos mais buscados",
    "links" => $categorias
), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

// Lê o conteúdo do arquivo PHP
$conteudo = file_get_contents('product_source.php');

// Substitui o JSON "marcas" no conteúdo
$conteudo = preg_replace('/"marcas": \{[^}]*\}/', '"marcas": ' . $novo_json, $conteudo);

// Continuando com as demais operações
$sql = "SELECT whatsapp, facebook, linkedin, twitter, Youtube, Instagram FROM redessociais WHERE id = 1";
$resultad = $conn->query($sql);

$sql = "SELECT nomeloja FROM config WHERE id = 1";
$result = $conn->query($sql);

if ($resultad) {
  $row = mysqli_fetch_assoc($resultad);
  $whatsapp = $row['whatsapp'];
  $facebook = $row['facebook'];
  $linkedin = $row['linkedin'];
  $twitter = $row['twitter'];
  $youtube = $row['Youtube'];
  $instagram = $row['Instagram'];
}

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $nomeloja = $row['nomeloja'];
}


if (preg_match('/<h1 class="dsvia-heading css-1cx4w9k">(.*?)<\/h1>/', $conteudo, $matches)) {
    $valor_div = $matches[1]; 
} else {
    $valor_div = ''; 
}

if (preg_match('/Cód\. Item\s*(?:<!--.*?-->)?\s*(\d+)/i', $conteudo, $matches)) {
    $codigo_item = $matches[1];
} else {
    $codigo_item = ''; 
}

// Captura o valor dentro da tag específica
if (preg_match('/<p class="dsvia-text css-alcf85" data-testid="product-price-value" id="product-price">\s*<span class="css-1vmkvrm">(.*?)<\/span>/', $conteudo, $matches)) {
    $valor_produto = $matches[1]; 
} else {
    $valor_produto = ''; 
}

// Remoção de links indesejados
$conteudo = preg_replace('/<link rel="dns-prefetch" href="https:\/\/bat\.bing\.com" crossorigin="true" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="dns-prefetch" href="https:\/\/dynamic\.criteo\.com" crossorigin="true" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="dns-prefetch" href="https:\/\/www\.dwin1\.com" crossorigin="true" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="preconnect" href="https:\/\/carrinho\.casasbahia\.com\.br" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="preconnect" href="https:\/\/pdp-api\.casasbahia\.com\.br" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="preconnect" href="https:\/\/via-ads-api\.viavarejo\.com\.br" crossorigin="true" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="preconnect" href="https:\/\/sections-descoberta\.viavarejo\.com\.br" crossorigin="true" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="preconnect" href="https:\/\/fonts\.gstatic\.com" crossorigin="true" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="preconnect" href="https:\/\/fonts\.googleapis\.com" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="preconnect" href="https:\/\/img\.youtube\.com" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="preconnect" href="https:\/\/www\.googletagmanager\.com" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="preconnect" href="https:\/\/dev\.visualwebsiteoptimizer\.com" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="dns-prefetch" href="https:\/\/c\.go-mpulse\.net" crossorigin="true" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="dns-prefetch" href="https:\/\/media\.pointandplace\.com" crossorigin="true" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="dns-prefetch" href="https:\/\/events-endpoint\.pointandplace\.com" crossorigin="true" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="dns-prefetch" href="https:\/\/plugin\.handtalk\.me" crossorigin="true" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="dns-prefetch" href="https:\/\/www\.gstatic\.com" crossorigin="true" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="dns-prefetch" href="https:\/\/adservice\.google\.com" crossorigin="true" \/>\s+/', '', $conteudo);
$conteudo = preg_replace('/<link rel="dns-prefetch" href="https:\/\/stats\.g\.doubleclick\.net\/" crossorigin="true" \/>\s+/', '', $conteudo);

// Substitui o título no formato especificado
$conteudo = preg_replace('/<title>(.*?) \| Casas Bahia<\/title>/', '<title>$1 | ' . $nomeloja . '</title>', $conteudo);

// Substitui o nome da aplicação
$conteudo = preg_replace('/<meta name="application-name" content="(.*?) \| Casas Bahia" \/>/', '<meta name="application-name" content="$1 | ' . $nomeloja . '" />', $conteudo);

// Substitui a descrição onde contém "Casas Bahia"
$conteudo = preg_replace('/<meta name="description" content="(.*?Casas Bahia.*?)"/', '<meta name="description" content="$1"', $conteudo);

$conteudo = preg_replace('/<meta name="Abstract" content="(.*?Casas Bahia.*?)"/', '<meta name="Abstract" content="$1"', $conteudo);

file_put_contents('arquivo.php', $conteudo);

echo "Arquivo arquivo.php criado com sucesso!";
echo $valor_div;
echo "Código do Item: " . $codigo_item . "<br>";
echo "Valor do Produto: " . $valor_produto . "<br>";
?>
