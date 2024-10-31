<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2 class="mt-5">Editar Produto</h2>
    <form action="<?= base_url("produtos/update/{$produto['id']}") ?>" method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= esc($produto['nome']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"><?= esc($produto['descricao']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" class="form-control" id="preco" name="preco" value="<?= esc($produto['preco']) ?>" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="/produtos" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?= $this->endSection() ?>
