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
    <header class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase"><?= $options['site_title']; ?></h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5"><?= $options['site_tagline']; ?></h2>
                <a class="btn btn-primary js-scroll-trigger mb-2" href="#video">Visiter</a>
            </div>
        </div>
    </header>
    <?php if(isset($options['youtubevideo_url'])): ?>
    <section class="video-section" id="video">
            <div class="row">
                <iframe 
                    src="https://www.youtube.com/embed/<?= $options['youtubevideo_url']; ?>"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    class="m-auto col-6"
                    height="500"
                ></iframe>
            </div>
    </section>
    <?php endif; ?>
    <section class="projects-section bg-light" id="about">
        <div class="container">
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-4 col-lg-5"><img class="img-fluid mb-3 mb-lg-0" src="<?= base_url(); ?>/images/pdp_Final.jpg" alt="" /></div> 
                <div class="col-xl-8 col-lg-7">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Biographie</h4>
                        <p class="text-black-50 mb-0">
                            Jeune <b>Infographiste 3D et Photographe / vidéaste</b><br />
                            <b>2 ans d’étude à Bellecour école à Lyon 3D cinema art 2017/2019</b><br />
                            <b>2 ans de photographie 2017/2019</b><br />
                            
                            Je travaille actuellement en <b>freelance</b> depuis 1 an <br />
                            L’infographie et la photographie sont bien plus qu’une passion à mes yeux ce sont des moyens de s’exprimer différemment, et ainsi nous ouvrir les yeux et l’esprit afin de voir les choses sous un autre angle.<br />
                            J’ai commencé ces activités par amour de la création, mon travail étant de plus en plus apprécié, j’ai décidé de me lancer dans l’aventure !

                        </p>
                        <a href="<?= base_url(); ?>/uploads/CV_GODARD_Maxime_2k20.pdf" class="cv">Mon CV</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                <div class="col-lg-6"><img class="img-fluid" src="<?= base_url(); ?>/images/IMG_20200618_223139_685.jpg" alt="" /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4>Mes domaines de travail</h4>
                                <p class="mb-0 text-white-50">
                                    <ul>
                                        <li class="domain-title">Communication</li>
                                        <ul>
                                            <li>Création d’une campagne publicitaire adaptée à votre projet, associée à une identité graphique qui vous ressemble</li>
                                        </ul>

                                        <li class="domain-title">Infographie 3D</li>
                                        <ul>
                                            <li>Création d’image de synthèse</li>
                                            <li>Modeling / retopology / sculpt</li>
                                            <li>Simulation liquide, fumée</li>
                                            <li>VFX et compositing</li>
                                            <li>Texturing / UV</li>
                                            <li>Rig creation / controle</li>
                                        </ul>

                                        <li class="domain-title">Photographie / vidéo</li>
                                        <ul>
                                            <li>Shooting photo tout type</li>
                                            <li>Création de vidéos tout type</li>
                                        </ul>
                                    </ul>
                                <hr class="d-none d-lg-block mb-0 ml-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center no-gutters">
                <div class="col-lg-6"><img class="img-fluid" src="<?= base_url(); ?>/images/Siege_04F.jpg" alt="" /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4>Mes compétences</h4>
                                <p class="mb-0 text-white-50">
                                    <ul>
                                        <li>After effect (expérimenté)</li>
                                        <li>Maya (expérimenté)</li>
                                        <li>Photoshop (expérimenté)</li>
                                        <li>Zbrush (débutant)</li>
                                        <li>Marvelous Designer (débutant)</li>
                                        <li>Nuke (débutant)</li>
                                    </ul>
                                </p>
                                <hr class="d-none d-lg-block mb-0 mr-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>