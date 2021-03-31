<?php
$id             = $this->session->userdata('id');
$user           = $this->user_model->user_detail($id);
?>

<div class="breadcrumb-default">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="margin-top container">
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <h3> <?php echo $title; ?></h3>
                <div class="row">
                    <div class="col-md-3">
                        <?php if ($product->product_img == NULL) : ?>
                            <div class="img-wrap"><img class="img-fluid" src="<?php echo base_url('assets/img/product/empty_image.jpg'); ?>"></div>
                        <?php else : ?>
                            <div class="img-wrap"><img class="img-fluid" src="<?php echo base_url('assets/img/product/') . $product->product_img; ?>"></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <h2><?php echo $product->product_name; ?></h2>
                        Area : <?php echo $product->category_product_name; ?><br>

                        <?php if ($this->session->userdata('id')) : ?>
                            <del style="color: red;">Rp. <?php echo number_format($product->product_price, '0', ',', '.'); ?></del>
                            <h3 style="font-size:50px;font-weight:700;"> Rp. <?php echo number_format($product->price_reseller, '0', ',', '.'); ?></h3>

                        <?php else : ?>
                            <h3 style="font-size:50px;font-weight:700;"> Rp. <?php echo number_format($product->product_price, '0', ',', '.'); ?></h3>
                        <?php endif; ?>

                    </div>
                </div>
                <hr>
                <h3> Detail Customer</h3>

                

                <?php

                echo form_open_multipart('products/order/' . $product->id, array('class' => 'needs-validation', 'novalidate' => 'novalidate'));

                $kode_transaksi = date('dmY') . strtoupper(random_string('alnum', 5));
                ?>

                <!-- <form action="<?php echo base_url(); ?>" class="needs-validation" novalidate> -->

                <!-- Input Hidden data produk -->
                <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ?>">
                <input type="hidden" name="product_name" value="<?php echo $product->product_name; ?>">
                <input type="hidden" name="product_size" value="<?php echo $product->product_size; ?>">
                <input type="hidden" name="kota" value="<?php echo $product->category_product_name; ?>">
                <input type="hidden" name="product_term" value="<?php echo $product->product_desc; ?>">




                <!-- If User Login -->
                <?php if ($this->session->userdata('id')) : ?>

                    <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $product->price_reseller; ?>">
                    <input type="hidden" name="user_title" value="<?php echo $user->user_title; ?>">





                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Nama Lengkap<span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="user_name" placeholder="Nama Lengkap" value="<?php echo $user->user_name; ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Email <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="user_email" placeholder="Email" value="<?php echo $user->email; ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Nomor Handphone <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="user_phone" placeholder="Nomor Handphone" value="<?php echo $user->user_phone; ?>" required>
                        </div>
                    </div>



                    <!-- End If User Login -->
                <?php else : ?>
                    <input type="hidden" name="product_price" value="<?php echo $product->product_price; ?>">

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Title<span class="text-danger">* </span>
                        </label>
                        <div class="col-lg-9">
                            <select class="form-control custom-select" name="user_title" required>
                                <option value="">-- Pilih Title --</option>
                                <option value='Bapak'>Bapak</option>
                                <option value='Ibu'>Ibu</option>
                                <option value='Saudara'>Saudara</option>
                                <option value='Saudari'>Saudari</option>

                            </select>
                            <div class="invalid-feedback">Silahkan Pilih title.</div>
                        </div><br>

                        <?php echo form_error('user_title', '<small class="text-danger">', '</small>'); ?>

                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Nama Lengkap<span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="user_name" placeholder="Nama Lengkap" value="<?php echo set_value('user_name'); ?>" required>
                            <div class="invalid-feedback">Silahkan masukan nama Lengkap.</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Email <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9">
                            <input type="email" class="form-control" name="user_email" placeholder="Email" value="<?php echo set_value('user_email'); ?>" required>
                            <div class="invalid-feedback">Silahkan masukan Alamat email.</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Nomor Handphone <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9">
                            <input type="number" class="form-control" name="user_phone" placeholder="Nomor Handphone" value="<?php echo set_value('user_phone'); ?>" required>
                            <div class="invalid-feedback">Silahkan masukan Nomor Handphone.</div>
                        </div>
                    </div>

                <?php endif; ?>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Alamat Penjemputan <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9">
                        <textarea class="form-control" name="alamat_jemput" placeholder="Alamat penjemputan" required></textarea>
                        <div class="invalid-feedback">Silahkan masukan Alamat Penjemputan.</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Lama Sewa<span class="text-danger">* </span>
                    </label>
                    <div class="col-lg-9">
                        <select class="form-control custom-select" name="product_qty" required>
                            <option value="">-- Pilih Lama Sewa --</option>
                            <option value='1'>1 Hari</option>
                            <option value='2'>2 Hari</option>
                            <option value='3'>3 Hari</option>
                            <option value='4'>4 Hari</option>
                            <option value='5'>5 Hari</option>
                            <option value='6'>6 Hari</option>
                            <option value='7'>7 Hari</option>
                            <option value='8'>8 Hari</option>
                            <option value='9'>9 Hari</option>
                            <option value='10'>10 Hari</option>

                        </select>
                        <div class="invalid-feedback">Silahkan Pilih Lama Sewa.</div>
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Tanggal Jemput <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="text" name="tanggal_jemput" class="form-control" placeholder="Tanggal" id="id_tanggal">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Jam Penjemputan<span class="text-danger">* </span>
                    </label>
                    <div class="col-lg-9">
                        <select class="form-control form-control-chosen" name="jam_jemput" value="" required>
                            <option value="">-- Pilih Jam Jemput --</option>
                            <option value='05.00'>05.00</option>
                            <option value='05.30'>05.30</option>
                            <option value='06.00'>06.00</option>
                            <option value='06.30'>06.30</option>
                            <option value='06.00'>06.00</option>
                            <option value='06.30'>06.30</option>
                            <option value='07.00'>07.00</option>
                            <option value='07.30'>07.30</option>
                            <option value='08.00'>08.00</option>
                            <option value='08.30'>08.30</option>
                            <option value='09.00'>09.00</option>
                            <option value='09.30'>09.30</option>
                            <option value='10.00'>10.00</option>
                            <option value='10.30'>10.30</option>
                            <option value='11.00'>11.00</option>
                            <option value='11.30'>11.30</option>
                            <option value='12.00'>12.00</option>
                            <option value='12.30'>12.30</option>
                            <option value='13.00'>13.00</option>
                            <option value='13.30'>13.30</option>
                            <option value='14.00'>14.00</option>
                            <option value='14.30'>14.30</option>
                            <option value='15.00'>15.00</option>
                            <option value='15.30'>15.30</option>
                            <option value='16.00'>16.00</option>
                            <option value='16.30'>16.30</option>
                            <option value='17.00'>17.00</option>
                            <option value='17.30'>17.30</option>
                            <option value='18.00'>18.00</option>
                            <option value='18.30'>18.30</option>
                            <option value='19.00'>19.00</option>
                            <option value='19.30'>19.30</option>
                            <option value='20.00'>20.00</option>
                            <option value='20.30'>20.30</option>
                            <option value='21.00'>21.00</option>
                            <option value='21.30'>21.30</option>
                            <option value='22.00'>22.00</option>
                            <option value='22.30'>22.30</option>
                            <option value='23.00'>23.00</option>
                            <option value='23.30'>23.30</option>
                            <option value='00.00'>00.00</option>
                        </select>
                        <div class="invalid-feedback">Silahkan Pilih Jam Jemput.</div>
                    </div><br>



                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Permintaan Khusus <span class="text-success">* Optional</span>
                    </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="permintaan_khusus" placeholder="Permintaan Khusus" value="<?php echo set_value('permintaan_khusus'); ?>">

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-9">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Order Sekarang
                        </button>
                    </div>
                </div>


                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>


<!-- <form class="needs-validation" novalidate>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationCustom01">First name</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustom02">Last name</label>
            <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustomUsername">Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>
                <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom03">City</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <label for="validationCustom04">State</label>
            <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
            <div class="invalid-feedback">
                Please provide a valid state.
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <label for="validationCustom05">Zip</label>
            <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
                Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Submit form</button>
</form> -->

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>