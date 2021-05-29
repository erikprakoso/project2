<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kapal</h3>
                <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kapal</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                List Kapal
            </div>
            <?php if ($this->session->flashdata('info')) : ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('info'); ?>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Kapal</th>
                            <th>Nama Kapal</th>
                            <th>L1</th>
                            <th>L2</th>
                            <th>B</th>
                            <th>H</th>
                            <th>Syahbandar</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kapal->result() as $o) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $o->kode; ?></td>
                                <td><?= $o->nama_kapal; ?></td>
                                <td><?= $o->psatu; ?></td>
                                <td><?= $o->pdua; ?></td>
                                <td><?= $o->lebar_kapal; ?></td>
                                <td><?= $o->tinggi_kapal; ?></td>
                                <td><?= $o->syahbandar_id; ?></td>
                                <td><img src="<?= base_url('assets/images/') . $o->foto; ?>" width="100" class=""></td>
                                <td>
                                    <a href="<?php echo site_url('kapal/ubah/') . $o->kode; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i></a>
                                    <a href="<?php echo site_url('kapal/hapus/') . $o->kode; ?>" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>