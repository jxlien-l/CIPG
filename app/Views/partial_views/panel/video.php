<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Vidéo</h1>
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
    <h6 class="m-0 font-weight-bold text-primary">Ajouter, supprimer, ou modifier la vidéo de front page</h6>
  </div>
  <form action="<?= base_url();?>/Panel/VideoUpdate" method="post">
    <div class="card-body">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Youtube</span>
          </div>
          <input type="text" class="form-control" name="youtubevideo_url" id="youtubevideo_url"
          <?php if(isset($video)): ?>
          value="<?= 'https://www.youtube.com/watch?v='.$video['Value']; ?>" 
          <?php else: ?>
          placeholder="<?= 'Il n\'y a pas de vidéo pour le moment.'; ?>" 
          <?php endif; ?>>
        </div>
        <button type="submit" id="validate" name="validate" value="true" class="btn btn-primary">Valider</button>
        <button type="submit" id="delete" name="delete" value="true" class="btn btn-danger">Supprimer</button>
    </div>
  </form>
</div>
</div>