<?php $this->extend('template/member/member'); ?>

<?php $this->section('contents'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <a href="<?= base_url('member/post/create'); ?>" class="btn btn-primary mr-2"><i class="fas fa-edit"></i> Create Post</a>
                            <form action="">
                                <select name="" id="" class="form-control">
                                    <option disabled selected> -- Select Action -- </option>
                                    <option value="draft">Draft Post</option>
                                    <option value="publish">Publish Post</option>
                                    <option value="trash">Move to trash</option>
                                </select>
                            </form>
                        </div>
                        <form action="<?= base_url('member/post'); ?>" method="get">
                            <div class="input-group">
                                <input type="text" name="q" class="form-control" placeholder="Search post here..">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="bg-dark">
                                <tr>
                                    <th><input type="checkbox" id="allCheck"></th>
                                    <th class="text-center">#</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th>Judul</th>
                                    <th>Dibuat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = $current_pager;
                                foreach ( $posts as $post ) : ?>
                                <tr>
                                    <td><input type="checkbox" name="data[<?= $post->post_id; ?>]" class="single-check"></td>
                                    <td><?= $i; ?></td>
                                    <td><?= $post->name; ?></td>
                                    <td><?= $post->username; ?></td>
                                    <td><?= excerpt($post->title, '' , 30); ?></td>
                                    <td><?= $time::parse($post->post_created_at, 'Asia/Jakarta')->toLocalizedString('d, MMMM YYYY'); ?></td>
                                    <td>
                                        <?php if ( $post->post_status == 1 ) : ?>
                                            <span class="badge badge-success">Published</span>
                                        <?php else: ?>
                                            <span class="badge badge-secondary">Draft</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="d-flex">
                                        <a href="<?= base_url('kisah/'.$post->slug); ?>" class="btn btn-warning text-light" target="blank">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?= base_url('member/post/'.$post->post_id); ?>" class="btn btn-primary mx-2"><i class="fas fa-pen"></i></a>
    
                                        <form action="<?= base_url('member/post/deleted'); ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="PUT">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-times-circle"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php 
                                $i++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?= $posts_pager->links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>

<?php $this->section('script'); ?>
<script>
    $('#allCheck').click(function() {
        $('.single-check').click();
    })
</script>
<?php $this->endSection(); ?>