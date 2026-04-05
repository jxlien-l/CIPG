<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Options</h1>
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
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Gérer les options</h6>
  </div>
  <form action="<?= base_url();?>/Panel/OptionsUpdate" method="post">
      <div class="card-body">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Nom du site</span>
          </div>
          <input type="text" class="form-control" 
          name="inputTitle" id="inputTitle"
          value="<?= $options['site_title']; ?>">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Description du site</span>
          </div>
          <input type="text" class="form-control" 
          name="inputDescription" id="inputDescription"
          value="<?= $options['site_description']; ?>">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Slogan</span>
          </div>
          <textarea class="form-control" aria-label="With textarea"
          name="inputTagline" id="inputTagline">
            <?= $options['site_tagline']; ?>
          </textarea>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Mode construction</span>
          </div>
          <select id="inputConstruction" name="inputConstruction" class="form-control">
                <option <?php if($options['construction_mode'] == "0"): ?>selected<?php endif; ?>>Non</option>
                <option <?php if($options['construction_mode'] == "1"): ?>selected<?php endif; ?>>Oui</option>
          </select>
        </div>

        <button type="submit" id="validate" name="validate" value="true" class="btn btn-primary">Valider</button>
      </div>
  </form>
</div>
</div>