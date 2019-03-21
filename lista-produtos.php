<?php
    require_once("funcoes.php");
    require_once(DBAPI);

    incluiCabecalho("Stock Planner - Cadastro de produtos", "lista-produtos");
?>

<div class="container">
    <!--<select class="custom-select custom-select-sm">
        <option value="20">20%</option>
        <option value="50">50%</option>
        <option value="80">80%</option>
    </select>
    <button type="button" class="btn btn-secondary" id="confirma_porcentagem">Confirmar</button>-->
    <div class="table-responsive-md">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Identificação</th>
                    <th>CATMAT</th>
                    <th>Categoria</th>
                    <th>Posição</th>
                    <th>Estoque Ideal</th>
                    <th>Quantidade</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

        <?php
            $produtos = getTodosProdutos();

            for ($i=0; $i < sizeof($produtos); $i++) {
                $produtos[$i]['porcentagem'] = floatval($produtos[$i]['quantidade']/$produtos[$i]['estoque_ideal']);
            }



            for($i = 0; $i < sizeof($produtos); $i++)
            {
                $menorPorcentagem = 100000;
                for ($j = $i; $j < sizeof($produtos) ; $j++) {
                    if($produtos[$j]['porcentagem'] < $menorPorcentagem){
                        $menorPorcentagem = $produtos[$j]['porcentagem'];
                        $posicao_menor_porcentagem = $j;
                    }
                }
                $aux =  $produtos[$posicao_menor_porcentagem];
                $produtos[$posicao_menor_porcentagem] = $produtos[$i];
                $produtos[$i] = $aux;
            }

            foreach ($produtos as $produto) {
                $rgb = pickColor($produto['porcentagem']);
                echo "<tr>";
                echo "<td style = 'background:rgb(" . $rgb[0] . ", " . $rgb[1] . ", ".$rgb[2].");'></td>";
                echo "<td>" . $produto['nome'] . "</td>";
                echo "<td>" . $produto['identificacao'] . "</td>";
                echo "<td>" . $produto['catmat'] . "</td>";
                echo "<td>" . $produto['categoria'] . "</td>";
                echo "<td>" . $produto['posicao'] . "</td>";
                echo "<td>" . $produto['estoque_ideal'] . "</td>";
                echo "<td>" . $produto['quantidade'] . "</td>";
                echo "<td><a class='delete-icon' href='excluir-produto.php?id=" . $produto['id'] . "'><i class='material-icons' id='delete-" . $produto['id'] . "'>delete_outline</i></a></td>";
                echo "<td><a href='editar-produto.php?id=" . $produto['id'] . "'>
                <i class='material-icons'>edit</i></a></td>";
                echo "</tr>";
            }
        ?>

            </tbody>
        </table>
    </div>
</div>

<?php
    require_once(FOOTER_TEMPLATE);
?>
