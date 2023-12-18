<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container py-4">
  <div class="row justify-content-center align-items-center mb-5">
    <div class="col-lg-9">
      <h2 class="fw-bold mb-3">Order History</h2>
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success my-2" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>
      <?php endif; ?>
      <div class="d-flex justify-content-center align-items-center w-100 mt-2 flex-column space-y-4">
        <?php foreach ($orderHistory as $o) : ?>
          <?php
          $produk_id = $o["produk_id"];
          $matchingProduct = array_filter($produk, function ($produk) use ($produk_id) {
            return $produk['id'] == $produk_id;
          });
          $matchingProduct = reset($matchingProduct);
          ?>
          <div class="d-flex flex-row justify-content-start align-items-start border border-gray-200 w-100 overflow-hidden my-3 rounded-2 shadow" style="aspect-ratio: 5/1;">
            <div style="width: 30%; height: 100%;">
              <img src="/img/<?= $matchingProduct['gambar']; ?>" alt="<?= $matchingProduct['nama']; ?>" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
            </div>

            <div class="d-flex justify-content-between align-items-stretch px-4 py-2 h-100" style="width: 70%;">
              <div class="d-flex flex-column justify-content-center w-100">
                <h3 class="text-lg mb-2 text-gray-800 fw-semibold">Order Id: <?= $o["id_pesanan"]; ?> </h3>
                <p class="text-sm leading-none text-gray-600">
                  <strong>Product:</strong> <span class="text-gray-800"><?= $matchingProduct['nama']; ?></span>
                </p>
                <p>
                  <strong>Quantity:</strong> <span class="text-gray-800"><?= $o["jumlah_produk"]; ?></span>
                </p>
                <p>
                  <strong>Total Price:</strong> <span class="text-gray-800">Rp <?= $o["total_harga"]; ?></span>
                </p>
              </div>
              <div class="d-flex flex-column justify-content-between align-items-end py-2">
                <span class="px-3 py-2 rounded-3 bg-success bg-opacity-25 border border-sucess text-success"><?= ucwords($o['status']); ?></span>
                <a href="/orderHistory/<?= $o["id_pesanan"]; ?>" class="btn btn-primary px-3">Details</a>

              </div>

            </div>
          </div>


        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>