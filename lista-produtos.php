<?php
    require_once("funcoes.php");
    require_once(DBAPI);

    incluiCabecalho("Stock Planner - Cadastro de produtos", "cadastro-produto");
?>

<div class="container">
    <!-- Criar as linhas e colunas de acordo com necessidade -->

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
