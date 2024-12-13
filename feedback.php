<?php
$servername = "pcrn-server.mysql.database.azure.com";
$username = "ahmmucgqjh";
$password = "Denis99656335";
$database = "pcrn_bd";
$ssl_ca = 'DigiCertGlobalRootG2.crt.pem';
// Criando conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Criar a tabela caso não exista
$sql_create_table = "
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `sugestoes` text DEFAULT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

// Executando a criação da tabela
if ($conn->query($sql_create_table) === TRUE) {
    echo "Tabela 'feedbacks' criada ou já existe.<br>";
} else {
    echo "Erro ao criar a tabela: " . $conn->error . "<br>";
}

// Buscar os feedbacks
$sql = "SELECT * FROM feedbacks ORDER BY data_envio DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PCRN - Feedback</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

<div id="wrapper">
    <!-- Sidebar e conteúdo omitido para clareza -->

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
            </nav>

            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Feedback</h1>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <form action="salvar_feedback.php" method="POST">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Feedback para melhorar o nosso sistema</h6>
                                </div>
                                <div class="card-body">
                                    <h5 style="text-align: center;">Descrição da sua experiência</h5>
                                    <textarea name="descricao" id="descricao" placeholder="Descreva brevemente o motivo pelo qual você entrou em contato com a Polícia Civil e como foi o atendimento…"></textarea>
                                </div>

                                <div class="rating-section">
                                    <h2>Avalie</h2>
                                    <div class="estrelas">
                                        <input type="radio" id="cm_star-empty" name="avaliacao" value="0" />
                                        <label for="cm_star-1"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-1" name="avaliacao" value="1" />
                                        <label for="cm_star-2"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-2" name="avaliacao" value="2" />
                                        <label for="cm_star-3"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-3" name="avaliacao" value="3" />
                                        <label for="cm_star-4"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-4" name="avaliacao" value="4" />
                                        <label for="cm_star-5"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-5" name="avaliacao" value="5" />
                                    </div>
                                </div>

                                <div class="card-body">
                                    <h5>Sugestões de melhorias (se houver)</h5>
                                    <textarea name="sugestoes" id="sugestoes" placeholder="Se você sentiu que algo poderia ser melhorado, essa é a oportunidade de expressar suas sugestões de forma construtiva…"></textarea>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">CONFIRMAR</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-12 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Lista de Feedbacks</h6>
                            </div>
                            <div class="card-body">
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<div>";
                                        echo "<h3>Experiência:</h3><p>" . htmlspecialchars($row['descricao'], ENT_QUOTES, 'UTF-8') . "</p>";
                                        echo "<h3>Avaliação:</h3><p>";
                                        $avaliacao = $row['avaliacao']; // A avaliação em número de estrelas
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $avaliacao) {
                                                echo '<i class="fa fa-star" style="color: gold;"></i>'; // Estrela cheia
                                            } else {
                                                echo '<i class="fa fa-star" style="color: gray;"></i>'; // Estrela vazia
                                            }
                                        }
                                        echo "</p>";
                                        echo "<h3>Sugestões:</h3><p>" . htmlspecialchars($row['sugestoes'], ENT_QUOTES, 'UTF-8') . "</p>";
                                        echo "<h5>Enviado em: " . htmlspecialchars($row['data_envio'], ENT_QUOTES, 'UTF-8') . "</h5>";
                                        echo "</div><hr>";
                                    }
                                } else {
                                    echo "<p>Nenhum feedback encontrado.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>
