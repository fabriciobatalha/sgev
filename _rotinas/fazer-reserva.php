<?php
    include_once 'conexao.php';

    @$id = $_POST['cliente-veiculo'];

    $veiculosEstacionados = getConn()->prepare("SELECT *
                                                FROM estadia 
                                                WHERE estadia.situacao = 1");
    $veiculosEstacionados->execute();
    $contarVeiculosEstacionados = $veiculosEstacionados->rowCount();

    if (empty($id)) {
        echo "<script> alert('Erro! Selecione um veículo!'); window.location='../reserva/fazer-reserva.php'; </script>";
    }
        else {
            $consulta = getConn()->prepare("SELECT estadia.id AS estadiaId, estadia.idVeiculo AS estadiaIdVeiculo, estadia.situacao AS estadiaSituacao, veiculo.id AS veiculoId
                                 FROM estadia 
                                 INNER JOIN veiculo ON estadia.idVeiculo = veiculo.id
                                 WHERE veiculo.id = '$id' AND estadia.situacao = 1");
            $consulta->execute();
            $contarConsulta = $consulta->rowCount();
            
            if ($contarConsulta < 1)
            {
                if ($contarVeiculosEstacionados < 10) {
                    $fazerReserva = getConn()->prepare("INSERT INTO estadia (data, horaInicio, idVeiculo, situacao) VALUES (now(), now(), '$id', 1)");
                    
                    if ($fazerReserva->execute()) {
                        echo "<script> alert('Reserva efetuada com sucesso!'); window.location='../reserva/verificar-reserva.php'; </script>";
                    }
                        else {
                            echo "<script> alert('Erro ao tentar fazer a reserva! Tente novamente!'); window.location='../reserva/fazer-reserva.php'; </script>";
                        }
                }
                    else {
                        echo "<script> alert('Erro! Não foi possível realizar a reserva. O estacionamento atingiu a capacidade máxima de veículos estacionados.'); window.location='../reserva/verificar-reserva.php'; </script>";
                    }
            }
                else {
                    echo "<script> alert('Erro! Veículo já se encontra com reserva ativa!'); window.location='../reserva/fazer-reserva.php'; </script>";
                }
        }
?>