<?php
    include_once 'conexao.php';

    $estadiaId = $_GET['id'];
    $veiculoId = $_GET['veiculoId'];
    $valor = $_GET['valor'];

    $quantidadeEstadias = getConn()->prepare("SELECT estadia.idVeiculo AS estadiaIdVeiculo, veiculo.id AS veiculoId
                                              FROM estadia
                                              INNER JOIN veiculo ON estadia.idVeiculo = veiculo.id
                                              WHERE estadia.idVeiculo = '$veiculoId'");
    $quantidadeEstadias->execute();
    $contarQuantidadeEstadias = $quantidadeEstadias->rowCount();

    if (empty($estadiaId) || empty($valor)) {
        echo "<script> alert('Nenhuma reserva selecionada!'); window.location='../reserva/verificar-reserva.php'; </script>";
    }
        else {
            $fidelidade = $contarQuantidadeEstadias % 11;

            if ($fidelidade == 0) {
                $finalizarReserva = getConn()->prepare("UPDATE estadia SET horaFim = now(), situacao = 0 WHERE id = '$estadiaId'");
                
                if ($finalizarReserva->execute()) {
                    echo "<script> alert('Reserva GRÁTIS finalizada com sucesso!'); window.location='../reserva/verificar-reserva.php'; </script>";
                }
                    else {
                        echo "<script> alert('Erro ao finalizar reserva GRÁTIS! Tente novamente!'); window.location='../reserva/verificar-reserva.php'; </script>";
                    }
            }
                else {
                    $finalizarReserva = getConn()->prepare("UPDATE estadia SET horaFim = now(), valor = '$valor', situacao = 0 WHERE id = '$estadiaId'");

                    if ($finalizarReserva->execute()) {
                        echo "<script> alert('Reserva finalizada com sucesso!'); window.location='../reserva/verificar-reserva.php'; </script>";
                    }
                        else {
                            echo "<script> alert('Erro ao finalizar reserva! Tente novamente!'); window.location='../reserva/verificar-reserva.php'; </script>";
                        }
                }
        }
?>