<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="<?= $options['site_description']; ?>" />
    <meta name="author" content="" />
    <title><?= $options['site_title']; ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/template/assets/img/favicon.ico" />
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
    <!-- viewer -->
    <script src="<?= base_url(); ?>/stl_viewer/stl_viewer.min.js"></script>
    <!-- style -->
    <link href="<?= base_url(); ?>/template/css/styles.css" rel="stylesheet" />
    <?php if(isset($options['site_background_url'])): ?>
    <style>
    .masthead{
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 75%, #000000 100%), url('<?= $options['site_background_url']; ?>');
    }
    </style>
    <?php endif; ?>
</head>
<body id="page-top">

    <?php
        foreach ($views as $view)
        {
            if(isset($view[1])) // si la vue a des données
            {
                echo view($view[0], $view[1]);
            }
            else
            {
                echo view($view[0]);
            }
        }
    ?>
</body>
    <!-- jquery first -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <!-- bootstrap after -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <!-- template bootstrap js end -->
    <script src="<?= base_url(); ?>/template/js/scripts.js"></script>
</html>