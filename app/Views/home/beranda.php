<?php $this->extend('template/home/home_template'); ?>

<?php $this->section('contents'); ?>
<!-- Sambutan -->
<section class="container mt-5 py-5">
    <strong class="fs-1 montserrat fw-bold">We Create & Save</strong>
    <p class="fs-4 lh-lg">kami membuat dan mendapatkan sebuah kisah tak terlupakan disini, <br> tidak banyak tapi <i><strong>Berharga</strong></i>.</p>
</section>

<!-- Artikel Terkini -->
<section class="container my-5 pb-5">
    <div class="row gx-0 gy-0">
        <div class="col-md-6">
            <img src="<?= base_url('uploads/12tkj-putrapakuan-foto-bersama-setelah-makan-bersama.jpg'); ?>" alt="" class="w-100 h-100 border border-light obj-fit border-3">
        </div>
        <div class="col-md-6">
            <div class="row gx-0 gy-0">
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/12tkj-putrapakuan-foto-bersama-diperistirahatan-wisata.jpg'); ?>" alt="" class="w-100 h-100 border border-light obj-fit border-3">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/12tkj-putrapakuan-tugas-diperempuan.jpg'); ?>" alt="" class="w-100 h-100 border border-light obj-fit border-3">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/12tkj-putrapakuan-foto-bersama-futsal-laki.jpg'); ?>" alt="" class="w-100 h-100 border border-light obj-fit border-3">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/12tkj-putrapakuan-berswafoto-bersama-walas.jpg'); ?>" alt="" class="w-100 h-100 border border-light obj-fit border-3">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container mt-5">
    <div class="row gy-5 align-items-center">
        <div class="col-md-6">
            <strong class="fs-2 montserrat fw-bold mb-4 d-block">3 Tahun Perjalanan</strong>
            <p class="fs-4 lh-lg mb-4">Beragam Aktifitas yang telah kami lalui, Sungguh suatu pengalaman yang tak terlupakan.</p>
            <a href="" class="btn btn-lg btn-dark">Lihat Kisah <i class="fa-solid fa-arrow-right ms-2"></i></a>
        </div>
        <div class="col-md-6">
            <img src="<?= base_url('uploads/12tkj-putrapakuan-foto-bersama-walas-dikelas.jpg'); ?>" alt="" class="w-100 h-100 obj-fit">
        </div>
    </div>
</div>

<?php $this->endSection(); ?>


<?php $this->section('script'); ?>
<script>
    
    $(document).ready(function() {
        // Form Pendaftaran
        formAJAX('#formSignUp', 'POST', '/auth/create', ['Pendaftaran berhasil dilakukan', 'silahkan login untuk masuk ke akun', 'success'], '#authModal');

        // Form Login
        formAJAX('#formSignIn', 'POST', '/auth', ['Akun valid', '', 'success'], '#authModal', function() {
            window.location.href = 'auth/login';
        });
    })
</script>
<?php $this->endSection(); ?>