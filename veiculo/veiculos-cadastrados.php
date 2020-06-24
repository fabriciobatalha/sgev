<?php
    require_once '../_rotinas/conexao.php';

    $listarVeiculosEstacionados = getConn()->prepare("SELECT *
                                                      FROM veiculo
                                                      ORDER BY cliente");
    $listarVeiculosEstacionados->execute();
    $contarVeiculosEstacionados = $listarVeiculosEstacionados->rowCount();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title> Veículos Cadastrados - SGEV </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../_css/bootstrap.min.css">
        <link rel="stylesheet" href="../_css/master.css">
    </head>

    <body class="bg-light">
        <header>
            <nav class="navbar navbar-dark bg-dark shadow p-3 mb-5 bg-dark">
                <div class="container">
                    <h1 class="m-auto display-4 text-white"> SGEV </h1>
                </div>
            </nav>
        </header>

        <main>
            <section class="py-5">
                <div class="container">
                    <h1 class="text-center display-4"> Veículos Cadastrados </h1>
                    
                    <div class="pt-5 text-center text-md-left">
                        <a class="btn btn-outline-secondary" href="../veiculo.php"> Voltar para Veículo </a>
                    </div>

                    <div class="row pt-5">
                        <div class="col"></div>

                        <div id="listagem-veiculos" class="col-8">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"> Cliente </th>
                                        <th scope="col"> Placa </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        if ($contarVeiculosEstacionados > 0) { 
                                            foreach ($listarVeiculosEstacionados as $dado) { 
                                    ?>

                                    <tr>
                                        <td> <?php echo $dado['cliente']; ?> </td>
                                        <td> <?php echo $dado['placa']; ?> </td>
                                    </tr>

                                    <?php 
                                            }
                                        }
                                            else {
                                                echo "<td colspan='2' class='text-center'> Nenhum veículo cadastrado! </td>";
                                            }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col"></div>
                    </div>
                </div>
            </section>
        </main>

        <script src="../_js/jquery.min.js"></script>
        <script src="../_js/bootstrap.min.js"> </script>
        <script src="../_js/master.js"></script>
    </body>
</html>