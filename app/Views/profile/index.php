<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Perfil do Usuário</h2>

    <!-- Exibição da Foto de Perfil Atual -->
    <?php if (!empty($user['profile_picture'])): ?>
        <img src="/uploads/<?= esc($user['profile_picture']) ?>" alt="Foto de Perfil" class="img-thumbnail mb-3"
            width="150">
    <?php else: ?>
        <p>Sem foto de perfil.</p>
    <?php endif; ?>

    <!-- Formulário para Atualizar a Foto -->
    <form action="<?= base_url('/profile/upload-picture') ?>" method="post" enctype="multipart/form-data" class="mb-4">
        <div class="mb-3">
            <label for="profile_picture" class="form-label">Atualizar Foto de Perfil</label>
            <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Foto</button>
    </form>

    <!-- Formulário de atualização do perfil -->
    <form action="<?= base_url('profile/update') ?>" method="post" class="mb-4">
        <h4>Informações Pessoais</h4>
        <div class="mb-3">
            <label for="username" class="form-label">Nome de Usuário</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= esc($user['username']) ?>"
                required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= esc($user['email']) ?>"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Perfil</button>
    </form>


    <!-- Formulário de atualização de senha -->
    <form action="<?= base_url('profile/update-password') ?>" method="post">
        <h4>Alterar Senha</h4>
        <div class="mb-3">
            <label for="current_password" class="form-label">Senha Atual</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">Nova Senha</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_new_password" class="form-label">Confirme a Nova Senha</label>
            <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Senha</button>
    </form>
</div>
<?= $this->endSection() ?>