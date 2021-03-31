<div class="card">
    <div class="card-header">
        <div class="card-header-left">
            <h5><?php echo $title; ?></h5>
        </div>
        <div class="card-header-right">

        </div>

    </div>
    <div class="card-body">
        <?php
        //Notifikasi
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success alert-dismissable fade show">';
            echo '<button class="close" data-dismiss="alert" aria-label="Close">×</button>';
            echo $this->session->flashdata('message');
            echo '</div>';
        }
        echo validation_errors('<div class="alert alert-warning">', '</div>');

        ?>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Sewa</th>
                        <th>Mobil</th>
                        <th>Customer</th>
                        <th>Kota</th>
                        <th>Durasi</th>
                        <th>Harga</th>
                        <th width="25%">Action</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($transaksi as $transaksi) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $transaksi->tanggal_jemput; ?></td>
                        <td><?php echo $transaksi->product_name; ?></td>
                        <td><?php echo $transaksi->user_name; ?></td>
                        <td><?php echo $transaksi->kota; ?></td>
                        <td><?php echo $transaksi->product_qty; ?> Hari</td>
                        <td>Rp. <?php $total = $transaksi->product_price * $transaksi->product_qty;
                                echo number_format($total, '0', ',', '.'); ?></td>
                        <td>
                            <a href="<?php echo base_url('admin/transaksi/detail/' . $transaksi->id); ?>" class="btn btn-primary btn-sm"><i class="fas fa-external-link-alt"></i> Lihat</a>
                        </td>
                    </tr>
                <?php $no++;
                }; ?>
            </table>
            <hr>
            <div class="pagination col-md-12 text-center">
                <?php if (isset($pagination)) {
                    echo $pagination;
                } ?>
            </div>
        </div>
    </div>
</div>