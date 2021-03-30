<section>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>

        </ol>
        <div class="carousel-inner">
            <?php $i = 1;
            foreach ($slider as $slider) { ?>
                <div class="carousel-item <?php if ($i == 1) {
                                                echo 'active';
                                            } ?> ">
                    <a href="<?php echo base_url() . $slider->galery_url; ?>"><img class="img-fluid" src="<?php echo base_url('assets/img/galery/' . $slider->galery_img) ?>" alt="<?php echo $slider->galery_title ?>"></a>
                    <div class="container">
                        <div class="carousel-caption text-left">
                        </div>
                    </div>
                </div>
            <?php $i++;
            } ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>



<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 p-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div style="font-size:50px;color:#00a2e9;">
                                            <i class="ti-id-badge"></i>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <h4>Harga Murah</h4>
                                        Sewa Mobil Murah dengan pelayanan bagus.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div style="font-size:50px;color:#00a2e9;">
                                            <i class="ti-bookmark-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <h4>Support 24 Jam</h4>
                                        Support layanan 24 Jam.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div style="font-size:50px;color:#00a2e9;">
                                            <i class="ti-stats-up"></i>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <h4>Promo Menarik</h4>
                                        Dapatkan Promo untuk member.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div style="font-size:50px;color:#00a2e9;">
                                            <i class="ti-gift"></i>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <h4>Layanan terdekat</h4>
                                        Tersedia di Berbagai Kota Besar di Indonesia.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4 form-signup">
                <div class="card">

                    <div class="card-body">

                        <h5 class="card-title">Daftar Jadi Member</h5>
                        <hr>

                        <?php
                        echo form_open_multipart('auth/register')
                        ?>

                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <select class="form-control form-control-chosen" name="user_title" value="">
                                        <option value='Bapak'>Bapak</option>
                                        <option value='Ibu'>Ibu</option>
                                        <option value='Saudara'>Saudara</option>
                                        <option value='Saudari'>Saudari</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="user_name" placeholder="Nama Lengkap" value="<?php echo set_value('user_name'); ?>">
                                    <?php echo form_error('user_name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="user_phone" placeholder="Nomor Handphone" value="<?php echo set_value('user_phone'); ?>">
                            <?php echo form_error('user_phone', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <input type="hidden" class="form-control" name="email">


                        <div class="form-group">
                            <input type="text" class="form-control" name="real_email" placeholder="Email Address" value="<?php echo set_value('real_email'); ?>" style="text-transform: lowercase">
                            <?php echo form_error('real_email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control" name="password1" placeholder="Password">
                                <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password2" placeholder="Repeat Password">

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Daftar
                        </button>

                        <?php echo form_close() ?>


                        <div class="text-center">
                            <a class="small" href="<?php echo base_url('auth') ?>">Sudah Punya Akun? Login!</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="produk-home my-md-3 py-2 bg-white">
    <div class="container">
        <h2 class="text-center pb-3"> Jakarta </h2>
        <div class="row">
            <?php foreach ($antam as $antam) : ?>
                <div class="col-md-3">
                    <div class="card text-center">
                        <img class="card-img-top" src="<?php echo base_url('assets/img/product/' . $antam->product_img); ?>" alt="Card image cap">
                        <div class="card-body">

                            <h5 class="title"><?php echo substr($antam->product_name, 0, 25); ?></h5>
                            <div style="font-size: 25px;font-weight:700;">
                                <?php if ($this->session->userdata('id')) : ?>
                                    Rp. <?php echo number_format($antam->price_reseller, '0', ',', '.'); ?>

                                <?php else : ?>
                                    Rp. <?php echo number_format($antam->product_price, '0', ',', '.'); ?>
                                <?php endif; ?>
                            </div>


                            <a href="<?php echo base_url('products/detail/') . $antam->product_slug; ?>" class="btn btn-sm btn-primary">Order Produk</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</section>





<!-- Popular Routes
      ============================================= -->
<div class="container">
    <h2 class="text-9 font-weight-600 text-center mt-5">Pilih Kota Destinasi Sewa mobil</h2>
    <p class="lead text-dark text-center mb-5">Pilih lokasi sewa mobil</p>
    <div class="row">

        <?php foreach ($kota as $kota) : ?>
            <div class="col-md-6 col-lg-4">
                <a href="<?php echo base_url('products/category_products/' . $kota->id); ?>">
                    <div class="card">
                        <div class="card-body">
                            <h5> <?php echo $kota->category_product_name; ?> </h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Popular Routes end -->