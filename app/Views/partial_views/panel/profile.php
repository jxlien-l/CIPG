<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Profil</h1>
<?php if(isset($information)){
  if($information){ ?>
  <div class="alert alert-success" role="alert">
    <?= $information ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php }} ?>
<?php if(isset($error)){ 
  if($error){ ?>
  <div class="alert alert-danger" role="alert">
    <?= $error; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php }} ?>

<?php //print_r($user); ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Nom d'utilisateur</h6>
    </div>
    <form action="<?= base_url();?>/Panel/ProfileUsernameUpdate" method="post">
        <div class="card-body">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Votre nom d'utilisateur</span>
            </div>
            <input type="text" class="form-control" name="inputUsername" id="inputUsername" value="<?= $user['Username']; ?>">
          </div>

          <button type="submit" id="validate" name="validate" value="true" class="btn btn-primary">Valider</button>
        </div>
    </form>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Mot de passe</h6>
    </div>
    <form action="<?= base_url();?>/Panel/ProfilePasswordUpdate" method="post">
        <div class="card-body">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Mot de passe actuel</span>
            </div>
            <input type="text" class="form-control" 
            name="inputActualPwd" id="inputActualPwd"
            value="">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Mot de passe</span>
            </div>
            <input type="text" class="form-control" 
            name="inputPwd" id="inputPwd"
            value="">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Confirmer le mot de passe</span>
            </div>
            <input type="text" class="form-control" 
            name="inputConfirmPwd" id="inputConfirmPwd"
            value="">
          </div>

          <button type="submit" id="validate" name="validate" value="true" class="btn btn-primary">Valider</button>
        </div>
    </form>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Avatar</h6>
    </div>
    <form action="<?= base_url();?>/Panel/ProfilePasswordUpdate" method="post">
        <div class="card-body">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Mot de passe actuel</span>
            </div>
            <input type="text" class="form-control" 
            name="inputActualPwd" id="inputActualPwd"
            value="">
          </div>

          <button type="submit" id="validate" name="validate" value="true" class="btn btn-primary">Valider</button>
        </div>
    </form>
  </div>

</div>