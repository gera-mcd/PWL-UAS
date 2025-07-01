<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1" style="padding-top: 0;">
  <h4 class="fw-bold py-3 mb-4">Account Settings</h4>

  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img
              src="<?= base_url('sneat-1.0.0/assets/img/avatars/foto-profil.jpg') ?>"
              alt="user-avatar"
              class="d-block rounded"
              height="100"
              width="100"
              id="uploadedAvatar" />

            <div class="button-wrapper">
              <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input
                  type="file"
                  id="upload"
                  class="account-file-input"
                  hidden
                  accept="image/png, image/jpeg" />
              </label>

              <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Reset</span>
              </button>

              <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
            </div>
          </div>
        </div>
        <!-- /Account -->

        <hr class="my-0" />
        <div class="card-body">
          <form id="formAccountSettings" method="POST" onsubmit="return false">
            <div class="row">
            <!-- First Name -->
<div class="mb-3">
  <label class="form-label" for="Username">Username</label>
  <input type="text" class="form-control" id="Username" name="Username"
         value="<?= esc($user['username']) ?>" readonly />
</div>

<!-- Email -->
<div class="mb-3">
  <label class="form-label" for="email">E-mail</label>
  <input type="email" class="form-control" id="email" name="email"
         value="<?= esc($user['email']) ?>" readonly />
</div>

        
              <div class="mb-3 col-md-6">
                <label class="form-label" for="phoneNumber">Phone Number</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text">US (+1)</span>
                  <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" value="202 555 0111" />
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="Address" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="state" class="form-label">State</label>
                <input class="form-control" type="text" id="state" name="state" value="California" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="zipCode" class="form-label">Zip Code</label>
                <input type="text" class="form-control" id="zipCode" name="zipCode" value="231465" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="country" class="form-label">Country</label>
                <select id="country" class="select2 form-select">
                  <option value="">Select</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="US">United States</option>
                  <option value="India">India</option>
                  <option value="UK">UK</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="language" class="form-label">Language</label>
                <select id="language" class="select2 form-select">
                  <option value="">Select Language</option>
                  <option value="en">English</option>
                  <option value="id">Indonesian</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="timezone" class="form-label">Timezone</label>
                <select id="timezone" class="select2 form-select">
                  <option value="">Select Timezone</option>
                  <option value="Asia/Jakarta">Asia/Jakarta</option>
                  <option value="America/New_York">America/New York</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="currency" class="form-label">Currency</label>
                <select id="currency" class="select2 form-select">
                  <option value="">Select Currency</option>
                  <option value="USD">USD</option>
                  <option value="IDR">IDR</option>
                </select>
              </div>
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
              <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
          </form>
        </div>
        <!-- /form -->
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
