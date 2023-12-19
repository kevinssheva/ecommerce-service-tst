<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <h2 class="mt-3 fw-semibold fs-1">Explore Our Collection</h2>
  <p class="text-body-secondary">
    Explore the latest trends and newest additions in our constantly updated collection. Easily discover product choices in exclusive categories and enjoy exclusive deals in the promotions section. Gain additional confidence in your purchases by reading customer reviews before you shop.</p>
  <hr class="my-4">
  <div class="row container-card">
    <?php $i = 1; ?>
    <?php foreach ($produk as $p) : ?>
      <div class="card mx-3 my-1 px-0 shadow rounded-3 overflow-hidden border border-0" style="width: 18rem;">
        <img src="./img/<?= $p['gambar']; ?>" alt="<?= $p['nama']; ?>" class="rounded-top  bg-danger" style="width: 100%; aspect-ratio: 3/2; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title fw-semibold"><?= $p['nama']; ?></h5>
          <p class="card-text text-body-tertiary"><?= $p['deskripsi']; ?></p>
          <p class="card-text fw-semibold fs-5">Rp. <?= number_format($p['harga'], 2, ',', '.'); ?></p>
          <a href="/produk/<?= $p['id']; ?>" class="btn btn-primary">+</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?= $this->endSection(); ?>