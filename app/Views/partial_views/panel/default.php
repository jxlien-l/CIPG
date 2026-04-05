<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombre de galeries</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['number_of_galleries']; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-images fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Nombre de publications</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['number_of_creations']; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-image fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">En construction</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['is_construction_mode'] == 0 ? 'Non' : 'Oui'; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-hard-hat fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">En mode démo</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['is_demo_mode'] == 0 ? 'Non' : 'Oui'; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-laptop-code fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <?php if(count($data['galleries']) > 0): ?>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Galeries</h6>
        </div>
        <div class="card-body">
          <?php foreach($data['galleries'] as $gallery): ?>
            <h4 class="small font-weight-bold"><?= $gallery['gallery']['Title']; ?> ( <?= count($gallery['items']); ?>
            <?php if(count($gallery['items']) > 0): ?>dont mises en avant : <?php
              $nb = 0;
              foreach($gallery['items'] as $item)
              {
                if($item['IsFrontPage'] == '1')
                {
                  $nb++;
                }
              }
              echo $nb; endif; ?>)</h4>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
    <div class="row">
      <div class="col-lg-12 mb-4">
        <a href="<?= base_url(); ?>/Panel/Galleries">
          <div class="card bg-primary text-white shadow">
            <div class="card-body">
              Gérer les galeries
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-6 mb-4">
        <a href="<?= base_url(); ?>/Panel/Contacts">
          <div class="card bg-success text-white shadow">
            <div class="card-body">
               Gérer les contacts
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-6 mb-4">
        <a href="<?= base_url(); ?>/Panel/Options">
          <div class="card bg-info text-white shadow">
            <div class="card-body">
              Gérer le site
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-6 mb-4">
        <a href="<?= base_url(); ?>/Panel/Profile">
          <div class="card bg-warning text-white shadow">
            <div class="card-body">
              Votre profil
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-6 mb-4">
        <a href="<?= base_url(); ?>/Panel/Video">
          <div class="card bg-danger text-white shadow">
            <div class="card-body">
              Vidéo en avant
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>

  </div>
</div>
