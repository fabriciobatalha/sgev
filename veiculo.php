<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title> Veículo - SGEV </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="_css/bootstrap.min.css">
        <link rel="stylesheet" href="_css/master.css">
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
                    <h1 class="text-center display-4"> Veículo </h1>

                    <div class="pt-5 text-center text-md-left">
                        <a class="btn btn-outline-secondary" href="index.php"> Voltar para o Menu Principal </a>
                    </div>
                    
                    <div class="row text-center pt-5">
                        <div class="col"></div>
                        
                        <div class="col-12 col-md-3 p-4">
                            <a href="veiculo/cadastrar-veiculo.php">
                                <div class="bloco rounded-lg">
                                    <p class="py-5"> Cadastrar Veículo </p>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-3 p-4">
                            <a href="veiculo/veiculos-cadastrados.php">
                                <div class="bloco rounded-lg">
                                    <p class="py-5"> Veículos Cadastrados </p>
                                </div>
                            </a>
                        </div>

                        <div class="col"></div>
                    </div>
                </div>
            </section>
        </main>

        <script src="_js/jquery.min.js"></script>
        <script src="_js/bootstrap.min.js"></script>
    </body>
</html>