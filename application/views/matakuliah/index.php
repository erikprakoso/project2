<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Mata Kuliah</h3>
                <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mata Kuliah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                List Mata Kuliah
                <?php if ($this->session->userdata('role')  === 'Admin') : ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">+ Tambah</button>
                <?php endif; ?>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #435ebe;">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Tambah Mata Kuliah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('matakuliah/tambah'); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="basicInput">ID Matkul</label>
                                            <input type="text" class="form-control" id="matkulid" name="matkul_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="basicInput">Nama Materi</label>
                                            <input type="text" class="form-control" id="namamateri" name="nama_materi">
                                        </div>
                                        <div class="form-group">
                                            <label for="basicInput">Tanggal Pengajaran</label>
                                            <input type="date" class="form-control" id="tanggalpengajaran" name="tanggal_pengajaran">
                                        </div>
                                        <div class="form-group">
                                            <label for="basicInput">Hasil Monitoring</label>
                                            <input type="file" class="form-control" id="monitoring" name="monitoring">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <th>No</th>
                            <th>ID Matkul</th>
                            <th>Nama Materi</th>
                            <th>Tanggal Pengajaran</th>
                            <th>Hasil Monitoring</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($matakuliah as $s) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $s['matkul_id']; ?></td>
                                <td><?= $s['nama_materi']; ?></td>
                                <td><?= $s['tanggal_pengajaran']; ?></td>
                                <td>
                                    <img src="<?= base_url('assets/images/') . $s['hasil_monitoring']; ?>" width="100" class="">
                                </td>
                                <td>
                                    <a href="<?= base_url('assets/images/') . $s['hasil_monitoring']; ?>" type="button" class="btn btn-success" title="Unduh Hasil Monitoring" download><i class="fas fa-download"></i></a>
                                    <?php if ($this->session->userdata('role')  === 'Admin') : ?>
                                        <a href="<?= base_url('matakuliah/edit/') . $s['matkul_id']; ?>" type="button" class="btn btn-primary" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="<?= base_url('matakuliah/delete/') . $s['matkul_id']; ?>" type="button" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>