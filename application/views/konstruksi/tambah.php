<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Konstruksi</h3>
                <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Konstruksi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Admin</th>
                                        <td> : <?php echo ($this->session->userdata('name')); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Cek</th>
                                        <td> : <?php echo date('Y-m-d h:i:s'); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-12">
                <div class="card" id="card-konstruksi">
                    <div class="card-header">
                        <h4 class="card-title">Form Konstruksi</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="error-form"></div>
                            <form action="" method="post" class="form-kapal">
                                <input type="hidden" name="data_kapal" id="data_kapal">
                                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                                <div class="form-group">
                                    <label for="nama-owner">Owner</label>
                                    <input type="text" value="<?php echo set_value('owner') ?>" required name="owner" id="nama-owner" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="kapal">Kapal</label>
                                    <div class="input-group">
                                        <select id="kapal" class="form-control">
                                            <option disabled selected>Pilih Kapal</option>
                                            <?php foreach ($kapal->result() as $ob) : ?>
                                                <option value="<?php echo $ob->kode; ?>"><?php echo $ob->nama_kapal; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary add-item-kapal" type="button" id="button-addon1">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-primary">
                                            <tr class="bg-primary text-white">
                                                <th scope="col" width="50">
                                                    <button title="hapus semua item" class="btn btn-sm btn-circle btn-danger btn-remove-item" type="button"><i class="fa fa-trash"></i></button>
                                                </th>
                                                <th scope="col">Kode Kapal</th>
                                                <th scope="col">Nama Kapal</th>
                                                <th scope="col">Foto</th>
                                                <th scope="col">L1</th>
                                                <th scope="col">L2</th>
                                                <th scope="col">L</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="7" class="item-kosong small" align="center">Belum ada kapal yang ditambahkan.</td>
                                            </tr>
                                        </tbody>
                                        <tfoot style="display:none">
                                            <tr class="bg-light">
                                                <th colspan="6" class="text-center">L yang dipakai</th>
                                                <th class="grand-total"></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>