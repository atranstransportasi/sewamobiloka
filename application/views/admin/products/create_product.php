<div class="card shadow mb-4">
    <div class="card-header py-3">
        <?php echo $title; ?>
    </div>
    <div class="card-body">


        <div class="text-center">
            <?php
            echo $this->session->flashdata('message');
            if (isset($errors_upload)) {
                echo '<div class="alert alert-warning">' . $error_upload . '</div>';
            }
            ?>
        </div>
        <?php
        echo form_open_multipart('admin/products/create');
        ?>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Nama Mobil <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="product_name" placeholder="Nama Mobil" value="<?php echo set_value('product_name'); ?>">
                <?php echo form_error('product_name', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Harga Sewa <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="product_price" placeholder="Harga Sewa" value="<?php echo set_value('product_price'); ?>">
                <?php echo form_error('product_price', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Pengurangan Harga Member
            </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="pengurangan" placeholder="Harga Member" value="<?php echo set_value('pengurangan'); ?>">
                <?php echo form_error('pengurangan', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Stok Produk <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="product_stock" placeholder="Stok Produk" value="<?php echo set_value('product_stock'); ?>">
                <?php echo form_error('product_stock', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Jumlah Penumpang <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="product_size" placeholder="Jumlah Penumpang" value="<?php echo set_value('product_size'); ?>">
                <?php echo form_error('product_size', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Kota <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <select name="category_id" class="form-control form-control-chosen select2_demo_1">
                    <option value="">Pilih Kota</option>
                    <?php foreach ($category_products as $category_products) { ?>
                        <option value="<?php echo $category_products->id ?>">
                            <?php echo $category_products->category_product_name ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Status Product <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <select name="product_status" class="form-control form-control-chosen select2_demo_1">
                    <option value="Aktif">Aktif</option>
                    <option value="Nonaktif">Nonaktif</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Upload Gambar <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <div class="input-group mb-3">
                    <input type="file" name="product_img">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Deskripsi Produk <span class="text-danger">*</span>
            </label>
            <div class="col-lg-9">

                <textarea class="form-control" id="summernote" name="product_desc" placeholder="Deskripsi Produk"></textarea>
                <?php echo form_error('product_desc', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Publish
                </button>
            </div>
        </div>

        <?php echo form_close() ?>



    </div>
</div>