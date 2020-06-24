<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title> Relatório Personalizado - SGEV </title>
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
                    <h1 class="text-center display-4"> Relatório Personalizado </h1>
                    
                    <div class="pt-5 text-center text-md-left">
                        <a class="btn btn-outline-secondary" href="../relatorios.php"> Voltar para Relatórios </a>
                    </div>

                    <div class="row pt-5">
                        <div class="col"></div>

                        <div class="col-12 col-md-4">
                            <form action="resultado-relatorio-personalizado.php" method="post">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> De </span>
                                    </div>

                                    <input type="date" class="form-control" id="periodo-inicio" name="periodo-inicio" maxlength="7" required>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> Até </span>
                                    </div>

                                    <input type="date" class="form-control" id="periodo-fim" name="periodo-fim" required>
                                </div>
                                
                                <button class="btn btn-outline-success w-100" type="submit"> Gerar Relatório </button>
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