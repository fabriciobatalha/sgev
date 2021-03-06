<?php
    require_once '../_rotinas/conexao.php';

    $listarVeiculos = getConn()->prepare("SELECT estadia.idVeiculo AS estadiaIdVeiculo, veiculo.id AS veiculoId, veiculo.placa AS veiculoPlaca, veiculo.cliente AS veiculoCliente, COUNT(idVeiculo) AS quantidadeReservas
                                          FROM estadia
                                          INNER JOIN veiculo ON estadia.idVeiculo = veiculo.id
                                          GROUP BY idVeiculo
                                          ORDER BY COUNT(idVeiculo) DESC");
    $listarVeiculos->execute();
    $contarVeiculosListados = $listarVeiculos->rowCount();
    
    $veiculosEstacionados = getConn()->prepare("SELECT *
                                                FROM estadia 
                                                WHERE estadia.situacao = 1");
    $veiculosEstacionados->execute();
    $contarVeiculosEstacionados = $veiculosEstacionados->rowCount();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title> Ranking Veículos - SGEV </title>
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
                    <h1 class="text-center display-4"> Ranking Veículos </h1>
                    
                    <div class="pt-5 text-center text-md-left">
                        <a class="btn btn-outline-secondary" href="../relatorios.php"> Voltar para Relatórios </a>
                    </div>

                    <div class="row pt-5">
                        <div class="col"></div>

                        <div class="col-12">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"> Cliente </th>
                                        <th scope="col"> Placa </th>
                                        <th scope="col"> Qtd. de Reservas </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        if ($contarVeiculosListados > 0) { 
                                            foreach ($listarVeiculos as $dado) { 
                                    ?>

                                    <tr>
                                        <td> <?php echo $dado['veiculoCliente']; ?> </td>
                                        <td> <?php echo $dado['veiculoPlaca']; ?> </td>
                                        <td> <?php echo $dado['quantidadeReservas']; ?> </td>
                                    </tr>

                                    <?php 
                                            }
                                        }
                                            else {
                                                echo "<td colspan='3' class='text-center'> Ainda não há nada por aqui! </td>";
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