<?= $this->extend('layout/templateLogin'); ?>

<?= $this->section('content'); ?>
<section class="bg-light">
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
      <div class="col-md-6">
        <a href="#" class="d-flex align-items-center mb-4 text-dark text-decoration-none bg-primary p-3 rounded">
          <span class="fs-4 fw-semibold text-white">E-commerce</span>
        </a>
        <div class="bg-white rounded-lg shadow-sm p-4">
          <h1 class="text-xl fw-bold mb-4 text-dark">
            Log in to your account
          </h1>
          <form action="<?= base_url('login_action') ?>" method="POST">
            <?php if (session()->getFlashdata('error')) { ?>
              <div class="alert alert-danger">
                <?php echo session()->getFlashdata() ?>
              <?php } ?>
              <div class="mb-3">
                <label for="inputUsername" class="form-label">Username</label>
                <input type="text" name="user_username" id="inputUsername" class="form-control" placeholder="Username" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-primary" value="LOGIN">Log in</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


<?= $this->endSection(); ?>