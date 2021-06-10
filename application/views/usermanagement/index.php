<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Admin</h3>
                <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                List Admin
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;">+ Tambah</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #435ebe;">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Tambah Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('usermanagement/tambah'); ?>" method="POST">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="basicInput">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="basicInput">Username</label>
                                            <input type="text" class="form-control" id="username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="basicInput">Email</label>
                                            <input type="text" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="basicInput">Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($usermanagement as $s) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $s['name']; ?></td>
                                <td><?= $s['username']; ?></td>
                                <td><?= $s['email']; ?></td>
                                <td><?= $s['status']; ?></td>
                                <td><?= $s['role']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $s['id']; ?>" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $s['id']; ?>" class="btn btn-primary" title="Delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal<?= $s['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #435ebe;">
                                            <h5 class="modal-title" id="editModalLabel" style="color: white;">Edit User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('usermanagement/edit'); ?>" method="POST">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="basicInput">Nama</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="<?= $s['name']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Username</label>
                                                        <input type="text" class="form-control" id="username" name="username" value="<?= $s['username']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Email</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="<?= $s['email']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Status</label>
                                                        <select class="form-select" aria-label="Default select example" name="status">
                                                            <?php if ($s['status'] === '1') : ?>
                                                                <option value="1" selected>Aktif</option>
                                                                <option value="0">Tidak Aktif</option>
                                                            <?php else : ?>
                                                                <option value="1">Aktif</option>
                                                                <option value="0" selected>Tidak Aktif</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Role</label>
                                                        <select class="form-select" aria-label="Default select example" name="role">
                                                            <?php if ($s['role'] === 'Admin') : ?>
                                                                <option value="Admin" selected>Admin</option>
                                                                <option value="User">User</option>
                                                            <?php elseif ($s['role'] === 'User') : ?>
                                                                <option value="Admin">Admin</option>
                                                                <option value="User" selected>User</option>
                                                            <?php else : ?>
                                                                <option value="Admin">Admin</option>
                                                                <option value="User">User</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password">
                                                        <small><code>Kosongkan jika tidak ingin merubah password</code></small>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="user_id" id="user_id" value="<?= $s['id']; ?>">
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
                                            <h5 class="modal-title" id="deleteModalLabel" style="color: white;">Delete User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('usermanagement/delete'); ?>" method="POST">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="basicInput">Nama</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="<?= $s['name']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Email</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="<?= $s['email']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Status</label>
                                                        <?php if ($s['status'] === '1') : ?>
                                                            <input type="text" class="form-control" id="status" name="status" value="Aktif" readonly>
                                                        <?php else : ?>
                                                            <input type="text" class="form-control" id="status" name="status" value="Tidak Aktif" readonly>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Role</label>
                                                        <?php if ($s['role'] === 'Admin') : ?>
                                                            <input type="text" class="form-control" id="role" name="role" value="Admin" readonly>
                                                        <?php elseif ($s['role'] === 'User') : ?>
                                                            <input type="text" class="form-control" id="role" name="role" value="User" readonly>
                                                        <?php else : ?>
                                                            <input type="text" class="form-control" id="role" name="role" value="Tidak ditemukan" readonly>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Password</label>
                                                        <input type="text" class="form-control" id="password" name="password" value="*****" readonly>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="user_id" id="user_id" value="<?= $s['id']; ?>">
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