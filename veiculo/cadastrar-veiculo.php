<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title> Cadastrar Veículo - SGEV </title>
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
                    <h1 class="text-center display-4"> Cadastrar Veículo </h1>
                    
                    <div class="pt-5 text-center text-md-left">
                        <a class="btn btn-outline-secondary" href="../veiculo.php"> Voltar para o Veículo </a>
                    </div>

                    <div class="row pt-5">
                        <div class="col"></div>

                        <div class="col-12 col-md-4">
                            <form action="../_rotinas/cadastrar-veiculo.php" method="post">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> Placa </span>
                                    </div>

                                    <input type="text" class="form-control" id="placa" name="placa" maxlength="7" required>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> Cliente </span>
                                    </div>

                                    <input type="text" class="form-control" id="cliente" name="cliente" required>
                                </div>
                                
                                <button class="btn btn-outline-success w-100" type="submit"> Cadastrar </button>
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