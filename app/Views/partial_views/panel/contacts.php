<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Contacts</h1>
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
        <h6 class="m-0 font-weight-bold text-primary">Ajouter un moyen de contact</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Type</th>
                <th>Lien, adresse, numéro..</th>
                <th>Est remplacé par*</th>
                <th>Note*</th>
              </tr>
            </thead>
            <tbody>
              <form action="<?= base_url(); ?>/Panel/ContactCreate" method="post">
                <tr>
                  <td>
                    <select id="inputState" name="type" class="form-control">
                      <option selected value="1">LinkedIn</option>
                      <option value="2">Twitter</option>
                      <option value="3">Facebook</option>
                      <option value="4">Email</option>
                      <option value="5">Téléphone</option>
                      <option value="6">Snapchat</option>
                      <option value="7">ArtStation</option>
                      <option value="8">Instagram</option>
                    </select>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="value" id="value" required>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="alias" id="alias">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="note" id="note">
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
      <h6 class="m-0 font-weight-bold text-primary">Édition des contacts</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Type</th>
              <th>Contact</th>
              <th>Est remplacé par</th>
              <th>Note</th>
            </tr>
          </thead>
          <tbody>
            <form action="<?= base_url(); ?>/Panel/ContactUpdate" method="post">
              <?php if(empty($contacts)){ echo '<td colspan="4"> Vous n\'avez pas encore créé de contact.'; } ?>
              <?php foreach($contacts as $contact): ?>
              <tr>
                <td>
                  <select id="inputState" name="type-<?= $contact['Id']; ?>" class="form-control">
                    <option value="1" <?php if($contact['Type'] == 1){ echo 'selected'; } ?>>
                      <i class="fab fa-linkedin-in"></i> LinkedIn
                    </option>
                    <option value="2" <?php if($contact['Type'] == 2){ echo 'selected'; } ?>>
                      <i class="fab fa-twitter"></i> Twitter
                    </option>
                    <option value="3" <?php if($contact['Type'] == 3){ echo 'selected'; } ?>>
                      <i class="fab fa-facebook-f"></i> Facebook
                    </option>
                    <option value="4" <?php if($contact['Type'] == 4){ echo 'selected'; } ?>>
                      <i class="far fa-envelope"></i> Email
                    </option>
                    <option value="5" <?php if($contact['Type'] == 5){ echo 'selected'; } ?>>
                      <i class="fas fa-phone-alt"></i> Téléphone
                    </option>
                    <option value="6" <?php if($contact['Type'] == 6){ echo 'selected'; } ?>>
                      <i class="fab fa-snapchat-ghost"></i> Snapchat
                    </option>
                    <option value="7" <?php if($contact['Type'] == 7){ echo 'selected'; } ?>>
                      <i class="fab fa-artstation"></i> ArtStation
                    </option>
                    <option value="8" <?php if($contact['Type'] == 8){ echo 'selected'; } ?>>
                      <i class="fab fa-instagram"></i> Instagram
                    </option>
                  </select>
                </td>
                <td>
                  <input type="text" class="form-control" name="value-<?= $contact['Id']; ?>" id="value" value="<?= $contact['Value']; ?>">
                </td>
                <td>
                  <input type="text" class="form-control" name="alias-<?= $contact['Id']; ?>" id="alias" 
                  <?php if(isset($contact['Alias'])): ?>
                  value="<?= $contact['Alias']; ?>"
                  <?php else: ?>
                  placeholder="Ajoutez un texte de remplacement"
                  <?php endif; ?>>
                </td>
                <td>
                  <input type="text" class="form-control" name="note-<?= $contact['Id']; ?>" id="note" 
                  <?php if(isset($contact['Note'])): ?>
                  value="<?= $contact['Note']; ?>"
                  <?php else: ?>
                  placeholder="Ajoutez une précision"
                  <?php endif; ?>>
                </td>
                <td>
                  <button type="submit" id="validate" name="validate" value="<?= $contact['Id']; ?>" class="btn btn-primary">
                    <i class="fas fa-check"></i>
                  </button>
                  <button type="submit" id="delete" name="delete" value="<?= $contact['Id']; ?>" class="btn btn-danger">
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
</div>