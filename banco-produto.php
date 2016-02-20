<?php

function insereProduto($nome, $preco, $descricao, $categoria_id, $usado, $conexao) {
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
    $resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function listaProduto($conexao) {
    $produtos = array();
    $query = 'select p.*, c.nome as categoria_nome '
            . 'from produtos as p join categorias as c ON p.categoria_id = c.id';
    $resultado = mysqli_query($conexao, $query);

    while ($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }

    return $produtos;
}

function removeProduto($conexao, $id){
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id){
    $query = "select * from produtos where id = '{$id}'";
    $resultado = mysqli_query($conexao, $query);
    $produto = mysqli_fetch_assoc($resultado);
    return $produto;
}

function alteraProduto($id, $nome, $preco, $descricao, $categoria_id, $usado, $conexao){
    $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria_id}, usado = {$usado} where id = '{$id}'";
    return mysqli_query($conexao, $query);
}