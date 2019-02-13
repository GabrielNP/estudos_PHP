<?php 
    
    include("conecta.php");
    include('produtoController.php');
    
    $nome   = $_GET["nome"];
    $preco  = $_GET["preco"];

    if (insereProduto($conexao, $nome, $preco)) { 
        header("Location: produto-formulario.php?adicionado=true");
    } else { 
        $msg = mysqli_error($conexao); 
    ?>
        <p class="text-danger">O produto <?= $nome; ?> não foi adicionado! </p>
        <?= $msg?>
    <?php
        }
    ?>      
    
    <?php
        /*  FECHA A CONEXÃO -> não precisava fechar, pois o PHP atualmente 
            *  fecha automaticamente após finalizar a leitura deste arquivo.
            *   
            *  mysqli_close($conexao);*/ 
    ?>
        
<?php 
    include("cabecalho.php");
    include("rodape.php"); 
?>

