<?php
    include_once 'conexao.php';

    $veiculos = $_POST['palavra'];
    $listarVeiculosComReserva = getConn()->prepare("SELECT *
                                                    FROM estadia 
                                                    INNER JOIN veiculo ON estadia.idVeiculo = veiculo.id
                                                    WHERE estadia.situacao = 1 AND veiculo.cliente LIKE '%$veiculos%' OR veiculo.placa LIKE '%$veiculos%'");
    $listarVeiculosComReserva->execute();
    $contarVeiculosComReserva = $listarVeiculosComReserva->rowCount();

    if ($contarVeiculosComReserva <= 0) {
        echo "<td colspan='4' class='text-center'> Nenhum veículo foi encontrado! </td>";
    }
        else {
            foreach ($listarVeiculosComReserva as $dado) {
                echo "<tr>
                        <td>".$dado['cliente']."</td>
                        <td>".$dado['placa']."</td>
                        <td>".$dado['horaInicio']."</td>
                        <td> <a href='../editar/aluno.php?id=".$dado['id']."'> <img src='../_img/finalizar-reserva.png' alt='Editar'> </a> </td>
                      </tr>";
            }
        }
?>