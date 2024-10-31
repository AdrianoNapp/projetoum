<h2>Redefinição de Senha</h2>
<form action="<?= base_url('reset-password') ?><?= $token ?>" method="post">
    <label for="password">Nova senha:</label>
    <input type="password" name="password" required>
    <label for="confirm_password">Confirme a nova senha:</label>
    <input type="password" name="confirm_password" required>
    <button type="submit">Redefinir senha</button>
</form>

