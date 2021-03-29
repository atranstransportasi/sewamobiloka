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
        <div class="col-md-8">
            <div class="card">

                <div class="card-header"><?php echo $title; ?></div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <?php if ($products->product_img == NULL) : ?>
                                <div class="img-wrap"><img class="img-fluid" src="<?php echo base_url('assets/img/product/empty_image.jpg'); ?>"></div>
                            <?php else : ?>
                                <div class="img-wrap"><img class="img-fluid" src="<?php echo base_url('assets/img/product/') . $products->product_img; ?>"></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <h2><?php echo $products->product_name; ?></h2>
                            Area : <?php echo $products->category_product_name; ?><br>
                            <?php if ($this->session->userdata('id')) : ?>
                                <del style="color: red;">Rp. <?php echo number_format($products->product_price, '0', ',', '.'); ?></del>
                                <h3> Rp. <?php echo number_format($products->price_reseller, '0', ',', '.'); ?></h3>

                            <?php else : ?>
                                <h3> Rp. <?php echo number_format($products->product_price, '0', ',', '.'); ?></h3>
                            <?php endif; ?><br>


                            <a class="btn btn-primary btn-block" href="<?php echo base_url('products/order/' . md5($products->id)); ?>">Booking</a>


                        </div>

                        <hr>
                        <div class="col-md-12">

                            <h3>Deskripsi Produk</h3>

                            <?php echo $products->product_desc; ?><br>

                        </div>



                    </div>



                </div>
            </div>
        </div>


        <div class="col-md-4">



            <div class="card">
                <div class="card-header">Produk Lainya</div>
                <div class="card-body">


                    <?php foreach ($related_products as $related_products) : ?>

                        <div class="row">
                            <span class="col-md-4"><img src="<?php echo base_url('assets/img/product/' . $related_products->product_img); ?>" class="img img-thumbnail img-fluid"></span>


                            <span class="col-md-8">
                                <h5><a href="<?php echo base_url('products/detail/' . $related_products->product_slug); ?>"> <?php echo $related_products->product_name; ?></a></h5>
                                <a class="btn btn-primary btn-sm" href="<?php echo base_url('products/detail/' . $related_products->product_slug); ?>"> Detail Produk</a>
                            </span>
                        </div>
                        <hr>


                    <?php endforeach; ?>













                </div>
            </div>

        </div>
    </div>

</div>