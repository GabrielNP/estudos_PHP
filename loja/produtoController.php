<?php
    function insereProduto ($conexao, $nome, $preco) {
            $query = "insert into loja.produtos (nome, preco) values ('{$nome}', {$preco})";
            return mysqli_query($conexao, $query);
            /* INSERT EM CASO DE CONEXÃO VIA PDO
            * $query = $myPDO->query("insert into loja.produtos (nome, preco) values ('{$nome}', {$preco})");*/
    }

    function listaProdutos($conexao) {
            $produtos = array(); // ou $produtos = []; em versões mais recentes do PHP
            $query = mysqli_query($conexao, "select * from loja.produtos");
            // CRIA UM ARRAY COM OS DADOS DENTRO DE UM LOOP
            while ($produto = mysqli_fetch_assoc($query)) {
                array_push($produtos, $produto);
            }
            return $produtos;
    }

function removeProduto($conexao, $id) {
    $query = "delete from loja.produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}