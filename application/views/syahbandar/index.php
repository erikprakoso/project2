<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Syahbandar</h3>
                <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Syahbandar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                List Syahbandar
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">+ Tambah</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #435ebe;">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Tambah Syahbandar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('syahbandar/tambah'); ?>" method="POST">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="basicInput">Nama Syahbandar</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="basicInput">Alamat</label>
                                            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="basicInput">Kota</label>
                                            <input type="text" class="form-control" id="city" name="city">
                                        </div>
                                        <div class="form-group">
                                            <label for="basicInput">Telepon</label>
                                            <input type="text" class="form-control" id="telepon" name="telepon">
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
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($syahbandar as $s) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $s['nama']; ?></td>
                                <td><?= $s['alamat']; ?></td>
                                <td><?= $s['kota']; ?></td>
                                <td><?= $s['telp']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $s['id']; ?>" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $s['id']; ?>" class="btn btn-primary" title="Delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal<?= $s['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #435ebe;">
                                            <h5 class="modal-title" id="editModalLabel" style="color: white;">Edit Syahbandar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('syahbandar/edit'); ?>" method="POST">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="basicInput">Nama Syahbandar</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="<?= $s['nama']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Alamat</label>
                                                        <textarea class="form-control" id="address" name="address" rows="3"><?= $s['alamat']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Kota</label>
                                                        <input type="text" class="form-control" id="city" name="city" value="<?= $s['kota']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Telepon</label>
                                                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $s['telp']; ?>">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="syahbandar_id" id="syahbandar_id" value="<?= $s['id']; ?>">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal<?= $s['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #435ebe;">
                                            <h5 class="modal-title" id="deleteModalLabel" style="color: white;">Delete Syahbandar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('syahbandar/delete'); ?>" method="POST">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="basicInput">Nama Syahbandar</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="<?= $s['nama']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Alamat</label>
                                                        <textarea class="form-control" id="address" name="address" rows="3" readonly><?= $s['alamat']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Kota</label>
                                                        <input type="text" class="form-control" id="city" name="city" value="<?= $s['kota']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Telepon</label>
                                                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $s['telp']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="syahbandar_id" id="syahbandar_id" value="<?= $s['id']; ?>">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>