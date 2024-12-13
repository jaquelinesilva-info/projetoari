<?php
$servername = "pcrn-server.mysql.database.azure.com";
$username = "ahmmucgqjh";
$password = "Denis99656335";
$database = "pcrn_bd";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-">
                    <img src="img/R.png" height="50px">
                </div>
                <div class="sidebar-brand-text mx-3">Polícia Cívil do RN </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contatos.html">
                    <i class="fas fa-fw fa-phone"></i>
                    <span>Contatos</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://delegaciavirtual.sinesp.gov.br/portal/">
                    <i class="fas fa-fw fa-globe"></i>
                    <span>Delegacia Virtual</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="noticias.html">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Noticias</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="missoes.html">
                    <i class="fas fa-fw fa-bookmark"></i>
                    <span>Missões</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="feedback.php">
                    <i class="fas fa-fw fa-heart"></i>
                    <span>feedback</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="O que você procura" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>



                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">feedback</h1>
                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <form action="salvar_feedback.php" method="POST">
                                <!-- Project Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Feedback para melhorar o nosso
                                            sistema</h6>
                                    </div>
                                    <script src="js/tinymce/tinymce.min.js"></script>
                                    <script>
                                        tinymce.init({
                                            selector: 'textarea',
                                            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                                            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                                        });
                                    </script>

                                    <div class="card-body">
                                        <h5 style="text-align: center;">Descrição da sua experiência</h5>
                                        <textarea name="descricao" id="descricao"
                                            placeholder="Descreva brevemente o motivo pelo qual você entrou em contato com a Polícia Civil e como foi o atendimento…"></textarea>
                                    </div>

                                    <div class="rating-section">
                                        <h2>Avalie</h2>
                                        <link rel="stylesheet"
                                            href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
                                        <textarea name="sugestoes" id="sugestoes"
                                            placeholder="Se você sentiu que algo poderia ser melhorado, essa é a oportunidade de expressar suas sugestões de forma construtiva…"></textarea>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">CONFIRMAR</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.container-fluid -->

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
                    <!-- End of Main Content -->

                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>







            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>