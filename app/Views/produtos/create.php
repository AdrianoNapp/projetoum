<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2 class="mt-5">Adicionar Novo Produto</h2>
    <form action="<?= base_url('produtos/store') ?>" method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" class="form-control" id="preco" name="preco" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/produtos" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?= $this->endSection() ?>
