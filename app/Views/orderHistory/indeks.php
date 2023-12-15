<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container py-4">
    <div class="row justify-content-center align-items-center mb-5">
        <div class="col-lg-9">
            <h3 class="text-3xl xl:text-4xl font-semibold leading-7 xl:leading-9 text-gray-800">Order Summary</h3>
            <div class="d-flex justify-content-center align-items-center w-100 mt-8 flex-column space-y-4">
            <?php foreach ($orderHistory as $o) : ?>
                <?php
                    // Assuming $produk is an array with product details
                    $produk_id = $o["produk_id"];
                    $matchingProduct = array_filter($produk, function ($produk) use ($produk_id) {
                        return $produk['id'] == $produk_id;
                    });
                    $matchingProduct = reset($matchingProduct); // Get the first (and only) matching product
                ?>
                <div class="d-flex flex-row justify-content-start align-items-start border border-gray-200 w-100">
                    <div class="w-40">
                    <img src="./img/<?= $matchingProduct['gambar']; ?>" alt="<?= $matchingProduct['nama']; ?>" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="d-flex flex-column justify-content-start align-items-start w-100 p-4">
                        <h3 class="text-lg font-semibold leading-6 text-gray-800">Order Id: <?= $o["id_pesanan"]; ?> </h3>
                        <div class="d-flex flex-column mt-4">
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-sm leading-none text-gray-600"><strong>Product:</strong> <span class="text-gray-800"><?= $matchingProduct['nama']; ?></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-sm leading-none text-gray-600"><strong>Quantity:</strong> <span class="text-gray-800"><?= $o["jumlah_produk"]; ?></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-4 justify-content-end items-center w-100">
                            <p class="btn btn-primary">Details</p>
                        </div>
                    </div>
                </div>
                <!-- Product 2 and 3 follow the same structure as Product 1 -->

            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
