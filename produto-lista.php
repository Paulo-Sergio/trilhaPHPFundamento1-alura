<?php
include './cabecalho.php';
include './conecta.php';
include './banco-produto.php';
include './banco-categoria.php';
?>

<?php
//$removido = isset($_GET['removido']);
if (array_key_exists("removido", $_GET) && $_GET['removido'] == true):
    ?>
    <p class="alert-success">Produto removido com sucesso!</p>
<?php endif; ?>

<table class="table table-striped table-bordered">

    <?php
    $produtos = listaProduto($conexao);
    foreach ($produtos as $produto) :
        ?>
        <tr>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td><?= substr($produto['descricao'], 0, 40) ?></td>
            <td><?= $produto['categoria_nome']?></td>
            <td>
                <a href="produto-altera-formulario.php?id=<?=$produto['id']?>" class="btn btn-primary">
                    Alterar
                </a>
            </td>
            <td>
                <form action="remove-produto.php" method="post">
                    <input type="hidden" name="id" value="<?= $produto['id']?>"/>
                    <button class="btn btn-danger">Remover</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<?php include './rodape.php'; ?>