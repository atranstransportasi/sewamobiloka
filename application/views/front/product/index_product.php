<?php $meta = $this->meta_model->get_meta(); ?>
<div class="breadcrumb-default">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="margin-top container">

    <div class="row">

        <div class="col-lg-12">

            <h1>Rental Mobil</h1>
            <p>Sewa Mobil di <?php echo $title; ?> dengan harga yang murah dengan fasilitas dan pelayanan bagus. Kami menyewakan mobil dengan berbagai macam tipe
                Silahkan cek list mobil yang bisa anda sewa di bawah ini. Untuk Pemesanan Juga Bisa melalui Chat Wahtsapp <?php echo $meta->telepon; ?></p>
            <b><?php echo $title; ?></b> <br>
            <!-- Update Harga <?php echo tanggal() ?> -->
            <hr>

            <div class="row">
                <?php foreach ($products as $products) : ?>

                    <div class="col-md-3 col-6">
                        <figure class="card">
                            <?php if ($products->product_img == NULL) : ?>
                                <img class="card-img-top" src="<?php echo base_url('assets/img/product/empty_image.jpg'); ?>">
                            <?php else : ?>
                                <img class="card-img-top" src="<?php echo base_url('assets/img/product/') . $products->product_img; ?>">
                            <?php endif; ?>

                            <div class="card-body text-center">

                                <h5 class="title"><?php echo $products->product_name; ?></h5>
                                <div style="font-size: 25px;font-weight:700;">
                                    <?php if ($this->session->userdata('id')) : ?>
                                        Rp. <?php echo number_format($products->price_reseller, '0', ',', '.'); ?>

                                    <?php else : ?>
                                        Rp. <?php echo number_format($products->product_price, '0', ',', '.'); ?>
                                    <?php endif; ?>
                                </div>
                                <br>

                                <a href="<?php echo base_url('products/detail/') . $products->product_slug; ?>" class="btn btn-sm btn-primary btn-block">Order</a>

                            </div>
                        </figure>
                    </div> <!-- col // -->
                <?php endforeach; ?>

                <div class="pagination col-md-12 text-center">
                    <?php if (isset($pagination)) {
                        echo $pagination;
                    } ?>
                </div>

            </div> <!-- row.// -->

        </div>

        <!-- <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Category Produk</div>
                <div class="card-body">
                    <?php foreach ($listcategory_products as $listcategory_products) : ?>
                        <ul>
                            <li><a href="<?php echo base_url('products/category_products/' . $listcategory_products->id); ?>"> <?php echo $listcategory_products->category_product_name; ?></a></li>
                        </ul>

                    <?php endforeach; ?>

                </div>
            </div>
        </div> -->


    </div>
</div>