<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2 class="mt-5">Lista de Produtos</h2>
    <a href="<?= base_url('produtos/create') ?>" class="btn btn-primary mb-3">Adicionar Novo Produto</a>

    <?php if (!empty($produtos) && is_array($produtos)) : ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto) : ?>
                    <tr>
                        <td><?= esc($produto['id']) ?></td>
                        <td><?= esc($produto['nome']) ?></td>
                        <td><?= esc($produto['descricao']) ?></td>
                        <td>R$ <?= esc($produto['preco']) ?></td>
                        <td>
                            <a href="<?= base_url("produtos/edit/{$produto['id']}") ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="<?= base_url("produtos/delete/{$produto['id']}") ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <!-- Links de paginação -->
        <div class="d-flex justify-content-center">
            <?= $pager->links() ?>
        </div>
    <?php else : ?>
        <p>Nenhum produto encontrado.</p>
    <?php endif ?>
</div>
<?= $this->endSection() ?>

