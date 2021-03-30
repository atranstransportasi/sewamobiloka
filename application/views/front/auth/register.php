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
                            <h3><b>Keuntungan Menjadi Member</b></h3>
                            Dengan Menjadi member anda kan mendapatkan potongan harga khusus member, silahkan daftar untuk mendapatkan diskon
                            khusus member sewa mobil disini.<br><br>


                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
                            </div>
                            <?php
                            echo form_open_multipart('auth/register')
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
                                Register Account
                            </button>

                            <?php echo form_close() ?>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('auth') ?>">Sudah Punya Akun? Silahkan Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>