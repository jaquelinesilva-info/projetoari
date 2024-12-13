<?php
// Configuração do banco de dados
$servername = "pcrn-server.mysql.database.azure.com";
$username = "ahmmucgqjh";
$password = "Denis99656335";
$database = "pcrn_bd";
$ssl_ca = 'DigiCertGlobalRootG2.crt.pem';


// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
// Configurações SSL
mysqli_ssl_set($conn, NULL, NULL, $ssl_ca, NULL, NULL);

if ($conn->ping()) {
    echo 'Conexão bem-sucedida com o banco de dados usando SSL!';
} else {
    echo 'Falha na conexão com o banco de dados!';
}

$conn->close();

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

    // Fecha a conexão
    $stmt->close();
    $conn->close();
}
?>