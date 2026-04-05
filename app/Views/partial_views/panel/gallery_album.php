<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Galerie</h1>

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
      <h6 class="m-0 font-weight-bold text-primary">Ajouter une image</h6>
    </div>
    <div class="card-body">
      <form action="<?= base_url(); ?>/Panel/GalleryAlbumAdd" method="post" enctype="multipart/form-data">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Photo</th>
              <?php if(!empty($gallery['tags'])): ?>
              <th>Est en avant</th>
              <?php endif; ?>
              <th>Tags</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="custom-file">
                  <input type="file" name="file" id="" class="form-control">
                  <!-- <input type="file" class="custom-file-input" id="file" name="file"> -->
                  <!-- <label class="custom-file-label" for="file">Choisissez un fichier</label> -->
                </div>
              </td>
              <td>
                <select name="is_front_page" id="is_front_page" class="form-control">
                  <option value="1" selected>Oui</option>
                  <option value="0">Non</option>
                </select>
              </td>
              <?php if(!empty($gallery['tags'])): ?>
              <td>
                <?php foreach($gallery['tags'] as $tag): ?>
                <input type="checkbox" name="" id="<?= $tag['Id'] ?>" value="<?= $tag['Name'] ?>" class="form-control">
                <label for="<?= $tag['Id'] ?>"><?= $tag['Name'] ?></label>
              <?php endforeach; ?>
              </td>
              <?php endif; ?>
              <td>
                <input type="hidden" name="gallery_id" value="<?= $gallery['gallery']['Id']; ?>">
                <button type="submit" id="validate" name="validate" value="true" class="btn btn-primary">
                  <i class="fas fa-plus"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      </form>
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Gérer l'album</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Photo</th>
              <th>Ajoutée</th>
              <th>Est en avant</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if(!empty($gallery['items'])):
              foreach($gallery['items'] as $item): ?>
              <form action="<?= base_url(); ?>/Panel/GalleryAlbumUpdate" method="post">
              <tr>
                <td>
                  <img src="<?= $item['Url']; ?>" width="150px" height="100px" />
                </td>
                <td>
                  <?= $item['DateAdded']; ?>
                </td>
                <td>
                  <select name="is_front_page" id="is_front_page" class="form-control">
                    <option value="1" <?php $item['IsFrontPage'] ?: 'selected'; ?>>Oui</option>
                    <option value="0" <?php if($item['IsFrontPage'] == false){ echo 'selected'; } ?>>Non</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="id_gallery" value="<?= $item['IdGallery']; ?>">
                  <input type="hidden" name="url" value="<?= $item['Url']; ?>">
                  <button type="submit" class="btn btn-primary" name="edit" value="<?= $item['Id']; ?>">
                    <i class="fas fa-check"></i>
                  </button>
                  <button type="submit" class="btn btn-danger" name="delete" value="<?= $item['Id']; ?>">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
              </form>
            <?php endforeach;
            else: ?>
            <tr>
              <td>Il n'y a pas d'image dans la galerie.</td>
            </tr>
            <?php endif;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>