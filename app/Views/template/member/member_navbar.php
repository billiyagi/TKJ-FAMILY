<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('member/dashboard'); ?>" class="brand-link">
        <div class="d-flex justify-content-center">
            <div class="d-block">
                <div class="brand-image font-weight-bold mt-2">TKJ</div>
                <span class="brand-text font-weight-bold">FAMILY</span>
            </div>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('member/dashboard'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('member/profile'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user-edit"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-thumbtack"></i>
                        <p>Posts<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/posts'); ?>" class="nav-link">
                                <p>All Posts</p>
                            </a>
                            <a href="./index.html" class="nav-link">
                                <p>Category</p>
                            </a>
                            <a href="./index.html" class="nav-link">
                                <p>Recycle Bin <span class="badge badge-info right">2</span></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('member/dashboard'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>Comments</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Gallery<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link">
                                <p>Alumni</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link">
                                <p>Kisah</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-plug"></i>
                        <p>Plugin<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link">
                                <p>Script</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link">
                                <p>Kisah</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('member/dashboard'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>