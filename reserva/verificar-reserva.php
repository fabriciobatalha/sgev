<?php
    require_once '../_rotinas/conexao.php';

    $listarVeiculosEstacionados = getConn()->prepare("SELECT estadia.id AS estadiaId, estadia.data AS estadiaData, estadia.horaInicio AS estadiaHoraInicio, estadia.horaFim AS estadiaHoraFim, estadia.idVeiculo AS estadiaIdVeiculo, estadia.situacao AS estadiaSituacao, veiculo.id AS veiculoId, veiculo.placa AS veiculoPlaca, veiculo.cliente AS veiculoCliente
                                                      FROM estadia 
                                                      INNER JOIN veiculo ON estadia.idVeiculo = veiculo.id
                                                      WHERE situacao != 0
                                                      ORDER BY veiculo.cliente");
    $listarVeiculosEstacionados->execute();
    $contarVeiculosEstacionados = $listarVeiculosEstacionados->rowCount();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title> Verificar Reserva - SGEV </title>
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
                    <h1 class="text-center display-4"> Verificar Reserva </h1>
                    
                    <div class="pt-5 text-center text-md-left">
                        <a class="btn btn-outline-secondary" href="../reserva.php"> Voltar para a Reserva </a>
                    </div>

                    <div class="row pt-5">
                        <div class="col"></div>

                        <div class="col-6">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th scope="col"> Vagas Disponíveis </th>
                                        <th scope="col"> Vagas Ocupadas </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td> <?php echo $vagasDisponiveis = 10 - $contarVeiculosEstacionados; ?> </td>
                                        <td> <?php echo $contarVeiculosEstacionados; ?> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col"></div>
                    </div>

                    <div class="pt-5">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> Pesquisar </span>
                            </div>
    
                            <input type="text" class="form-control" name="pesquisa-veiculo" id="pesquisa-veiculo" placeholder="Busque pela placa ou cliente">
                        </div>
                    </div>

                    <div class="row pt-5">
                        <div class="col"></div>

                        <div id="div-resultado-busca-veiculo" class="col-12">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"> Cliente </th>
                                        <th scope="col"> Placa </th>
                                        <th scope="col"> Início da Reserva </th>
                                        <th scope="col"> Finalizar </th>
                                    </tr>
                                </thead>

                                <tbody id="resultado-busca-veiculo">

                                </tbody>
                            </table>
                        </div>

                        <div id="listagem-veiculos" class="col-12">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"> Cliente </th>
                                        <th scope="col"> Placa </th>
                                        <th scope="col"> Início da Reserva </th>
                                        <th scope="col"> Finalizar </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        if ($contarVeiculosEstacionados > 0) { 
                                            foreach ($listarVeiculosEstacionados as $dado) { 
                                    ?>

                                    <tr>
                                        <td> <?php echo $dado['veiculoCliente']; ?> </td>
                                        <td> <?php echo $dado['veiculoPlaca']; ?> </td>
                                        <td> <?php echo $dado['estadiaHoraInicio']; ?> </td>
                                        <td> <a href="status-reserva.php?estadiaId=<?php echo $dado['estadiaId']; ?>&veiculoId=<?php echo $dado['veiculoId']; ?>"> <img src="../_img/finalizar-reserva.png" alt="Finalizar Reserva"> </a> </td>
                                    </tr>

                                    <?php 
                                            }
                                        }
                                            else {
                                                echo "<td colspan='4' class='text-center'> Nenhum veículo estacionado! </td>";
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