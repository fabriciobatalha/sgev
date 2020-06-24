<?php
    require_once '../_rotinas/conexao.php';

    $listarVeiculos = getConn()->prepare("SELECT * 
                                          FROM veiculo
                                          ORDER BY cliente");
    $listarVeiculos->execute();

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
        <title> Fazer Reserva - SGEV </title>
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
                    <h1 class="text-center display-4"> Fazer Reserva </h1>
                    
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

                    <div class="row pt-5">
                        <div class="col"></div>

                        <div class="col-12 col-md-4">
                            <form action="../_rotinas/fazer-reserva.php" method="post">
                                <select name="cliente-veiculo" class="custom-select mb-3">
                                    <option disabled selected> Selecionar veículo </option>
                                    <?php
                                        foreach ($listarVeiculos as $dado) {
                                    ?>
                                            <option value="<?php echo $dado['id']; ?>"> <?php echo $dado['cliente']; echo " - "; echo $dado['placa']; ?> </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                
                                <button class="btn btn-outline-success w-100" type="submit"> Reservar </button>
                            </form>
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