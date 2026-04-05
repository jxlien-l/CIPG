<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url(); ?>/template-a/css/sb-admin-2.css">
    <title>Se connecter</title>
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12 mx-auto">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Hello !</h1>
                  </div>
                <form class="user" action="<?= base_url(); ?>/Home/Login"> 
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="inputUsername" name="inputUsername" placeholder="Pseudonyme">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="inputPassword" name="inputPassword" placeholder="Mot de passe">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Se connecter
                    </button>
                </form>
                  <!-- <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
            <!-- empl card -->
          </div>
        </div>
        <?php if(isset($error)): ?>
        <div class="card bg-danger text-white shadow">
          <div class="card-body">
            <?= $error; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <script src="<?= base_url(); ?>/template-a/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/template-a/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/template-a/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url(); ?>/template-a/js/sb-admin-2.min.js"></script>
</body>
</html>