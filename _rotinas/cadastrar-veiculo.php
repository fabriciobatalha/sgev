<?php
    require_once 'conexao.php';

    $placa = $_POST['placa'];
    $cliente = $_POST['cliente'];

    if (empty($placa) || empty($cliente)) {
        echo "<script> alert('Preencha todos os campos!'); window.location='../cadastrar-veiculo.html'; </script>";
    }
        else {
            $consulta = getConn()->prepare("SELECT * FROM veiculo WHERE placa='$placa'");
            $consulta->execute();
            $contarConsulta = $consulta->rowCount();

            if ($contarConsulta < 1) {
                $cadastrarVeiculo = getConn()->prepare("INSERT INTO veiculo (placa, cliente) VALUES ('$placa', '$cliente')");

                if ($cadastrarVeiculo->execute()) {
                    echo "<script> alert('Veículo cadastrado com sucesso!'); window.location='../veiculo/veiculos-cadastrados.php'; </script>";
                }
                    else {
                        echo "<script> alert('Erro ao cadastrar veículo! Tente novamente!'); window.location='../cadastrar-veiculo.php'; </script>";
                    }
            }
                else {
                    echo "<script> alert('Erro! Veículo já cadastrado!'); window.location='../veiculo/veiculos-cadastrados.php'; </script>";
                }
        }
?>