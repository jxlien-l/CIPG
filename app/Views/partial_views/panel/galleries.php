<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Galeries</h1>

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
        <h6 class="m-0 font-weight-bold text-primary">Créer une galerie</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Titre</th>
                <th>Description *</th>
              </tr>
            </thead>
            <tbody>
              <form action="<?= base_url(); ?>/Panel/GalleryCreate" method="post">
                <tr>
                  <td>
                    <input type="text" class="form-control" name="title" id="title" required>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="description" id="description">
                  </td>
                  <td>
                    <button type="submit" id="validate" name="validate" value="true" class="btn btn-primary">
                      <i class="fas fa-plus"></i>
                    </button>
                  </td>
                </tr>
              </form>
            </tbody>
          </table>
          * optionnel
        </div>
      </div>
  </div>


  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Gérer les galeries</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Description</th>
              <th>Photos</th>
              <th>Mises en avant</th>
            </tr>
          </thead>
          <tbody>
            <form action="<?= base_url(); ?>/Panel/GalleryUpdate" method="post">
            <?php foreach($galleries as $gallery): ?>
            <tr>
              <td>
                <input type="text" class="form-control" name="title" id="title" value="<?= $gallery['gallery']['Title']; ?>">
              </td>
              <td>
                <input type="text" class="form-control" name="description" id="description" value="<?= $gallery['gallery']['Description']; ?>">
              </td>
              <td>
                <?= count($gallery['items']); ?>
              </td>
              <td><?php
              $nb = 0;
              foreach($gallery['items'] as $item)
              {
                if($item['IsFrontPage'] == '1')
                {
                  $nb++;
                }
              }
              echo $nb; ?></td>
              <td>
                <input type="hidden" name="id_gallery" value="<?= $gallery['gallery']['Id']; ?>">
                <button type="submit" class="btn btn-primary" name="edit">
                  <i class="fas fa-check"></i>
                </button>
                <a href="<?php echo base_url().'/Panel/GalleryAlbum/'.$gallery['gallery']['Id']; ?>">
                <button type="button" class="btn btn-warning" name="album" value="<?= $gallery['gallery']['Id']; ?>">
                  <i class="far fa-images"></i>
                </button>
                </a>
                <button type="submit" class="btn btn-danger" name="delete" style="float:right;">
                  <i class="far fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <?php endforeach; ?>
            </form>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <hr>

  <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Créer un tag</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Galerie</th>
                <th>Nom</th>
              </tr>
            </thead>
            <tbody>
              <form action="<?= base_url(); ?>/Panel/TagCreate" method="post">
                <tr>
                  <td>
                    <select name="gallery" id="gallery" class="form-control" required>
                    <?php foreach($galleries as $gallery): ?>
                      <option value="<?= $gallery['gallery']['Id']; ?>"><?= $gallery['gallery']['Title']; ?></option>
                    <?php endforeach; ?>
                    </select>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="tag" id="tag" required>
                  </td>
                  <td>
                    <button type="submit" id="validate" name="validate" value="true" class="btn btn-primary">
                      <i class="fas fa-plus"></i>
                    </button>
                  </td>
                </tr>
              </form>
            </tbody>
          </table>
        </div>
      </div>
  </div>

  <?php
  $is_tag = false;
  foreach($galleries as $gallery)
  {
    if(!empty($gallery['tags']))
    {
      $is_tag = true;
    }
  } 
  if($is_tag): ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Supprimer un tag</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Galerie</th>
              <th>Tag</th>
            </tr>
          </thead>
          <tbody>
            
            <?php foreach($galleries as $gallery):
              if(!empty($gallery['tags'])): ?>
              <form action="<?= base_url(); ?>/Panel/TagDelete" method="post">
              <tr>
                <td>
                    <input type="text" class="form-control"
                    name="gallery-<?= $gallery['gallery']['Id']; ?>" 
                    id="gallery-<?= $gallery['gallery']['Id']; ?>"
                    value="<?= $gallery['gallery']['Title']; ?>" readonly>
                </td>
                <td>
                  <select name="tag" id="tag" class="form-control" required>
                    <?php foreach($gallery['tags'] as $tag):
                      if($tag['IdGallery'] == $gallery['gallery']['Id']): ?>
                      <option value="<?= $tag['Id']; ?>"><?= $tag['Name']; ?></option>
                    <?php endif; endforeach; ?>
                  </select>
                </td>
                <td>
                  <button type="submit" class="btn btn-danger" name="delete">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
              </form>
            <?php endif;
              endforeach; ?>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php endif; ?>
</div>