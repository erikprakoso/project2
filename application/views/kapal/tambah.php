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
                        <li class="breadcrumb-item active" aria-current="page">Tambah Kapal</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="d-flex justify-content-center">
            <div class="card col-md-6">
                <div class="card-header">
                    <h4 class="card-title">Tambah Kapal</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php if ($this->session->flashdata('info')) : ?>
                                    <div class="alert alert-danger">
                                        <?php echo $this->session->flashdata('info'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                                <div class="form-group">
                                    <label for="kode_kapal">Kode Kapal</label>
                                    <input type="text" class="form-control" id="kode_kapal" name="kode_kapal">
                                </div>
                                <div class="form-group">
                                    <label for="syahbandar">Syahbandar</label>
                                    <?php if ($syahbandar) : ?>
                                        <?php echo form_dropdown('syahbandar', $syahbandar, set_value('syahbandar'), ['class' => 'form-control', 'id' => 'supllier']) ?>
                                    <?php else : ?>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Silahkan buat Syahbandar</option>
                                        </select>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama-kapal">Nama Kapal</label>
                                    <input type="text" class="form-control" id="nama-kapal" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="psatu">L1</label>
                                    <input type="text" class="form-control" name="psatu" id="psatu">
                                </div>
                                <div class="form-group">
                                    <label for="pdua">L2</label>
                                    <input type="text" class="form-control" name="pdua" id="pdua">
                                </div>
                                <div class="form-group">
                                    <label for="lebar_kapal">B</label>
                                    <input type="text" class="form-control" name="lebar_kapal" id="lebar_kapal">
                                </div>
                                <div class="form-group">
                                    <label for="tinggi_kapal">H</label>
                                    <input type="text" class="form-control" name="tinggi_kapal" id="tinggi_kapal">
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" name="foto" id="foto">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>