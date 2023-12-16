<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container py-5">
  <form action="/order/checkout" method="post">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
    <div class="row mb-5">
      <div class="col">
        <h2 class="fw-bold">Pesanan</h2>
        <?= $validation->listErrors(); ?>
        <div class="card mb-3 rounded overflow-hidden my-3">
          <div class="row g-0">
            <div class="col-md-3 bg-black">
              <img src="/img/<?= $produk["gambar"]; ?>" class="gambar-produk img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-6 me-auto">
              <div class="card-body d-flex flex-column h-100">
                <h5 class="card-title"><?= $produk["nama"]; ?></h5>
                <p class="card-text"><?= $produk["deskripsi"]; ?></p>
                <p class="card-text mt-auto"><small class="text-body-secondary">Rp. <span id="harga"><?= $produk['harga']; ?></span>,00</small></p>
              </div>
            </div>
            <div class="col-md-2 justify-content-center d-flex align-items-center pe-5">
              <button type="button" class="btn btn-primary" onclick="updateQuantity('decrease')">-</button>
              <input id="quantity" name="quantity" type="number" class="form-control no-focus-outline mx-3 focus-none" value="1" readonly />
              <button type="button" class="btn btn-primary" onclick="updateQuantity('increase')">+</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-6">
        <h2 class="fw-bold">Pengiriman</h2>
        <p class="text-primary">*pilih salah satu pengiriman yang ingin digunakan</p>
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Instant
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body d-flex justify-content-between">
                <p>Dikirim langsung dan tiba dalam 4 jam</p>
                <p class="bg-primary bg-opacity-25 p-1 rounded">Rp. <span>20000</span>,00</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Next Day
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body d-flex justify-content-between">
                <p>Tiba di hari selanjutnya</p>
                <p class="bg-primary bg-opacity-25 p-1 rounded">Rp. <span>15000</span>,00</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Regular
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body d-flex justify-content-between">
                <p>Tiba sekitar 2-3 hari setalah pengiriman</p>
                <p class="bg-primary bg-opacity-25 p-1 rounded">Rp. <span>5000</span>,00</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <h2 class="fw-bold">Informasi Penerima</h2>
        <p class="text-primary">*ganti jika diperlukan</p>
        <div class="mb-2">
          <label for="nama" class="form-label">Nama</label>
          <input type="email" class="form-control" id="nama" name="nama" placeholder="Masukkan nama penerima">
        </div>
        <div class="mb-2">
          <label for="noTelepon" class="form-label">No Telepon</label>
          <input type="email" class="form-control" id="noTelepon" name="telepon" placeholder="Masukkan nomor telepon">
        </div>
        <div class="mb-2">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="email" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat tujuan">
        </div>
      </div>
    </div>
    <div class="row mb-3">
      <h2 class="fw-bold">Ringkasan Belanja</h2>
      <div class="col mt-2">
        <div class="d-flex justify-content-between">
          <p>Total Harga (<span id="quantity-price">1</span> barang)</p>
          <p>Rp. <span id="total-harga"><?= $produk['harga']; ?></span></p>
        </div>
        <div class="d-flex justify-content-between">
          <p>Ongkos Kirim</p>
          <p>Rp. <span id="ongkos-kirim">0</span>.00</p>
        </div>
        <hr class="full-width">
        <div class="d-flex justify-content-between">
          <p>Total Belanja</p>
          <input type="text" name="total-belanja" id="total-belanja" value="<?= $produk['harga']; ?>" class="form-control no-focus-outline" readonly style="width: 20%;text-align: end;">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="column">
        <input id="tipe-pengiriman" name="tipe-pengiriman" value="" class="form-control <?= ($validation->hasError('tipe-pengiriman')) ? 'is-invalid' : ''; ?>" type="hidden">
        <input id="id" name="id" value="<?= $produk['id']; ?>" type="hidden">
        <button type="submit" class="btn btn-primary">Pesan</button>
      </div>
    </div>
  </form>
</div>
<script>
  function updateQuantity(action) {
    var quantityInput = document.getElementById('quantity');
    var quantityPrice = document.getElementById('quantity-price');
    var totalHarga = document.getElementById('total-harga');

    var currentValue = parseInt(quantityInput.value);

    if (action === 'increase') {
      quantityInput.value = currentValue + 1;
      quantityPrice.innerText = currentValue + 1;
    } else if (action === 'decrease' && currentValue > 1) {
      quantityInput.value = currentValue - 1;
      quantityPrice.innerText = currentValue - 1;
    }

    updateTotalHarga();
  }

  function updateTotalHarga() {
    var quantityPrice = document.getElementById('quantity-price');
    var harga = document.getElementById('harga');
    var totalHarga = document.getElementById('total-harga');

    var calculatedTotal = parseInt(quantityPrice.innerText) * parseFloat(harga.innerText);
    totalHarga.innerText = calculatedTotal.toFixed(2);

    updateTotalBelanja();
  }

  document.querySelectorAll('.accordion-button').forEach(function(button) {
    button.addEventListener('click', function() {
      var selectedType = this.innerText.trim().toLowerCase().replace(' ', '-');
      document.getElementById('tipe-pengiriman').value = selectedType;
      updateOngkosKirim(selectedType);
    });
  });

  function updateOngkosKirim(type) {
    var ongkosKirim = document.getElementById('ongkos-kirim');

    if (type === 'instant') {
      ongkosKirim.innerText = 20000;
    } else if (type === 'next-day') {
      ongkosKirim.innerText = 15000;
    } else if (type === 'regular') {
      ongkosKirim.innerText = 5000;
    }

    updateTotalBelanja();
  }

  function updateTotalBelanja() {
    var totalHarga = document.getElementById('total-harga');
    var ongkosKirim = document.getElementById('ongkos-kirim');
    var totalBelanja = document.getElementById('total-belanja');

    var calculatedTotal = parseInt(totalHarga.innerText) + parseInt(ongkosKirim.innerText);
    totalBelanja.value = calculatedTotal.toFixed(2);
  }
</script>
<?= $this->endSection(); ?>