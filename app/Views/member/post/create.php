<?php $this->extend('template/member/member'); ?>

<?php $this->section('contents'); ?>
<form action="<?= base_url('member/post/store'); ?>" method="post" id="createPost" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Thumbnail (Max 1Mb)</div>
                    <div class="card-body">
                        <img src="<?= post_thumbnail('default-thumbnail.png'); ?>" alt="Thumbnail Post" class="w-100" id="thumbnailPreview">
                        <input type="file" name="thumbnail" id="inputThumbnail" class="form-control mt-3">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="title" class="form-control" id="judul">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">Kategori</label>
                                <select name="category" id="category" class="form-control">
                                    <option disabled selected> -- Pilih kategori -- </option>
                                    <?php foreach ( $categories as $category ) : ?>
                                        <option value="<?= $category->category_id; ?>"><?= $category->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2" selected>Draft</option>
                                    <option value="1">Publish</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="contents">Konten</label>
                            <textarea name="contents" id="contents" cols="30" rows="10" class="form-control"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" id="formSubmit" data-confirm="Simpan post?">Simpan <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $this->endSection(); ?>

<?php $this->section('script'); ?>
<script>
    $('#inputThumbnail').change(function() {
        const [file]  =   $(this)[0].files;
        $('#thumbnailPreview').attr('src', URL.createObjectURL(file));
    });

    formAJAX('#createPost', 'POST', '/member/post/store', ['Post berhasil disimpan', '', 'success'], function() {
        window.location.href = '/member/post';
    })
</script>
<?php $this->endSection(); ?>