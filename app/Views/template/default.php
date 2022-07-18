<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= csrf_meta(); ?>

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    <!-- CSS Primary -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,600;0,700;1,200;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <title><?= $title_page; ?></title>
</head>
<body>

<?= $this->include('template/default_navbar'); ?>

<?= $this->renderSection('contents'); ?>


<footer class="py-3 mt-5 bg-light">
    <p class="text-center m-0">&copy; copyright 2020 - <?= date('Y'); ?> TKJ FAMILY - Website by <a href="https://github.com/billiyagi">Febry Billiyagi</a></p>
</footer>


<!-- JS JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Primary -->
<script src="assets/js/script.js"></script>

<!-- JS Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?= $this->renderSection('script'); ?>
</body>
</html>