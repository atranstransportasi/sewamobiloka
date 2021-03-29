<div class="container my-5">
    <div class="row">
        <?php foreach ($category as $category) { ?>
            <div class="col-md-4">
                <a href="<?php echo base_url('products/category_products/' . $category->id); ?>">
                    <div class="card">
                        <div class="card-body">
                            <?php echo $category->category_product_name; ?>
                        </div>
                    </div>
                </a>
            </div>
        <?php }; ?>

    </div>
</div>