<?php
// Ativa a exibição de todos os erros no PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Função para remover acentos e caracteres especiais
function removerAcentos($str) {
    $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'ĸ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ŋ', 'ŋ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
    $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'N', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
    return str_replace($a, $b, $str);
}

// Função para extrair o título do HTML
function extrairTitulo($html) {
    // Expressão regular para encontrar o título dentro da tag <h1>
    $pattern = '/<h1 class="dsvia-heading css-1cx4w9k">(.*?)<\/h1>/s';
    preg_match($pattern, $html, $matches);

    if (isset($matches[1])) {
        // Limpa o título removendo tags HTML
        $titulo = strip_tags($matches[1]); // Remove tags HTML do título
        $titulo = removerAcentos($titulo); // Remove acentos e caracteres especiais

        // Remove caracteres não alfanuméricos, exceto hífens e espaços
        $titulo = preg_replace('/[^\p{L}\p{N}\s-]/u', '', $titulo);

        // Substitui múltiplos espaços por um único espaço
        $titulo = preg_replace('/\s+/', ' ', $titulo);

        // Substitui espaços por hífens e converte para minúsculas
        $titulo = str_replace(' ', '-', $titulo);
        $titulo = strtolower($titulo);

        return $titulo; // Retorna o título limpo e formatado para URL
    } else {
        return ''; // Retorna um valor padrão caso não encontre o título
    }
}

// Função para extrair o código do item do HTML
function extrairCodigoItem($html) {
    // Expressão regular para extrair o código do item
    $pattern = '/\(Cód\. Item\s*<!--?\s*(\d+)\s*--?>\)/';

    preg_match($pattern, $html, $matches);

    if (isset($matches[1])) {
        return $matches[1]; // Retorna o código do item encontrado
    } else {
        return ''; // Retorna vazio se não encontrar o código do item
    }
}

// Verifica se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['url'])) {
    $url = $_POST['url'];
    
    // Configurações para cURL
    $viewportWidth = 430;
    $viewportHeight = 932;
    $ch = curl_init();
    $userAgent = 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.0 Mobile/15E148 Safari/604.1';
    
    // Configuração das opções do cURL
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'Accept-Language: en-US,en;q=0.5',
        'Accept-Encoding: gzip, deflate',
        'Connection: keep-alive',
        'Referer: https://www.casasbahia.com.br/',
        'Viewport-Width: ' . $viewportWidth,
        'Viewport-Height: ' . $viewportHeight,
    ]);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    
    // Executa a requisição cURL
    $response = curl_exec($ch);
    if(curl_errno($ch)) {
        echo 'Erro cURL: ' . curl_error($ch);
        exit;
    }
    
    // Verifica o código de status HTTP
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($httpCode != 200) {
        echo "Erro ao obter o código-fonte da URL. Código HTTP: $httpCode";
        curl_close($ch);
        exit;
    }
    
    // Decodifica a resposta se estiver codificada
    $decodedResponse = $response;
    if (strpos(strtolower($response), 'content-encoding: gzip') !== false) {
        $decodedResponse = gzdecode($response);
    } elseif (strpos(strtolower($response), 'content-encoding: deflate') !== false) {
        $decodedResponse = gzinflate($response);
    }
    
    curl_close($ch);
    
    // Extrai o título do produto
    $titulo = extrairTitulo($decodedResponse);
    
    // Extrai o código do item
    $codigoItem = extrairCodigoItem($decodedResponse);
    
    // Gera o nome do arquivo baseado no código do item e título formatado para URL
    $filename = $codigoItem . '.php'; // Usar extensão .php para arquivos PHP

    // Remove caracteres indesejados do nome do arquivo
    $filename = preg_replace('/[^a-zA-Z0-9\-]/', '', $filename);

    // Substitui espaços por hífens no nome do arquivo
    $filename = str_replace(' ', '-', $filename);

    // Remove hífens duplicados
    $filename = preg_replace('/-{2,}/', '-', $filename);

    // Caminho onde deseja salvar o arquivo (ajuste conforme necessário)
    $pasta = '../../produtos/' . $codigoItem . '/';
    if (!file_exists($pasta)) {
        mkdir($pasta, 0777, true); // Cria a pasta se não existir
    }
    
    $caminhoCompleto = $pasta . $filename;

    // Salva o conteúdo em um arquivo
    if (file_put_contents($caminhoCompleto, $decodedResponse) === false) {
        echo "Erro ao salvar o código-fonte no arquivo.";
        exit;
    }
    
    // Redireciona para adicionarproduto2.php enviando o nome do arquivo via POST hidden
    echo '<form id="redirectForm" action="adicionarproduto2.php" method="post">';
    echo '<input type="hidden" name="caminhoCompleto" value="' . $caminhoCompleto . '">';
    echo '</form>';
    echo '<script>document.getElementById("redirectForm").submit();</script>';
    exit;
}
?>
