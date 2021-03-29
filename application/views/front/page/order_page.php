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

<div class="margin-top container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <!-- <h2>Cara Order</h2> -->
                <div class="row">
                    <div class="col-md-6">
                        <!-- <img class="img-fluid" src="<?php echo base_url('assets/img/galery/cara-order.png'); ?>"> -->
                    </div>
                    <div class="col-md-6">
                        <h3>Cara Order</h3>
                        <div style="line-height: 40px;">
                            <ol>
                                <li>Pilih Kota pada menu lalu pilih salah Kota destinasi anda</li>
                                <li>Pilih Mobil yang akan anda sewa, lalu klik tombol Order</li>
                                <li>Pilih tombol booking untuk melakukan order</li>
                                <li>Isi semua data penyewa, lalu klik Order sekarang</li>
                                <li>Transfer Pembayaran</li>
                                <li>Konfirmasi Pembayaran dengan menghubungi Nomor whatsaap <?php echo $meta->telepon; ?> </li>
                                <li>Setelah order di konfirmasi kami akan memberikan detail info driver yang akan menjemput </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>