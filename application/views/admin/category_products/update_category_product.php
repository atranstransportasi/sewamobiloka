<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Edit<?php echo $category_products->id ?>">
    <i class="fa fa-pencil"></i> Edit
</button>

<div class="modal modal-default fade" id="Edit<?php echo $category_products->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Nama Kota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <?php
                //Form Open
                echo form_open(base_url('admin/category_products/update/') . $category_products->id);
                ?>

                <div class="form-group">
                    <label>Nama Kota</label>
                    <input type="text" class="form-control" name="category_product_name" value="<?php echo $category_products->category_product_name ?>">
                </div>





                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
                </div>


                <?php
                //Form Close
                echo form_close();
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->