<?php
// Inicia a sessão para utilizar sessões no PHP
session_start();

include('../../../src/settings/conexao.php');

// Verifica se os campos esperados foram enviados via POST
if (isset($_POST['usuario']) && isset($_POST['senha']) && isset($_POST['token'])) {
    // Recupera os valores enviados via POST
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $token = $_POST['token'];

    // Consulta para verificar o usuário e senha
    $stmt = $conn->prepare("SELECT * FROM admin WHERE login = ? AND senha = ?");
    $stmt->bind_param('ss', $usuario, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se encontrou algum usuário
    if ($result->num_rows > 0) {
        // Usuário e senha corretos, iniciar sessão
        $_SESSION['usuario'] = $usuario;
        header("Location: ../index.php"); // Redireciona para a página inicial
        exit();
    } else {
        // Usuário ou senha incorretos
        echo "Usuário ou senha incorretos, tente novamente";
        
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
} else {
    echo "Por favor, preencha todos os campos.";
}
?>
