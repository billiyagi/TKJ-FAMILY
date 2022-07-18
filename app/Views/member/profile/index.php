<?php $this->extend('template/member/member'); ?>

<?php $this->section('contents'); ?>
<form action="<?= base_url('member/profile/update'); ?>" method="post" id="formProfileUpdate" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="old_avatar" value="<?= $user->avatar; ?>">
    <input type="hidden" name="id" value="<?= $user->user_id; ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-title font-weight-bold text-dark">Avatar (Max 1Mb)</div>
                    <div class="card-body">
                        <img src="<?= user_avatar($user->avatar); ?>" alt="User Avatar" class="w-100">
                        <input type="file" name="avatar" class="form-control mt-3">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-title font-weight-bold text-dark">Profile Detail</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">Nama Depan</label>
                            <input type="text" name="first_name" id="firstName" class="form-control" value="<?= $user->first_name; ?>">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Nama Belakang</label>
                            <input type="text" name="last_name" id="lastName" class="form-control" value="<?= $user->last_name; ?>">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" class="form-control" value="<?= $user->username; ?>" disabled>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= $user->email; ?>">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="button" class="btn btn-primary btn-confirm" id="formSubmit" data-confirm="Simpan perubahan?">Simpan perubahan <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $this->endSection(); ?>

<?php $this->section('script'); ?>
<script>
    $('#formSubmit').click(function(){
        let abc = formAJAX('#formProfileUpdate', 'POST', '/member/profile/update', ['Perubahan berhasil disimpan', '', 'success'], function(){
            window.location.reload();
        });
        
    })

</script>
<?php $this->endSection(); ?>