<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url(); ?>/template-a/css/sb-admin-2.css">
    <title>Installation du site</title>
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
                    <h1 class="h4 text-gray-900 mb-4">Installation du site</h1>
                  </div>
                <form class="user" action="<?= base_url(); ?>/Install/Submit">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputDb">BDD</span>
                    </div>
                    <input type="text" class="form-control" id="inputDb" name="inputDb">
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputDbUser">Utilisateur BDD</span>
                    </div>
                    <input type="text" class="form-control" id="inputDbUser" name="inputDbUser">
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputDbUserPassword">Mot de passe BDD</span>
                    </div>
                    <input type="text" class="form-control" id="inputDbUserPassword" name="inputDbUserPassword">
                  </div>

                  Compte administrateur
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="inputUsername" name="inputUsername" placeholder="Pseudonyme">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col">
                        <input type="password" class="form-control form-control-user" id="inputPassword" name="inputPassword" placeholder="Mot de passe">
                      </div>
                      <div class="col">
                        <input type="password" class="form-control form-control-user" id="inputPassword2" name="inputPassword2" placeholder="Confirmation">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Valider
                  </button>
                </form>
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