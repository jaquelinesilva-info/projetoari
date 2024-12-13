<?php
// Configuração do banco de dados
$servername = "pcrn-server.mysql.database.azure.com";
$username = "ahmmucgqjh";
$password = "Denis99656335";
$database = "pcrn_bd";
$ssl_ca = '/caminho/para/o/certificado/DigiCertGlobalRootG2.crt.pem'; // Caminho para o certificado

// Configurações de conexão com SSL
$conn = new mysqli();
$conn->ssl_set(NULL, NULL, $ssl_ca, NULL, NULL);

// Estabelece a conexão com o banco de dados
$conn->real_connect($servername, $username, $password, $database, 3306);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Testa a conexão
if ($conn->ping()) {
    echo 'Conexão bem-sucedida com o banco de dados usando SSL!';
} else {
    echo 'Falha na conexão com o banco de dados!';
}

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $descricao = strip_tags($_POST['descricao']);
    $avaliacao = $_POST['avaliacao'] ?? 0;
    $sugestoes = strip_tags($_POST['sugestoes']);

    // Prepara o SQL para inserção
    $sql = "INSERT INTO feedbacks (descricao, avaliacao, sugestoes) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $descricao, $avaliacao, $sugestoes);

    // Executa e redireciona
    if ($stmt->execute()) {
        header("Location: feedback.php?success=1");
    } else {
        header("Location: feedback.php?error=1");
    }

    // Fecha o statement
    $stmt->close();
}

// Fecha a conexão
$conn->close();
?>