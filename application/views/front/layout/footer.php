<?php
$meta      = $this->meta_model->get_meta();
$kota = $this->category_products_model->get_category_products();
$category = $this->category_products_model->get_category_products();
?>






<section class="bantuan mt-auto">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-8 text-light"><span style="font-size:35px;font-weight:700;">Butuh Bantuan ? Hubungi Kami</span></div>
            <div class="col-md-4 text-light"><span style="font-size:30px;font-weight:700;"><i class="fas fa-phone"></i> <?php echo $meta->telepon; ?></span></div>
        </div>
    </div>

    <footer class="pt-4 pt-md-5 pb-md-5 border-top bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="<?php echo base_url(); ?>"><img class="mb-2 img-fluid pr-3" src="<?php echo base_url('assets/img/logo/' . $meta->logo) ?>"></a>
                    <span style="font-size:15px;"><br>
                        <i class="fa fa-phone"></i> <?php echo $meta->telepon ?><br>
                        <i class="fa fa-envelope"></i> <?php echo $meta->email ?>
                    </span>
                </div>
                <div class="col-md-5 footer">
                    <h5>Kota</h5>
                    <ul class="list-unstyled text-small">
                        <?php foreach ($category as $category) : ?>
                            <li> <a class="text-muted" href="<?php echo base_url('products/category_products/' . $category->id); ?>"><?php echo $category->category_product_name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-md-2 col-6">
                    <h5>Halaman</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="<?php echo base_url('about') ?>">About Us</a></li>
                        <li><a class="text-muted" href="<?php echo base_url('contact') ?>">Contact Us</a></li>
                        <li><a class="text-muted" href="<?php echo base_url('products') ?>">Rental Mobil</a></li>
                        <!-- <li><a class="text-muted" href="<?php echo base_url('berita') ?>">Berita</a></li> -->
                    </ul>
                </div>
                <div class="col-md-2 col-6">
                    <h5>Payment</h5>

                    <img src="<?php echo base_url('assets/img/logo/payment.jpg'); ?>" class="img-fluid">

                </div>
            </div>

            <section class="border-top my-3 pt-3" style="font-size:12px">

                <h4>Rental dan Sewa mobil Murah dan Terbaik di Kota besar seluruh Indonesia.</h4>
                <p>Bagi Anda yang ingin sewa mobil di kota
                    <?php foreach ($kota as $kota) : ?>
                        <?php echo $kota->category_product_name; ?>,
                    <?php endforeach; ?>
                    , anda bisa memilih sewamobiloka.com sebagai layanan sewa mobil di Indonesia. Jika ingin menyewa mobil dengan kualitas terbaik anda harus memilih tempat sewa mobil yang tepat. Salah satunya yang juga penting adalah Fasilitas dan Pelayanan. Memilih tempat sewa mobil yang berkualitas, menjadi hal yang harus Anda pikirkan dengan baik.</p>

                <p>Jangan sampai Anda salah memilih tempat sewa mobil jika Anda tidak ingin banyak masalah bermunculan. Entah penjemputan yang tak sesuai, telat dalam melakukan penjemputan, dan masalah-masalah lainnya yang membuat Anda semakin terhambat. Anda harus memilih tempat sewamobil yang berkualitas untuk kebutuhan anda.</p>

                <p>Namun masalahnya penyedia jasa sewa mobil di kota-kota besar banyak sekali, dan semuanya juga menjanjikan kualitas. Jelas ini membuat kita semakin bingung menentukan, jasa penyewaan mobil mana yang paling tepat untuk kita? Tapi Anda tak perlu bingung karena kami mempunyai solusinya. Inilah beberapa poin penting untuk Anda bisa mendapatkan jasa sewa mobil yang terbaik!
                </p>

            </section>


        </div>
    </footer>
    <div class="credit text-center text-light py-md-3">Copyright &copy; <?php echo date('Y') ?> - <?php echo $meta->title ?> - <?php echo $meta->tagline ?></div>

</section>

<!-- Load javascript Jquery -->
<script src="<?php echo base_url() ?>assets/template/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/template/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/template/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/assets/js/vendor/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/moment-with-locales.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/timepicker.js"></script>
<script>
    $(function() {
        var minDate = new Date();
        minDate.setDate(minDate.getDate() + 1);

        $('#id_tanggal').datetimepicker({
            locale: 'id',
            format: 'D MMMM YYYY',
            minDate: minDate,
        });
    });
    $('.form-control-chosen').chosen({});
    $('#timepicker').timepicker();
</script>



<script type="text/javascript">
    $('#menu-utama').affix({
        offset: {
            top: 500
        }
    })
</script>

<!-- Google Analitycs -->
<?php echo $meta->google_analytics; ?>
<!-- End Google Analitycs -->




<!-- SUMMERNOTE -->
<link href="<?php echo base_url('assets/admin/js/summernote/summernote-lite.min.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/admin/js/summernote/summernote-lite.min.js'); ?>"></script>

<script>
    $('#summernote').summernote({

        tabsize: 2,
        height: 130,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>


<script>
    $(document).on('click', '.number-spinner button', function() {
        var btn = $(this),
            oldValue = btn.closest('.number-spinner').find('input').val().trim(),
            newVal = 0;

        if (btn.attr('data-dir') == 'up') {
            newVal = parseInt(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        btn.closest('.number-spinner').find('input').val(newVal);
    });
</script>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f02dc8624cb9814"></script>
</body>

</html>