<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Konstruksi</h3>
                <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Konstruksi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                List Konstruksi
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
                            <th>Tanggal Cek</th>
                            <th>Admin</th>
                            <th>Owner</th>
                            <th>Nama Kapal</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($konstruksi as $tr) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><span class="badge bg-dark"><?php echo $tr->tgl; ?></span></td>
                                <td><?php echo $tr->admin; ?></td>
                                <td><?php echo $tr->owner; ?></td>
                                <td>
                                    <?php foreach ($tr->kapal as $o) : ?>
                                        <a href="#" class="mb-2 btn btn-danger btn-sm btn-icon-split">
                                            <span class="icon text-white-50">
                                                <?php echo $o->jumlah; ?>
                                            </span>
                                            <span class="text"><?php echo $o->nama_kapal; ?></span>
                                        </a><br>
                                    <?php endforeach ?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('konstruksi/hapus/') . $tr->id; ?>" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>