$(function() {
    $("#div-resultado-busca-veiculo").hide();

    $("#pesquisa-veiculo").keyup(function() {
        var pesquisa = $(this).val();

        if (pesquisa != '') {
            $("#listagem-veiculos").hide();
            $("#div-resultado-busca-veiculo").show();

            var dados = {
                palavra : pesquisa
            }

            $.post('../_rotinas/buscar-veiculo.php', dados, function(retorna) {
                $("#resultado-busca-veiculo").html(retorna);
            });
        }
            else {
                $("#div-resultado-busca-veiculo").hide();
                $("#listagem-veiculos").show();

                $("#resultado-busca-veiculo").html('');
            }
    });
});