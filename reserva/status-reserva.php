<?php
    require_once '../_rotinas/conexao.php';

    $estadiaId = $_GET['estadiaId'];
    $veiculoId = $_GET['veiculoId'];

    $statusReserva = getConn()->prepare("SELECT estadia.id AS estadiaId, estadia.data AS estadiaData, estadia.horaInicio AS estadiaHoraInicio, estadia.horaFim AS estadiaHoraFim, estadia.idVeiculo AS estadiaIdVeiculo, estadia.situacao AS estadiaSituacao, veiculo.id AS veiculoId, veiculo.placa AS veiculoPlaca, veiculo.cliente AS veiculoCliente
                                         FROM estadia
                                         INNER JOIN veiculo ON estadia.idVeiculo = veiculo.id
                                         WHERE estadia.id = '$estadiaId'");
    $statusReserva->execute();

    $quantidadeEstadias = getConn()->prepare("SELECT estadia.idVeiculo AS estadiaIdVeiculo, veiculo.id AS veiculoId
                                              FROM estadia
                                              INNER JOIN veiculo ON estadia.idVeiculo = veiculo.id
                                              WHERE estadia.idVeiculo = '$veiculoId'");
    $quantidadeEstadias->execute();
    $contarQuantidadeEstadias = $quantidadeEstadias->rowCount();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title> Status Reserva - SGEV </title>
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
                    <h1 class="text-center display-4"> Status Reserva </h1>
                    
                    <div class="pt-5 text-center text-md-left">
                        <a class="btn btn-outline-secondary" href="verificar-reserva.php"> Voltar para Verificar Reserva </a>
                    </div>

                    <div class="row pt-5">
                        <div class="col"></div>

                        <div class="col-8">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th scope="col"> Cliente </th>
                                        <th scope="col"> Placa </th>
                                        <th scope="col"> Tempo de Estadia </th>
                                        <th scope="col"> Valor a ser cobrado </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <?php
                                            foreach ($statusReserva as $dado) {
                                                $inicioEstadia = new DateTime($dado['estadiaHoraInicio']);
                                                $fimEstadia = new DateTime(date('Y/m/d H:i:s'));
                                               
                                                $diferenca = $inicioEstadia->diff($fimEstadia);

                                                //$diferenca->format('%y ano(s), %m mês(s), %d dia(s), %H hora(s), %i minuto(s) e %s segundo(s)');

                                                $diaParaHora = ($diferenca->format('%d')) * 24;
                                                $hora = $diferenca->format('%H');

                                                $horasEstadia = $diaParaHora + $hora;

                                                if ($horasEstadia == 0) {
                                                    $horasEstadia = 1;
                                                    $valorTotal = $horasEstadia * 3;
                                                }
                                                    else {
                                                        $valorTotal = $horasEstadia * 3;
                                                    }
                                        ?>
                                            <td> <?php echo $dado['veiculoCliente']; ?> </td>
                                            <td> <?php echo $dado['veiculoPlaca']; ?> </td>
                                            <td> <?php echo "$horasEstadia h"; ?> </td>
                                            <?php
                                                $fidelidade = $contarQuantidadeEstadias % 11;

                                                if ($fidelidade == 0) {
                                            ?>
                                                <td> <?php echo "GRÁTIS"; ?> </td>
                                            <?php
                                                }
                                                    else {
                                            ?>
                                                        <td> <?php echo "R$ $valorTotal"; ?> </td>
                                            <?php
                                                    }
                                            ?>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="../_rotinas/finalizar-reserva.php?id=<?php echo $dado['estadiaId']; ?>&valor=<?php echo $valorTotal; ?>&veiculoId=<?php echo $dado['estadiaIdVeiculo']; ?>" class="btn btn-outline-success w-100" type="submit"> Finalizar e Pagar </a>
                                        <?php
                                            }
                                        ?>
                        </div>

                        <div class="col"></div>
                    </div>
                </div>
            </section>
        </main>

        <script src="../_js/jquery.min.js"></script>
        <script src="../_js/bootstrap.min.js"> </script>
    </body>
</html>