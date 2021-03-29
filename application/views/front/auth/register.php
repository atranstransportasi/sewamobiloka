<?php
$meta = $this->meta_model->get_meta();
?>
<div class="breadcrumb-default">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="col-md-12 mx-auto">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-6 p-5">
                        <div style="line-height: 35px;">
                        <h3><b>Keuntungan Menjadi Reseller</b></h3>
                        Reseller MiniGold merupakan bagian dari menyebarkan semangat menabung emas sekaligus 
                        membuka peluang usaha bagi anda semua. Keuntungan menjadi reseller anda akan mendapatkan potongan harga yang menarik.
                        Menjadi reseller tokominigold.com memiliki beberapa syarat.<br><br>
                        <h4><b>Syarat  dan ketentuan menjadi reseller</b></h4>
                        <ol>
                            <li>Pembelian awal Rp. 500.000,-</li>
                            <li>Bersedia bekerja sama dengan Reseller Tokominigold.com</li>
                            <li>Melampirkan scan KTP / KK</li>
                        </ol>
                        <h4><b>Cara Mendaftar</b></h4>
                        <ul>
                        <li>Isi Form pendaftaran register di halaman ini</li>
                            <li>Konfirmasi Pendaftaran melalui Whatsapp <?php echo $meta->telepon;?></li>
                        </ul>

                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <?php
                        echo form_open('auth/register')
                        ?>
                        <div class="form-group">
                            <select class="form-control form-control-chosen" name="user_title" value="">
                                <option value='Bapak'>Bapak</option>
                                <option value='Ibu'>Ibu</option>
                                <option value='Saudara'>Saudara</option>
                                <option value='Saudari'>Saudari</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_name" placeholder="Nama Lengkap" value="<?php echo set_value('user_name'); ?>">
                            <?php echo form_error('user_name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_phone" placeholder="Nomor Handphone" value="<?php echo set_value('user_phone'); ?>">
                            <?php echo form_error('user_phone', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email Address" value="<?php echo set_value('email'); ?>" style="text-transform: lowercase">
                            <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
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
                            Register Account
                        </button>

                        <?php echo form_close() ?>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?php echo base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?php echo base_url('auth') ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>