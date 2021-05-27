<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/fontawesome/all.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/app.css">
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>images/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/simple-datatables/style.css">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <!-- <a href="index.html"><img src="<?= base_url('assets/'); ?>images/logo/logo.png" alt="Logo" srcset=""></a> -->
                            <h3>Ship Dashboard</h3>
                            <span class="badge bg-primary"><?= $name; ?></span>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item <?php echo active_link('dashboard') ?> ">
                            <a href="<?= base_url('dashboard'); ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo active_link(['kapal', 'kapal/tambah']) ?> has-sub">
                            <a href="#" class='sidebar-link'>
                                <!-- <i class="bi bi-stack"></i> -->
                                <i class="fas fa-ship"></i>
                                <span>Kapal</span>
                            </a>
                            <ul class="submenu <?php echo active_link(['kapal', 'kapal/tambah'], 'active') ?>">
                                <li class="submenu-item <?php echo active_link('kapal') ?>">
                                    <a href="<?= base_url('kapal'); ?>">Data Kapal</a>
                                </li>
                                <li class="submenu-item <?php echo active_link('kapal/tambah') ?>">
                                    <a href="<?= base_url('kapal/tambah'); ?>">Tambah Kapal</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item <?php echo active_link('syahbandar') ?>">
                            <a href="<?= base_url('syahbandar'); ?>" class='sidebar-link'>
                                <i class="bi bi-building"></i>
                                <span>Data Syahbandar</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo active_link(['konstruksi', 'konstruksi/tambah']) ?> has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Konstruksi</span>
                            </a>
                            <ul class="submenu <?php echo active_link(['konstruksi', 'konstruksi/tambah'], 'active') ?>">
                                <li class="submenu-item <?php echo active_link('konstruksi') ?>">
                                    <a href="component-alert.html">Data Konstruksi</a>
                                </li>
                                <li class="submenu-item <?php echo active_link('konstruksi/tambah') ?>">
                                    <a href="component-badge.html">Tambah Konstruksi</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item <?php echo active_link('admin') ?>">
                            <a href="<?= base_url('admin'); ?>" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Data Admin</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?= base_url('logout'); ?>" class='sidebar-link'>
                                <!-- <i class="bi bi-cash"></i> -->
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">

            <?php $this->load->view($main_view); ?>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url('assets/'); ?>vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('assets/'); ?>vendors/apexcharts/apexcharts.js"></script>
    <script src="<?= base_url('assets/'); ?>js/pages/dashboard.js"></script>

    <script src="<?= base_url('assets/'); ?>js/main.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/fontawesome/all.min.js"></script>

    <script src="<?= base_url('assets/'); ?>vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
</body>

</html>