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
                        <li class="breadcrumb-item active" aria-current="page">Ubah Kapal</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Horizontal Form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php if ($this->session->flashdata('info')) : ?>
                                    <div class="alert alert-danger">
                                        <?php echo $this->session->flashdata('info'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                                <div class="form-group">
                                    <label for="kode-kapal">Kode Kapal</label>
                                    <input type="text" disabled name="kode_kapal" value="<?php echo set_value('kode_kapal', $kapal->kode) ?>" id="kode-kapal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="syahbandar">Syahbandar</label>
                                    <?php echo form_dropdown('syahbandar', $syahbandar, set_value('syahbandar'), ['class' => 'form-control', 'id' => 'supllier']) ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama-kapal">Nama Kapal</label>
                                    <input type="text" value="<?php echo set_value('nama', $kapal->nama_kapal) ?>" name="nama" id="nama-kapal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="psatu">L1</label>
                                    <input type="number" value="<?php echo set_value('psatu', $kapal->psatu) ?>" name="psatu" id="psatu" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pdua">L2</label>
                                    <input type="number" value="<?php echo set_value('pdua', $kapal->pdua) ?>" name="pdua" id="pdua" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="lebar_kapal">B</label>
                                    <input type="number" value="<?php echo set_value('lebar_kapal', $kapal->lebar_kapal) ?>" name="lebar_kapal" id="lebar_kapal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tinggi_kapal">H</label>
                                    <input type="number" value="<?php echo set_value('tinggi_kapal', $kapal->tinggi_kapal) ?>" name="tinggi_kapal" id="tinggi_kapal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-control">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Foto</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-body">
                                <img src="<?php echo base_url('assets/images/') . $kapal->foto; ?>" width="100%" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>