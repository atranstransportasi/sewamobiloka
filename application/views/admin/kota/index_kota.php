<!-- Invoice Example -->
<?php
//Notifikasi
if ($this->session->flashdata('message')) {
    echo '<div class="alert alert-success">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>';
    echo $this->session->flashdata('message');
    echo '</div>';
}
echo validation_errors('<div class="alert alert-warning">', '</div>');

?>
<div class="row">

    <div class="col-md-4">
        <div class="card">
            <?php
            echo $this->session->flashdata('message');
            if (isset($error_upload)) {
                echo '<div class="alert alert-warning">' . $error_upload . '</div>';
            }
            ?>

            <div class="card-header">
                <h6 class="m-0 font-weight-bold">Tambah Kategori</h6>

            </div>
            <div class="card-body">
                <?php
                //Form Open
                echo form_open_multipart(base_url('admin/kota/create'));
                ?>

                <div class="form-group">
                    <label>Nama Kota</label>
                    <input type="text" class="form-control" name="kota_name" placeholder="Nama Kategori">
                    <?php echo form_error('kota_name', '<small class="text-danger">', '</small>'); ?>
                </div>



                <div class="form-group">
                    <label class="col-lg-12 col-form-label">Upload Gambar <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <div class="input-group mb-3">
                            <input type="file" name="kota_image">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
                </div>


                <?php
                //Form Close
                echo form_close();
                ?>


            </div>

        </div>
    </div>




    <div class="col-md-8 mb-4">




        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold"><?php echo $title; ?></h6>

            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Kota</th>

                            <th width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kota as $kota) : ?>
                            <tr>
                                <td class="text-info"><?php echo $no; ?></td>
                                <td><?php echo $kota->kota_name; ?></td>


                                <td>

                                    <a href="<?php echo base_url('admin/kota/update/' . $kota->id); ?>" class="btn btn-sm btn-info text-white"><i class="ti-pecil"></i> Edit</a>

                                    <?php include "delete_kota.php"; ?>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">

                <div class="pagination col-md-12 text-center">
                    <?php if (isset($pagination)) {
                        echo $pagination;
                    } ?>
                </div>
            </div>
        </div>
    </div>

</div>