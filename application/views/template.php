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
                            <span class="badge bg-primary"><?= $this->session->userdata('name'); ?></span>
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
                                    <a href="<?= base_url('konstruksi'); ?>">Data Konstruksi</a>
                                </li>
                                <li class="submenu-item <?php echo active_link('konstruksi/tambah') ?>">
                                    <a href="<?= base_url('konstruksi/tambah'); ?>">Tambah Konstruksi</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item <?php echo active_link('usermanagement') ?>">
                            <a href="<?= base_url('usermanagement'); ?>" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>User Management</span>
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
    <script src="<?= base_url('assets/'); ?>vendors/jquery/jquery.min.js"></script>

    <script src="<?= base_url('assets/'); ?>vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script>
        $('.btn-ubah-sup').on('click', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            $('#ubahModal').modal('show');
            $.ajax({
                url: `syahbandar/getAjax/${id}`,
                method: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    const {
                        id,
                        nama,
                        alamat,
                        kota,
                        telp
                    } = data;
                    $('#ubahModal #id').val(id);
                    $('#ubahModal #nama').val(nama);
                    $('#ubahModal #alamat').val(alamat);
                    $('#ubahModal #kota').val(kota);
                    $('#ubahModal #telp').val(telp);
                }
            })
        })
        $('.btn-ubah-adm').on('click', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            $('#ubahModal').modal('show');
            $.getJSON(`admin/getAjax/${id}`, function(data, status, xhr) {
                const {
                    username,
                    nama,
                    id
                } = data;
                $('#ubahModal #id').val(id);
                $('#ubahModal #username').val(username);
                $('#ubahModal #nama-admin').val(nama);
            })
        })
        let arraykapal = [];
        $('.form-kapal table .btn-remove-item').on('click', function() {
            if (arraykapal.length == 0) return alert('Belum ada item kapal dipilih!');
            arraykapal = [];
            $('.form-kapal table tbody').html('');
            $('.form-kapal #data_kapal').val('');
            countGrandTotal();
        })
        $('.form-kapal .add-item-kapal').on('click', function(e) {
            let kode = $('.form-kapal #kapal').val();
            if (!kode) return alert('Kode kapal tidak valid');
            if (arraykapal.filter(item => item.kode == kode).length > 0) return alert('Data kapal Sudah Dipilih');
            if (arraykapal.length == 0) $('.form-kapal table tbody .item-kosong').hide();
            $.getJSON(`../kapal/getAjax/${kode}`, function(data, status, xhr) {
                let html = `
                <tr id="${data.kode}">
                    <td><button data-kode="${data.kode}" type="button" class="btn-remove-kapal btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                    <td>${data.kode}</td>
                    <td>${data.nama_kapal}</td>
                    <td><img src="${data.foto}" width="50"/></td>
                    <td>${data.psatu}</td>
                    <td>${data.pdua}</td>
                    <td>${data.psatu}</td>
                </tr>
                `;
                arraykapal.push({
                    kode: data.kode,
                    jumlah: 1,
                    total: data.psatu
                });
                let grand_total = 0;
                arraykapal.forEach(val => grand_total = grand_total + parseInt(val.total));
                $('.form-kapal table tbody').append(html)
                $('.form-kapal table tfoot').show();
                $('.form-kapal .grand-total').html(`<h4>${grand_total}</h4>`)
                $('.form-kapal #data_kapal').val(JSON.stringify(arraykapal));
            })
        })
        $('.form-kapal table').on('click', '.btn-remove-kapal', function() {
            $(this).parent().parent().remove();
            let kode = $(this).data('kode');
            arraykapal = arraykapal.filter(e => e.kode != kode);
            $('.form-kapal #data_kapal').val(JSON.stringify(arraykapal));
            countGrandTotal();
        })
        $('.form-kapal table').on('change', '.jumlah', function() {
            let kode = $(this).data('kode');
            let jumlah = $(this).val();
            let psatu = $(this).data('psatu');
            let total = psatu * jumlah;
            $(`.form-kapal #${kode} td:last`).html(`${total}`)
            objIndex = arraykapal.findIndex((obj => obj.kode == kode));
            arraykapal[objIndex].jumlah = jumlah;
            arraykapal[objIndex].total = total;
            countGrandTotal();
            $('.form-kapal #data_kapal').val(JSON.stringify(arraykapal));
        })

        function countGrandTotal() {
            let grand_total = 0;
            arraykapal.forEach(val => grand_total = grand_total + parseInt(val.total));
            if (grand_total <= 0) {
                $('.form-kapal table tfoot').hide();
                $('.form-kapal table tbody .item-kosong').show();
            }
            $('.form-kapal .grand-total').html(`<h4>${grand_total}</h4>`)
        }
        $('.form-kapal').on('submit', function(e) {
            e.preventDefault();
            $.post('store', $(this).serialize(), function(data, status, xhr) {
                if (!data.status) {
                    $('.error-form').html(data.error);
                    let cardOffset = $('#card-konstruksi').offset();
                    let bodyOffset = $(document).scrollTop();
                    if (cardOffset.top <= bodyOffset) {
                        $('html, body').animate({
                            scrollTop: cardOffset.top,
                        }, 1000)
                    }
                    return;
                }
                document.location.href = '../konstruksi';
            }, 'json');
        })
    </script>
</body>

</html>