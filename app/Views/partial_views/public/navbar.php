<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <?= $environment; ?>
        <?php if($session->has('user')): ?>
            <span>Bienvenue, <?= $session->user['Username']; ?></span>
        <?php endif; ?>
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><?= $options['site_title']; ?></a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    <?php if(isset($session->user) && $session->user['Role'] == '1'): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>/Panel">Administration</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>