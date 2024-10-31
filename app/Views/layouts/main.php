<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Minha Aplicação' ?></title>
    <!-- CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>">Minha Aplicação</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (!session()->get('isLoggedIn')): ?>
                        
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Início</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('about') ?>" ">Sobre</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('contact') ?>">Contato</a></li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('register') ?>">Registro</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <span class="nav-link">Bem-vindo, <?= esc(session()->get('username')) ?>!</span>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('profile') ?>">Perfil</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('logout') ?>/">Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container mt-4">
         <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        
        <?= $this->renderSection('content') ?>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>