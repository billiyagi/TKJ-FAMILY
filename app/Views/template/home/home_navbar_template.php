<header class="container sticky-top top-0 bg-white">
    <nav class="navbar navbar-expand-lg py-3 mt-3 text-light">
        <div class="container-fluid d-flex justify-content-between p-0">
            <div class="tkj-brand navbar-brand">
                <a href="https://tkj-family.github.io/">
                    <span class="text-center text-shadow-orange text-dark">TKJ FAMILY</span>
                </a>
            </div>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav mt-lg-0 mt-4">
                    <a class="nav-link mx-3 fs-5 active" aria-current="page" href="#">Beranda</a>
                    <a class="nav-link mx-3 fs-5" href="<?= base_url('kisah'); ?>">Kisah</a>
                    <a class="nav-link mx-3 fs-5" href="<?= base_url('galeri'); ?>">Galeri</a>
                    <button type="button" class="btn btn-orange-tkj mt-lg-0 mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Masuk / Daftar</button>
                </div>
            </div>
        </div>
    </nav>
</header>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-body">
                <!-- Form masuk ke akun -->
                <form action="<?= base_url('auth/login'); ?>" id="formSignIn">
                    <div class="mb-3">
                        <label for="" class="form-label">username</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">password</label>
                        <input type="text" class="form-control">
                    </div>
                </form>

                <!-- Form daftar akun -->
                <form action="<?= base_url('auth/create'); ?>" id="formSignUp" class="tkj-none">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Depan</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Belakang</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">username</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">password</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Ceritakan sedikit tentang anda</label>
                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 bg-light d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" id="formMode" data-form="up">Daftar Akun</button>
                <button type="button" class="btn btn-orange-tkj py-2">Submit <i class="fa-solid fa-right-to-bracket ms-2"></i></button>
            </div>
        </div>
    </div>
</div>