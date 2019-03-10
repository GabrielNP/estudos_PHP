<?php
    include("cabecalho.php");
    include("conecta.php"); 
    include("produtoController.php");

   $nome   = $_GET["nome"];
    if(array_key_exists("removido", $_GET) && $_GET["removido"]=="true") {
        echo '<p class="text-success">Produto removido!</p>';
    }
?>

<table class="table table-striped table-bordered">

    <?php
        $produtos = listaProdutos($conexao);
        foreach ($produtos as $produto) {
    ?>

    <tr>
        <td><?=$produto['nome'];?></td>
        <td><?=$produto['preco'];?></td>
        <td><?= substr($produto['descricao'], 0, 40)?></td>
        <td><?=$usado ?></td>
        <td><?=$produto['categoria_nome'];?></td>
        <td>
            <form action="remove-produto.php" method="post">
                <input type="hidden" name="id" value="<?=$produto['id']?>">

                <button class="btn btn-danger">remover</button>
            </form>
        </td>
    </tr>

    <?php } // endforeach
    if (empty($produtos)) echo '<p class="text-danger">Não há nada no estoque =(</p>'
    ?>
</table>

<?php include("rodape.php"); ?>