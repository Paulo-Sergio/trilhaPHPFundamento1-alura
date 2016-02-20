<?php
include './cabecalho.php';
include './conecta.php';
include './banco-categoria.php';
include './banco-produto.php';

$categorias = listaCategorias($conexao);

$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);

$usado = $produto['usado'] ? "checked='checked'" : "";
?>

<h1>Alterar Produto</h1>
<form action="altera-produto.php" method="post">
    <table class="table">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>"/>
        <tr>
            <td>Nome: </td>
            <td><input class="form-control" type="text" name="nome" value="<?= $produto['nome'] ?>"/></td>
        </tr>
        <tr>
            <td>Preço: </td>
            <td><input class="form-control" type="number" name="preco" value="<?= $produto['preco'] ?>"/></td>
        </tr>
        <tr>
            <td>Descrição: </td>
            <td><textarea name="descricao" class="form-control"><?= $produto['descricao'] ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="checkbox" name="usado" <?= $usado ?> value="1"/> Usado
            </td>
        </tr>
        <tr>
            <td>Categoria: </td>
            <td>
                <select name="categoria_id" class="form-control">
                    <?php foreach ($categorias as $categoria): 
                        $essaCategoria = $produto['categoria_id'] == $categoria['id'];
                        $selecao = $essaCategoria ? "selected='selected'" : ""; 
                        ?>
                        <option type="radio" value="<?= $categoria['id'] ?>" <?=$selecao?>>
                            <?= $categoria['nome'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input class="btn btn-primary" type="submit" value="Alterar"/></td>
        </tr>
    </table>
</form>

<?php include './rodape.php'; ?>