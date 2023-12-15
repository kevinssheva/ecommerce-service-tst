<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <h2 class="mt-3 text-center">Ini daftar produk yang tersedia</h2>
  <div class="row container-card">
    <?php $i = 1; ?>
    <?php foreach ($produk as $p) : ?>
      <div class="card mx-3 my-1" style="width: 18rem;">
        <img src="./img/<?= $p['gambar']; ?>" alt="<?= $p['nama']; ?>" style="width: 100%; aspect-ratio: 3/2; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title"><?= $p['nama']; ?></h5>
          <p class="card-text"><?= $p['deskripsi']; ?></p>
          <p class="card-text"><?= $p['harga']; ?></p>
          <a href="/produk/<?= $p['id']; ?>" class="btn btn-primary">+</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?= $this->endSection(); ?>