<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container py-4">
    <div class="row justify-content-center align-items-center mb-3">
        <div class="col-lg-9">
            <h3 class="text-3xl xl:text-4xl font-semibold leading-7 xl:leading-9 text-gray-800">Order Detail</h3>

            <div class="d-flex justify-content-center align-items-center w-100 mt-3 flex-column space-y-3">
                <?php
                $produk_id = $pesanan["produk_id"];
                $matchingProduct = array_filter($produk, function ($produk) use ($produk_id) {
                    return $produk['id'] == $produk_id;
                });
                $matchingProduct = reset($matchingProduct);
                ?>

                <div class="order-actions-section d-flex flex-column w-100 space-y-3 mt-1 mb-3">
                    <div class="d-flex justify-content-center items-center pt-1 md:pt-3 space-y-4 flex-column">
                        <button class="btn btn-warning btn-lg w-100">Preparing Delivery</button>
                    </div>
                </div>

                <div class="order-details-card border border-gray-200 w-100 mb-2">
                    <div class="d-flex">
                        <div class="card-image mx-3 my-1" style="width: 18rem ">
                            <img src="<?= base_url('img/' . $matchingProduct['gambar']); ?>" alt="<?= $matchingProduct['nama']; ?>" style="width: 100%; aspect-ratio: 4/3; object-fit: cover;">
                        </div>

                        <div class="card-details d-flex flex-column justify-content-start align-items-start w-100 p-2">
                            <div class="d-flex justify-content-between align-items-start w-100">
                                <h3 class="text-lg font-semibold leading-6 text-gray-800">Order Id: <?= $pesanan["id_pesanan"]; ?> </h3>
                            </div>

                            <div class="d-flex flex-column mt-2">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Product details on the right side of the image -->
                                        <p class="text-sm leading-none text-gray-600">
                                            <strong>Product:</strong> <span class="text-gray-800"><?= $matchingProduct['nama']; ?></span>
                                        </p>
                                        <p>
                                            <strong>Quantity:</strong> <span class="text-gray-800"><?= $pesanan["jumlah_produk"]; ?></span>
                                        </p>
                                        <p>
                                            <strong>Total Price:</strong> <span class="text-gray-800">Rp <?= $pesanan["total_harga"]; ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="order-details-section mt-3 space-y-3 w-100">
                <div class="d-flex flex-column mt-2 space-y-3 w-100">
                    <div class="row row-cols-1 row-cols-md-2 g-2">
                        <!-- Shipping Address -->
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-base font-semibold leading-4 text-gray-800">Shipping Address</h5>
                                    <p class="card-text text-sm leading-5 text-gray-600"><?= $pesanan['alamat']; ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Shipping Method -->
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-base font-semibold leading-4 text-gray-800">Shipping Type</h5>
                                    <p class="card-text text-sm leading-5 text-gray-600"><?= $pesanan["tipe_pengiriman"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="order-actions-section d-flex flex-column w-100 space-y-3 mt-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="card-title text-lg font-semibold leading-4 text-gray-800">Estimation time</h5>
                                    <!-- Your other content goes here -->
                                </div>
                                <div class="text-end">
                                    <p class="card-text text-base leading-5 text-gray-600">Arrive in 3 Days</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>