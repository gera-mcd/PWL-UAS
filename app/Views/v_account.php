<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
          <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
        </li>
      </ul>
      <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img
              src="<?= base_url('sneat-1.0.0/assets/img/avatars/8.jpg') ?>"
              alt="user-avatar"
              class="d-block rounded"
              height="100"
              width="100"
              id="uploadedAvatar"
            />
            <div class="button-wrapper">
              <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input
                  type="file"
                  id="upload"
                  class="account-file-input"
                  hidden
                  accept="image/png, image/jpeg"
                />
              </label>
              <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Reset</span>
              </button>

              <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
            </div>
          </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
          <form id="formAccountSettings" method="POST" action="<?= base_url('account/update') ?>">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="username" class="form-label">Username</label>
                <input
                  class="form-control"
                  type="text"
                  id="username"
                  name="username"
                  value="<?= esc($user['username']) ?>"
                  readonly
                />
              </div>
              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input
                  class="form-control"
                  type="email"
                  id="email"
                  name="email"
                  value="<?= esc($user['email'] ?? '') ?>"
                  placeholder="john.doe@example.com"
                />
              </div>
              <div class="mb-3 col-md-6">
                <label for="role" class="form-label">Role</label>
                <input
                  class="form-control"
                  type="text"
                  id="role"
                  name="role"
                  value="<?= esc($user['role']) ?>"
                  readonly
                />
              </div>
              <div class="mb-3 col-md-6">
                <label for="created_at" class="form-label">Created At</label>
                <input
                  class="form-control"
                  type="text"
                  id="created_at"
                  name="created_at"
                  value="<?= esc($user['created_at']) ?>"
                  readonly
                />
              </div>
              <div class="mb-3 col-md-6">
                <label for="updated_at" class="form-label">Updated At</label>
                <input
                  class="form-control"
                  type="text"
                  id="updated_at"
                  name="updated_at"
                  value="<?= esc($user['updated_at']) ?>"
                  readonly
                />
              </div>
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
              <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
          </form>
        </div>
        <!-- /Account -->
      </div>
      
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
