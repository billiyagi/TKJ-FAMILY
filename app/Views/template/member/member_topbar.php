<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
        <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#">
            <span>Hi, <?= session('user_session')['first_name'] . ' ' . session('user_session')['last_name']; ?></span>
            <img src="<?= user_avatar(session('user_session')['avatar']); ?>" alt="" width="35px" class="border rounded-circle mx-2">
            <i class="fas fa-caret-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right overflow-hidden">
            <img src="<?= user_avatar(session('user_session')['avatar']); ?>" alt="User Avatar" height="150px" class="w-100 obj-fit">
            <div class="row">
                <div class="col-6">
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user-edit mr-2"></i> Profile
                </a>
                </div>
                <div class="col-6">
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-thumbtack mr-2"></i> Posts
                    </a>
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <button class="btn bg-danger dropdown-item" style="border-radius: 0;" id="btnSignOut">
                <span class="d-block text-center"><i class="fas fa-sign-out-alt mr-2"></i> Logout</span>
            </button>
        </div>
        </li>
    </ul>
</nav>