<?php
    require_once("funcoes.php");
    require_once(DBAPI);

    incluiCabecalho("Stock Planner - Cadastro de produtos", "cadastro-produto");
?>

<div class="container">
    <!-- Criar as linhas e colunas de acordo com necessidade -->
    <select class="custom-select custom-select-sm">
        <option value="20">20%</option>
        <option value="50">50%</option>
        <option value="80">80%</option>
    </select>
    <button type="button" class="btn btn-secondary" id="confirma_porcentagem">Confirmar</button>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Identificação</th>
                <th>CATMAT</th>
                <th>Categoria</th>
                <th>Posição</th>
                <th>Estoque Ideal</th>
                <th>Quantidade</th>
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
            echo "<tr>";
            echo "<td>" . $produto['id'] . "</td>";
            echo "<td>" . $produto['nome'] . "</td>";
            echo "<td>" . $produto['descricao'] . "</td>";
            echo "<td>" . $produto['identificacao'] . "</td>";
            echo "<td>" . $produto['catmat'] . "</td>";
            echo "<td>" . $produto['categoria'] . "</td>";
            echo "<td>" . $produto['posicao'] . "</td>";
            echo "<td>" . $produto['estoque_ideal'] . "</td>";
            echo "<td>" . $produto['quantidade'] . "</td>";
            echo "</tr>";
        }
    ?>

        </tbody>
    </table>
</div>

<?php
    require_once(FOOTER_TEMPLATE);
?>
