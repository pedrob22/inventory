<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>Produksi">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>Produksi/permintaan_barang">Data Permintaan Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Request Permintaan Barang</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-12 grid-margin">
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
    </div>
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Request Permintaan Barang</h4>
                <p><small>Field Departement otomatis terisi berdasarkan akun login.</small></p>
                <hr>
                <form action="<?= base_url('Produksi/simpan') ?>" method="post" id="form_tambah">
                    <input type="hidden" id="id_user" name="id_user" value="<?= $_SESSION['id_user'] ?>">

                    <div class="mb-3">
                        <label for="departement" class="form-label">Departement</label>
                        <input type="hidden" name="id_departement" id="id_departement">
                        <input type="text" class="form-control" readonly id="departement">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Permintaan</label>
                        <input type="text" class="form-control" name="tgl_permintaan" readonly value="<?= date('d-m-Y') ?>">
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <table style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>
                                            Data Barang 
                                            <button id="add_row" type="button" class="btn btn-primary btn-sm" style="float: right;">
                                                <i class="fa fa-plus-square-o"></i>
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="row">
                                    <tr>
                                        <td>
                                            <div class="mb-3">
                                                <label class="form-label">Barang</label>
                                                <select class="form-select" name="id_barang[]" id="select2barang" data-width="100%" required></select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Qty</label>
                                                <input type="number" class="form-control" name="qty_permintaan[]" min="0" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Keterangan Permintaan</label>
                                                <textarea name="ket_permintaan[]" class="form-control"></textarea>
                                            </div>
                                            <hr>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary" style="width: 10%;">
                                    <i class="fa fa-save"></i> Simpan
                                </button>
                                <a href="<?= base_url() ?>Produksi/permintaan_barang" class="btn btn-secondary">
                                    <i data-feather="arrow-left-circle"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="<?= base_url() ?>assets/vendors/core/core.js"></script>
<script src="<?= base_url() ?>assets/vendors/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/select2/select2.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/feather-icons/feather.min.js"></script>
<script src="<?= base_url() ?>assets/js/template.js"></script>
<script src="<?= base_url() ?>assets/js/dashboard-light.js"></script>
<script src="<?= base_url() ?>assets/js/datepicker.js"></script>
<script src="<?= base_url() ?>assets/public/js/request_permintaan_barang_tambah.js"></script>
