<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ecommerce Service</title>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel='stylesheet' href='/css/style.css' />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>


<body>
  <nav class="navbar navbar-expand-lg bg-primary shadow-lg" data-bs-theme="light">
    <div class="container">
      <a class="navbar-brand fw-bold text-white" href="#">E-commerce</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" data-bs-theme="dark">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo base_url('/orderHistory') ?>">History Pemesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo base_url('/logout') ?>">Logout</a>
          </li>
        </ul>
        <span class="navbar-text me-3 text-white" style="font-size: 1.2rem;">
          Hi, <span class="text-white fw-semibold"><?php echo session()->get('username'); ?></span> !
        </span>
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle me-3" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-theme="light">
            <img src="/img/bell.svg" alt="bell" style="width: 12px;">
          </button>

          <ul class="dropdown-menu p-0 dropdown-menu-end" style="max-height: 20rem; width: 28rem; overflow-y: auto;">
            <?php if (!empty($notifikasi)) : ?>
              <ul class="list-group">
                <?php foreach ($notifikasi as $p) : ?>
                  <li class="list-group-item d-flex justify-content-between">
                    <p>Pesanan dengan id <?= $p['id_pesanan']; ?> sudah <?= $p['status_pengiriman']; ?></p>
                    <?php
                    $datetimeString = $p['created_at'];

                    // Buat objek DateTime dari string datetime
                    $datetime = new DateTime($datetimeString, new DateTimeZone('UTC'));

                    // Atur zona waktu ke GMT+7
                    $datetime->setTimezone(new DateTimeZone('Asia/Jakarta'));

                    // Format waktu dalam format "hh:mm"
                    $jamMenit = $datetime->format("H:i");
                    ?>

                    <p class="text" style="width: 10%; text-align: end; margin-left: 10px;"><?= $jamMenit; ?></p>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php else : ?>
              <p class="text-center mt-2 fw-semibold">Tidak ada notifikasi</p>
            <?php endif; ?>
          </ul>
        </div>

      </div>
    </div>
  </nav>

  <?= $this->renderSection('content'); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>