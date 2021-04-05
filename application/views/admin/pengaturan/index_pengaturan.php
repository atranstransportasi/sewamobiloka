<div class="row">
    <!-- <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <?php echo $email_register->name; ?>
                <a href="<?php echo base_url('admin/pengaturan/update/' . $email_register->id); ?>" class="btn btn-info btn-sm">Update Email Register</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-4"> Nama :</label>
                    <div class="col-8"><?php echo $email_register->name; ?></div>
                    <label class="col-4"> Protocol : </label>
                    <div class="col-8"> <?php echo $email_register->protocol; ?></div>
                    <label class="col-4"> Host :</label>
                    <div class="col-8"> <?php echo $email_register->smtp_host; ?></div>
                    <label class="col-4"> Port : </label>
                    <div class="col-8"><?php echo $email_register->smtp_port; ?></div>
                    <label class="col-4">Email : </label>
                    <div class="col-8"> <?php echo $email_register->smtp_user; ?></div>
                    <label class="col-4">Password :</label>
                    <div class="col-8"> <?php echo $email_register->smtp_pass; ?></div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <?php echo $email_order->name; ?>
                <a href="<?php echo base_url('admin/pengaturan/update/' . $email_order->id); ?>" class="btn btn-info btn-sm">Update Email Order</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-4"> Nama </label>
                    <div class="col-8"> : <?php echo $email_order->name; ?></div>
                    <label class="col-4"> Protocol </label>
                    <div class="col-8"> : <?php echo $email_order->protocol; ?></div>
                    <label class="col-4"> Host </label>
                    <div class="col-8"> : <?php echo $email_order->smtp_host; ?></div>
                    <label class="col-4"> Port </label>
                    <div class="col-8"> : <?php echo $email_order->smtp_port; ?></div>
                    <label class="col-4">Email Customer </label>
                    <div class="col-8"> : <?php echo $email_order->smtp_user; ?></div>
                    <label class="col-4">Email Admin</label>
                    <div class="col-8"> : <?php echo $email_order->cc_email; ?></div>
                    <label class="col-4">Password </label>
                    <div class="col-8"> : <?php echo $email_order->smtp_pass; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>